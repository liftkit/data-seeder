<?php

	namespace LiftKit\DataSeeder\Strategy;


	interface StrategyInterface
	{


		public function execute (array $possibleValues);
	}