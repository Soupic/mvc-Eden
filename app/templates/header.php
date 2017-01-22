<div id="menu" class="list-group">
	<div id="navigation">
		<ul id="usersNav">
			<li><a href="<?= BASE_URL?>home">home</a></li>
			<li><a href="<?= BASE_URL?>news">News</a></li>
			<li><a href="<?= BASE_URL?>caracters">Caracters</a></li>
			<?php if(!empty($_SESSION['user']) && $_SESSION['user']['id'] == 1 || 0) { 
			} else { ?>
				<li><a href="<?= BASE_URL?>login">Login</a></li>
			<?php } ?>
			<?php if(!empty($_SESSION)){ ?>
				<li><a href="<?= BASE_URL?>logout">Logout</a></li>
			<?php } 
					else { ?>
						<li><a href="<?= BASE_URL?>register">Registration</a></li>
					<?php } ?>
		</ul>
		<ul id="administation">
			<?php if(!empty($_SESSION['role']) &&  $_SESSION['role'] == true){ ?>
				<li><a href="<?= BASE_URL?>addNews?add=news">Add News</a></li>
			<?php } ?>
		</ul>
	</div>
</div>

<div id="title" class="">
	<h1>E-Den</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit..</p>
</div>

<?php if(!empty($_SESSION)){ ?>
	<div id="hello"> 
		<p>Bonjour <?= $_SESSION['user']['pseudo'] ?></p> 
	</div>
<?php } ?>