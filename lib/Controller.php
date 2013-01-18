<?php

class Controller 
{
    protected $request;
    protected $response;
    protected $viewData;

    public function __construct() 
    {
        $this->response = new Response();
        $this->viewData = array();

        $app_config = Init_app_Config();
        $this->setLayout($app_config['default_layout']);

        $this->response->setBaseUrl($app_config['base_url'])
                       ->setAssetsUrl($app_config['assets_url']);
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

    public function setLayout($layout) 
    {
        $layout_path = ($layout === null) ? null : APP_PATH . DS . 'views' . DS . $layout;

        $this->response->setLayout($layout_path);
    }

    public function disableLayout() 
    {
        $this->setLayout(null);
    }

    public function setRequest($request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function loadModel($name)
    {
        include_once(APP_PATH . DS .'models'. DS . $name . '.php');

        if (!class_exists($name, false)) 
        {
            trigger_error("Class '$name' not found.", E_USER_WARNING);
        }

        return new $name();
    }

    public function redirect($url, $permanent = false)
    {
        $this->response->redirect($url, $permanent);

        $this->renderResponse('Redirecting...');
        
        exit;
    }

    public function getParam($key, $default = null)
    {
        $app_config = init_app_Config();

        $params  = $app_config['params'];

        $param = (isset($params[$key])) ? $params[$key] : $default;

        return $param;
    }

    public function getBaseUrl($with_ssl = false)
    {
        $app_config = Init_app_Config();
        $url = $app_config['base_url'];

        return $this->ModifyUrl($url, $with_ssl);
    }

    public function getAssetsUrl($with_ssl = false)
    {
        $app_config = Init_app_Config();
        $url = $app_config['assets_url'];

        return $this->ModifyUrl($url, $with_ssl);
    }

    private function ModifyUrl($url, $with_ssl)
    {
        if($with_ssl)
        {
            if(strpos($url, 'http://') !== false )
            {
                $url = str_replace('http://', 'https://', $url);
            }
        }
        else
        {
            if(strpos($url, 'https://') !== false )
            {
                $url = str_replace('https://', 'http://', $url);
            }
        }

        return $url;         
    }
}
