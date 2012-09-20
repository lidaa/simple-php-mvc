<?php

class Blog extends Model
{
	protected $tableName = 'blog';
	protected $primaryKey = 'id';
	
	public function selectAll()
	{
		$sql = sprintf('SELECT * FROM blog');

		return $this->query($sql)->fetchAll();
	}
}
