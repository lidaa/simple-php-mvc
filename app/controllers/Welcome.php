<?php

class Welcome extends Controller
{
	public function index() 
	{
		$this->assign('name', 'Lidaa');
		$this->renderView('index.html.php');
	}
	
	public function demo() 
	{
		$this->renderResponse('Demo');
	}
	
	public function edit() 
	{	
		print_r($this->request->attributes);
		$this->renderResponse('Edit');
	}
}
