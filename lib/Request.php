<?php

class Request 
{
   	public $attributes;
	public $get;
	public $post;
	public $files;
	public $cookies;
	public $server;

	protected $pathInfo;
	protected $requestUri;
	protected $method;

	public function __construct() 
	{
		$this->server = $_SERVER;
		$this->get = $_GET;
		$this->post = $_POST;
		$this->files = $_FILES;
		$this->cookies = $_COOKIE;		
		$this->pathInfo = '/';
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

	public function getGetParam($name)
	{
		return isset($this->get[$name]) ? $this->get[$name] : null;
	}

	public function getPostParam($name)
	{
		return isset($this->post[$name]) ? $this->post[$name] : null;
	}

	public function getFilesParam($name)
	{
		return isset($this->files[$name]) ? $this->files[$name] : null;
	}

	public function getServerParam($name)
	{
		return isset($this->server[$name]) ? $this->server[$name] : null;
	}

	public function getParam($name, $type)
	{
		switch(strtolower($type))
		{
			case 'get':
				return $this->getGetParam($name);
				break;

			case 'post':
				return $this->getPostParam($name);
				break;

			case 'files':
				return $this->getFilesParam($name);
				break;				
		}
	}

	public function getMethod()
	{
		if (null === $this->method) {
			$method = isset($this->server['REQUEST_METHOD']) ? $this->server['REQUEST_METHOD'] : null;
			
			$this->method = strtoupper($method);
		}
		
		return $this->method;
	}

	public function __toString()
	{
		return 'Request';
	}
}