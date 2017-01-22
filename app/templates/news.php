
<div id="news">
	<h2>News</h2>
	<?php foreach ($news as $new) : ?>
			<div id="newsContent">
				<h3><?= $new->getTitle(); ?></h3>
				<p class="numNews">News n° : <?= $new->getNumPost(); ?></p>
				<p class="contentNews"><?= $new->getContent(); ?></p>
			</div>
	<?php endforeach ; ?>
</div>