<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Simple-PHP-MVC Project</title>
    <link rel="stylesheet" type="text/css" media="screen" href="./web/css/style.css" />
  </head>

  <body>
    <div id="header_container">
		<div id="header">
			<a href="/">Simple-PHP-MVC</a>
		</div>
	</div>
	<div id="content_container">
		<div id="content">
			<?php $this->getBlock('content'); ?>
		</div>

		<div id="panel">
            <div id="search">
				<a id="search_title" href="#">Search</a>
				<form action="/article/search" id="search_form">
					<p>
						<input type="text" name="search" />
					</p>
				</form>
			</div>
			<div id="categories"><a id="categories_title" class="category_button_title" href="#">Categories</a></div>
			<div id="archives" class="category_button"><a id="archives_title" class="category_button_title" href="#">Archives</a></div>
			<div id="account"><a id="account_title" href="#">Account</a></div>

            <div style="margin: auto; text-align: center; padding-top: 20px; letter-spacing: 8px;">
                <a href="#"><img src="./web/img/rss.png" alt="" /></a>
                <a href="#"><img src="./web/img/twitter.png" alt="" /></a>
                <a href="#"><img src="./web/img/facebook.png" alt="" /></a>
            </div>
		</div>
	</div>

	<div id="footer">Based on <a href="https://github.com/lidaa/simple-php-mvc">simple-php-mvc</a> :)</div>
  </body>
</html>

