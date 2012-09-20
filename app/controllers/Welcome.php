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
	
	public function show() 
	{	
		$blog_model = $this->loadModel('Blog');
		$sql = sprintf("SELECT * FROM blog WHERE id = %d", $this->request->getAttribute('id'));

		$this->renderResponse('Demo');
	}
}
