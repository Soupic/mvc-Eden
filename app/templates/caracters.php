<div>
	<?php foreach ($caracters as $caracter) : ?>
		<a href="<?= BASE_URL ?>caractersdetails?id=<?= $caracter->getId() ?>"><h2><?= $caracter->getName() ?></h2></a>
		<p><?= $caracter->getResume() ?></p>
	<?php endforeach; ?>
</div>