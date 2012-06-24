<?php

class Request 
{
	protected $server;
	protected $pathInfo = '/';

	public function __construct() 
	{
		$this->server = $_SERVER;
	}
	
	public function getPathInfo() 
	{
		if(isset($this->server['PATH_INFO']))
		{
			$this->pathInfo = $this->server['PATH_INFO'];
		}
		
		return $this->pathInfo;
	}
	
}
