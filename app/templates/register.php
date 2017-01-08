<div>
	<form method="post" class="connexion">
		<div>
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo">

			<label for="email">Adresse mail</label>
			<input type="text" name="email" id="email" placeholder="Entrez votre adresse mail">

			<label for="password">Mot de passe</label>
			<input type="password" name="password" id="password" placeholder="Entrez votre mot de passe">

			<label for="passwordBis">Confirmation du mot de passe</label>
			<input type="password" name="passwordBis" id="passwordBis" placeholder="Resaisiez votre mot de passe">

			<label for="age">Votre Age</label>
			<input type="text" name="age" id="age">

			<button type="submit">Register</button>
		</div>
		<?php foreach ($errors as $error) : ?>
			<p><?= $error ?></p>
		<?php endforeach; ?>

	</form>
</div>