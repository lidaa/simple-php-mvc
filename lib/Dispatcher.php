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
            $uri = str_replace('{', '(?P<', $route['_route']);
            $uri = str_replace('}', '>[^/]+?)', $uri);
            $uri = sprintf('#^%s$#', $uri);

            if(preg_match($uri, $this->request->getPathInfo(), $matches))
            {	
                $this->controller = $route['_controller'];
                $this->action = $route['_action'];

                $this->extractParams($matches);

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
                require_once($controller_path);
                
                $controller = new $this->controller();
                if(method_exists($controller, $this->action))
                {
                    $controller->setRequest($this->request);

                    return $controller->{$this->action}();
                }	
                else
                {
                    throw new Exception("Method '{$this->action}' not found.");					
                }		
            }
        }
        else
        {
            throw new Exception('Route not found.');	
        }
    }

    private function extractParams($params)
    {	
        foreach($params as $key => $value)
        {
            if(!is_numeric($key))
            {
                $this->request->setAttribute($key, $value);
            }
        }
        /*
        $url_query = parse_url($this->request->getRequestUri(), PHP_URL_QUERY);
        if($url_query)
        {
                $params = explode('&', $url_query);		
                foreach($params as $param)
                {
                        $args = explode('=', $param);
                        $this->request->setAttribute($args[0], $args[1]);
                }
        }
        */
    }

}
