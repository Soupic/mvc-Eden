<h1>News</h1>

<div>
	<?php foreach ($news as $new) : ?>
		<h3><?= $new->getTitle() ?></h3>
		<p><?= $new->getContent() ?></p>
	<?php endforeach; ?>
</div>