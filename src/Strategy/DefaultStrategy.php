<?php

	namespace LiftKit\DataSeeder\Strategy;

	use mersenne_twister\twister;
	use LiftKit\DataSeeder\Exception\NoPossibleValues;


	class DefaultStrategy implements StrategyInterface
	{
		protected $seed;



		public function __construct ($seed)
		{
			$this->seed = $seed;
		}


		public function execute (array $possibleValues)
		{
			$possibleValues = array_values($possibleValues);
			$count = count($possibleValues);

			if (! $count) {
				throw new NoPossibleValues('There are no possible values.');
			}

			$twister = new twister($this->seed);
			$index = $twister->rangeint(0, $count-1);

			return $possibleValues[$index];
		}
	}