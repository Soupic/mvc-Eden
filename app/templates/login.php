<div>
	<form method="post" class="connexion">
		<div>
			<label for="usernameOrEmail">Pseudo ou Email</label>
			<input type="text" name="usernameOrEmail" id="usernameOrEmail">
	
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
	
			<button type="submit">Login</button>
		</div>
		<div>
			<p><?php if(isset($error)) echo $error; ?></p>
		</div>
	</form>
</div>