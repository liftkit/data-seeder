<?php


	namespace LiftKit\DataSeeder\Constraint;


	interface ConstraintInterface
	{
		public function getAllowedValues ();
		public function filterAllowedValues (array $values);
		public function notifyValue ($value);
	}