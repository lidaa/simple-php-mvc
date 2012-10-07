<?php

class Response
{
	private $headers;
	private $layout;
	private $block;
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
			$this->block['VIEW_CONTENT'] = ob_get_contents();
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
		$this->block[$name] = '';
	}

	public function endBlock()
	{
		$blocks = $this->block;

		$name = sprintf('VIEW_%s', strtoupper(key($blocks)));
		$this->block[$name] = ob_get_contents();

		ob_end_clean();
	}

	public function getBlock($name)
	{
		$block = null;
		$name = sprintf('VIEW_%s', strtoupper($name));
		if(isset($this->block[$name])) 
		{
			$block = $this->block[$name];
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

	public function __invoke()
	{
            foreach ($this->headers as $key => $value) {
                header($key. ':' . $value);
            }
            
            echo $this->content;
	}
}
