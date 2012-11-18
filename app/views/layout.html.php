<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Simple PHP MVC Project</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->getAssetsUrl(); ?>/css/style.css" />
  </head>

  <body>
    <div id="header_container">
		<div id="header">
			<a href="<?php echo $this->getBaseUrl(); ?>">Simple PHP MVC</a>
            <div id="search">
				<form action="" id="search_form" name="search_form">
					<p>
						<input id="search_form_text" type="text" name="search" value="KEY" />
						<input id="search_form_submit" type="submit" value="GO" />
					</p>
				</form>
			</div>
		</div>
	</div>

	<div id="content_container">
		<div id="content">
			<?php $this->getBlock('content'); ?>
		</div>

		<div id="panel">
			<div class="category"><a class="category_title" href="https://github.com/lidaa/simple-php-mvc">Simple PHP MVC</a></div>
			<div class="category"><a class="category_title" href="https://github.com/lidaa/LidaaTransBundle">Lidaa TransBundle</a></div>
			<div class="category"><a class="category_title" href="https://github.com/lidaa/LidaaTwigBundle">Lidaa TwigBundle</a></div>
			<div class="category"><a class="category_title" href="https://github.com/lidaa/LidaaGitBundle">Lidaa GitBundle</a></div>
			<div class="category"><a class="category_title" href="https://github.com/lidaa/SF2Blog">SF2Blog</a></div>
			<?php $this->getBlock('panel'); ?>

            <div style="margin: auto; text-align: center; padding-top: 20px; letter-spacing: 8px;">
                <a href="#"><img src="./web/img/rss.png" alt="" /></a>
                <a href="#"><img src="./web/img/twitter.png" alt="" /></a>
                <a href="#"><img src="./web/img/facebook.png" alt="" /></a>
            </div>
		</div>
	</div>
	<hr/>
	<div id="footer">Based on <a href="https://github.com/lidaa/simple-php-mvc">simple-php-mvc</a> :)</div>
  </body>
</html>

