<?php

class Welcome extends Controller
{
	public function index() 
	{
		include(dirname(__FILE__).'/../models/User.php');
		
		$user = new User();
		
		$list = $user->findAll();
		
		foreach($list as $value)
		{
			echo $value["email"];
		}
		
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
