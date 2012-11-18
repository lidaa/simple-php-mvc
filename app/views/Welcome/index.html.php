
<?php foreach($blogs as $blog) { ?>
	<div class="article">
		<div class="article_title">
			<a href="<?php echo $this->getBaseUrl(); ?>/blog/<?php echo $blog['id']; ?>/<?php echo $blog['slug']; ?>"><?php echo $blog['title']; ?></a> 
			<span class="article_subtitle">(<?php echo $blog['created']; ?>)</span>
		</div>
		<div class="article_image">
			<a href="#"><img width="200px" src="<?php echo $this->getAssetsUrl(); ?>/img/<?php echo $blog['image']; ?>" /></a>
		</div>
		<div class="article_content"><?php echo substr($blog['blog'], 0, 250); ?>...</div>
	</div>
	<div style="clear: both;"></div>
<?php } ?>

<?php $this->startBlock('panel') ?>
<div class="category"><a class="category_title" href="https://github.com/cakephp/cakephp">CakePHP2</a></div>
<div class="category"><a class="category_title" href="https://github.com/symfony/symfony">Symfony2</a></div>
<div class="category"><a class="category_title" href="https://github.com/zendframework/zf2">ZendFramework2</a></div>
<?php $this->endBlock() ?>
