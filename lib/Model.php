<?php

class Model
{
	protected $tableName = null;
	protected $primaryKey = null;		
	protected static $connection;
	
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

	protected function query($sql)
	{
		$connection = self::$connection;
		$result = $connection->query($sql);		

		return $result;
	}		

	protected function exec($sql)
	{
		$connection = self::$connection;
		$result = $connection->exec($sql);		

		return $result;
	}
		
	/*
	public function fetchAll()
	{
		$sql = sprintf('SELECT * FROM %s', $this->tableName);
		
		return $this->query($sql)->fetchAll();
	}
	
	public function fetch($id)
	{
		$sql = sprintf('SELECT * FROM %s WHERE %s = %s', $this->tableName, $this->primaryKey, $id);

		return $this->query($sql)->fetch();
	}
	*/
}
