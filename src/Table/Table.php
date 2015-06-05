<?php

	namespace LiftKit\DataSeeder\Table;

	use LiftKit\DataSeeder\Table\Field\Field;


	class Table
	{
		protected $tableName;
		protected $seed;

		/**
		 * @var Field[]
		 */
		protected $fields = [];


		public function __construct ($tableName, $seed)
		{
			$this->tableName = $tableName;
			$this->seed = $seed;
		}


		public function getTableName ()
		{
			return $this->tableName;
		}


		public function defineField ($fieldName, $seed = null)
		{
			$seed = $seed ?: $this->seed;
			$field = new Field($fieldName, $seed);

			$this->fields[] = $field;

			return $field;
		}


		public function seed ($rowCount)
		{
			for ($i = 0; $i < $rowCount; $i++) {
				foreach ($this->fields as $field) {

				}
			}
		}
	}