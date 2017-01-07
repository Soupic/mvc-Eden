<div>
	<?php foreach ($caracters as $caracter) : ?>
		<a href="<?= BASE_URL ?>caractersDetails?id=<?= $caracter->getId() ?>"><h2><?= $caracter->getName() ?></h2></a>
	<?php endforeach; ?>
</div>