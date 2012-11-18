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
        else
        {
            $this->pathInfo = $this->preparePathInfo();
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

    public function getScriptName()
    {
        if(isset($this->server['SCRIPT_NAME']))
        {
                return $this->server['SCRIPT_NAME'];
        }
    }

    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function getAttribute($name)
    {
        return $this->attributes[$name];
    }

    public function getAttributes()
    {
        return $this->attributes;
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

    protected function preparePathInfo()
    {
        $path_info = '/';

        if(null !== $this->getRequestUri())
        {
            $path_info = parse_url($this->getRequestUri(), PHP_URL_PATH);

            if(isset($this->server['SCRIPT_NAME']))
            {
                    $base_path = $this->server['SCRIPT_NAME'];
            }
            elseif(isset($this->server['PHP_SELF']))
            {
                    $base_path = $this->server['PHP_SELF'];
            }

            $path_info = substr($path_info, strlen(dirname($base_path)));
        }


        $path_info = trim($path_info, '/');
        $path_info = '/' . $path_info;

        return (string) $path_info;
    }

    protected function getBaseUrl()
    {		
        $app_config = init_app_Config();
        $param = (isset($app_config['base_url'])) ? $app_config['base_url'] : null;
    }

    public function __toString()
    {
        return 'Request';
    }
}
