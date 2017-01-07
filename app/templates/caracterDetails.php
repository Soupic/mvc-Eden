
<div>
	<?php foreach ($caracters as $caracter) : ?>
		<?php if ($caracter->getId() == $_GET['id']) {
			echo "<h2>" . $caracter->getName() . "</h2>";
			echo "<p>" . $caracter->getResume() . "<p>";
		}
	endforeach; ?>
</div>

	<div>
		<?php foreach ($images as $image) : ?>
			<img src="<?= BASE_URL ?>public/pictures/personnages/Cthulhu/<?= $image->getName() ?>.jpg">
		<?php endforeach; ?>
	</div>