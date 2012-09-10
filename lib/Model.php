<?php

class Model
{
		public $tableName = null;
		public $primaryKey = null;		
		private static $connection;
		
		public function __construct()
		{
			require_once('Database.php');
			
			self::$connection = DataBase::getInstance();
			
			if($this->tableName === null)
			{
				throw new Exception( "Attribute 'tableName' not found");
			}
			
			if($this->primaryKey === null)
			{
				throw new Exception( "Attribute 'primaryKey' not found");
			}
		}
		
		public function findAll()
		{
			$connection = self::$connection;
			$table_name = $this->tableName;
			
			$result = $connection->query("SELECT * FROM $table_name");		

			return $result;
		}
}
