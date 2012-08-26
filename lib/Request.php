<?php

class Request 
{
   public $attributes;
	protected $server;
	protected $pathInfo = '/';
	protected $requestUri;

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
	
	public function getRequestUri() 
	{
		if(isset($this->server['REQUEST_URI']))
		{
			$this->requestUri = $this->server['REQUEST_URI'];
		}
		
		return $this->requestUri;
	}
	
	public function setAttribute($name, $value)
	{
		$this->attributes[$name] = $value;
	}

	public function getAttribute($name)
	{
		return $this->attributes[$name];
	}
	
	public function __toString()
	{
		return 'dddd';
	}
}
