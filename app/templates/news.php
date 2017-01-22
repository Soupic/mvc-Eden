<h1>News</h1>

<div>
	<?php foreach ($news as $new) : ?>
			<h1><?= $new->getTitle(); ?></h1>
			<p><?= $new->getNumPost(); ?></p>
			<p><?= $new->getContent(); ?></p>
	<?php endforeach ; ?>
</div>