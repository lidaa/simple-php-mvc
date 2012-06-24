<?php

class Dispatcher 
{
	private $routes; 
	private $request;
	private $controller;
	private $action;
	
	public function init($request)
	{
		$this->routes = init_routes();
		$this->request = $request;
		
		return $this;
	}
	
	public function match()
	{
		foreach($this->routes as $route)
		{
			if($this->request->getPathInfo() === $route['_route'])
			{
				$this->controller = $route['_controller'];
				$this->action = $route['_action'];
				
				return true;
			}
		}
		
		return false;
	}
	
	public function dispatch()	
	{
		if($this->match())
		{
			$controller_path = APP_PATH . DS . 'controllers' . DS . $this->controller . '.php';
			if(is_file($controller_path))
			{
				require($controller_path);
				$controller = new $this->controller();
				if(method_exists($controller, $this->action))
				{
					return $controller->{$this->action}();
				}			
			}
		} 
		else
		{
			throw new Exception('Route not found.');			
		} 
	
	}
}
