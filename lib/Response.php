<?php

class Response
{
	private $headers;
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
		$this->content = ob_get_contents();
		ob_end_clean();
	}	
	
	public function setContent($content)
	{
		$this->content = $content;
	}
	
	public function __invoke()
	{
		echo $this->content;
	}
}
