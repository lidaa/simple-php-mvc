<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<div><?php $this->getBlock('content');  ?></div>
		<div><span><?php $this->getBlock('test'); ?></span></div>
	</body>
</html>
