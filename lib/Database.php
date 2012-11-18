<?php

class DataBase extends PDO
{
	private static $instance;
	private $host;
	private $port;
	private $dsn;
	private $user;
	private $pwd;
	
	public function __construct()
	{
		$params = init_database();

		$this->host = $params['host'];
		$this->port = $params['port'];
		$this->dbname = $params['dbname'];
		$this->user = $params['user'];
		$this->pwd = $params['password'];
		
		$this->dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
                
                $options = array();
                $options[parent::ATTR_ERRMODE] = parent::ERRMODE_EXCEPTION;
		
		try 
		{
			self::$instance = parent::__construct($this->dsn, $this->user, $this->pwd, $options);
		} catch (PDOException $e) 
		{
			die('Connection failed: ' . $e->getMessage());
		}
	}
	
	public static function getInstance()
	{
		if(self::$instance instanceof self)
		{
			return self::$instance;
		}
		return new self();	
	}

}
