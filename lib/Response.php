<?php

class Response
{
	private $headers;
	private $layout;
	protected $content;
	
	public function __construct() 
	{	
		$this->hearders = array();
		$this->content = '';
	}

	public function setView($view, $assigns)	
	{
		extract($assigns);
		ob_start();
		require($view);
		if($this->layout !== null)
		{
			$APP_CONTENT = ob_get_contents();
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

	public function __invoke()
	{
		echo $this->content;
	}
}
