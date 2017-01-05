
<div>
	<?php foreach ($caracters as $caracter) : ?>
		<h2><?= $caracter->getName() ?></h2>
		<p><?= $caracter->getResume() ?></p>
	<?php endforeach; ?>
</div>