<?php

class Controller 
{
	public $request;
	protected $response;
	protected $viewData;
	
	public function __construct() 
	{
		$this->response = new Response();
		$this->viewData = array();
	}
	
	public function renderView($view, $parameters = array())
	{
		$controller_name = get_class($this);
		$view_path = APP_PATH . DS . 'views' . DS . $controller_name . DS . $view;
		$this->viewData = array_merge($this->viewData, $parameters);
		
		$this->response->setView($view_path, $this->viewData);
		$response = $this->response;
		
		return $response();
	}

	public function renderResponse($content)
	{
		$this->response->setContent($content);
		$response = $this->response;
		
		return $response();
	}

	public function assign($name, $value)
	{
		$this->viewData[$name] = $value;
	}
}
