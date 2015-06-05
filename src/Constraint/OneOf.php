<?php

	namespace LiftKit\DataSeeder\Constraint;


	class OneOf implements ConstraintInterface
	{
		private $allowedValues;


		public function __construct (array $allowedValues)
		{
			$this->allowedValues = $allowedValues;
		}


		public function getAllowedValues ()
		{
			return $this->allowedValues;
		}


		public function filterAllowedValues (array $values)
		{
			return array_intersect($this->allowedValues, $values);
		}


		public function notifyValue ($value)
		{
			// NO ACTION
		}
	}