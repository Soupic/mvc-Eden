<h1>E-Den</h1>

<ul>
	<li><a href="<?= BASE_URL?>home">home</li>
	<li><a href="<?= BASE_URL?>news">News</a></li>
	<li><a href="<?= BASE_URL?>caracters">Caracters</a></li>
	<li><a href="<?= BASE_URL?>login">Login</a></li>
	<?php if(!empty($_SESSION)){ ?>
		<li><a href="<?= BASE_URL?>logout">Logout</a></li>
	<?php } 
			else { ?>
				<li><a href="<?= BASE_URL?>register">Registration</a></li>
			<?php } ?>
</ul>
<ul>
	
	<?php if(!empty($_SESSION['role'] == true)){ ?>
		<li><a href="<?= BASE_URL?>addNews?add=news">Add News</a></li>
	<?php } ?>
</ul>
<?php if(!empty($_SESSION)){ ?>
	<div> 
		<p>Bonjour <?= $_SESSION['user']['pseudo'] ?></p> 
	</div>
<?php } ?>