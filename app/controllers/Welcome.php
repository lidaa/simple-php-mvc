<?php

class Welcome extends Controller
{
	public function index() 
	{
		$blog = $this->loadModel('Blog');

		$blogs = $blog->selectAll();

		$this->assign('blogs', $blogs);

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
