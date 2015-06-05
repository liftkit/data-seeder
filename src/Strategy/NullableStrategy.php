<?php

	namespace LiftKit\DataSeeder\Strategy;

	use mersenne_twister\twister;


	class NullableStrategy extends DefaultStrategy implements StrategyInterface
	{
		protected $ratio;



		public function __construct ($seed, $ratio)
		{
			parent::__construct($seed);

			$this->ratio = $ratio;
		}


		public function execute (array $possibleValues)
		{
			$twister = new twister($this->seed);

			$rand = $twister->rangereal_open(0, 1);

			if ($rand < $this->ratio) {
				return null;
			} else {
				return parent::execute($possibleValues);
			}
		}
	}