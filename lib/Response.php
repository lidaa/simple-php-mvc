<?php

class Response
{
    private $headers;
    private $layout;
    private $blocks;
    private $BaseUrl;
    private $AssetsUrl;
    protected $content;

    public function __construct() 
    {	
        $this->headers = array();
        $this->content = '';
    }

    public function setView($view, $assigns)	
    {
        extract($assigns);
        ob_start();
        require($view);
        if($this->layout !== null)
        {
            $this->blocks['VIEW_CONTENT'] = ob_get_contents();
            ob_end_clean();

            require($this->layout);
            $this->content = ob_get_contents();
        }

        $this->content = ob_get_contents();

        ob_end_clean();
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function redirect($url, $permanent)
    {
        if ($permanent)
        {
            $this->headers['Status'] = '301 Moved Permanently';
        }
        else
        {
            $this->headers['Status'] = '302 Found';
        }

        $this->headers['location'] = $url;
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function startBlock($name)
    {
        if(strtolower($name) == 'content')
        {
            throw new Exception("'content' is part of reserved names");			
        }

        ob_start();
        $this->blocks[$name] = $name;
    }

    public function endBlock()
    {
        $blocks = $this->blocks;

        $name = sprintf('VIEW_%s', strtoupper(end($blocks)));
        $this->blocks[$name] = ob_get_contents();

        ob_end_clean();
    }

    public function getBlock($name)
    {
        $block = null;
        $name = sprintf('VIEW_%s', strtoupper($name));
        if(isset($this->blocks[$name])) 
        {
            $block = $this->blocks[$name];
        }

        echo $block;
    }

    public function getBaseUrl($with_ssl = false)
    {
        $url = $this->BaseUrl;

        return $this->ModifyUrl($url, $with_ssl);
    }

    public function getAssetsUrl($with_ssl = false)
    {
        $url = $this->AssetsUrl;

        return $this->ModifyUrl($url, $with_ssl);
    }

    public function setBaseUrl($base_url)
    {
        $this->BaseUrl = $base_url;

        return $this;
    }

    public function setAssetsUrl($assets_url)
    {
        $this->AssetsUrl = $assets_url;

        return $this;
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

    public function includePartial($partial, $params = array())
    {
        extract($params);

        $partial_path = APP_PATH . DS . 'views' . DS . 'Partials' . DS . $partial;

        include($partial_path);
    }

    public function includeAction($uri)
    {
        $subRequest = new Request();
        $dispatcher = new Dispatcher();

        $subRequest->server['PATH_INFO'] = $uri;

        $dispatcher->init($subRequest)->dispatch();
    }

    public function __invoke()
    {
        foreach ($this->headers as $key => $value) {
            header($key. ':' . $value);
        }

        echo $this->content;
    }
}
