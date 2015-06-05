<?php


	namespace LiftKit\DataSeeder\Table\Field;

	use LiftKit\DataSeeder\Constraint\ConstraintInterface;
	use LiftKit\DataSeeder\Constraint\IsUnique;
	use LiftKit\DataSeeder\Constraint\OneOf;
	use LiftKit\DataSeeder\Strategy\DefaultStrategy;
	use LiftKit\DataSeeder\Strategy\NullableStrategy;
	use LiftKit\DataSeeder\Strategy\StrategyInterface;


	class Field
	{
		private $fieldName;
		private $seed;

		/**
		 * @var ConstraintInterface[]
		 */
		private $constraints;


		/**
		 * @var StrategyInterface
		 */
		private $strategy;


		public function __construct ($fieldName, $seed)
		{
			$this->fieldName = $fieldName;
			$this->seed = $seed;
			$this->strategy = new DefaultStrategy($seed);
		}


		public function addConstraint (ConstraintInterface $constraint)
		{
			$this->constraints[] = $constraint;

			return $this;
		}


		public function setStrategy (StrategyInterface $strategy)
		{
			$this->strategy = $strategy;

			return $this;
		}


		public function getFieldName ()
		{
			return $this->fieldName;
		}


		public function getConstraints ()
		{
			return $this->constraints;
		}


		public function getStrategy ()
		{
			return $this->strategy;
		}


		public function oneOf (array $possibleValues)
		{
			return $this->addConstraint(new OneOf($possibleValues));
		}


		public function isUnique ()
		{
			return $this->addConstraint(new IsUnique());
		}


		public function allowNull ($ratio)
		{
			return $this->setStrategy(new NullableStrategy($this->seed, $ratio));
		}
	}