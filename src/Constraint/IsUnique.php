<?php

	namespace LiftKit\DataSeeder\Constraint;


	class IsUnique implements ConstraintInterface
	{
		private $usedValues = [];


		public function getAllowedValues ()
		{
			return [];
		}


		public function filterAllowedValues (array $values)
		{
			return array_diff($values, $this->usedValues);
		}


		public function notifyValue ($value)
		{
			$this->usedValues[] = $value;
		}
	}