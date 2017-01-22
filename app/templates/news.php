
<div id="news">
	<h2>News</h2>
	<?php foreach ($news as $new) : ?>
			<div id="newsContent">
				<h3><?= $new->getTitle(); ?></h3>
				<p><?= $new->getNumPost(); ?></p>
				<p><?= $new->getContent(); ?></p>
			</div>
	<?php endforeach ; ?>
</div>