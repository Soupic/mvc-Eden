<div class="form-group">
	<form method="post" class="connexion">
		<div>
			<label for="usernameOrEmail">Pseudo ou Email</label>
			<input type="text" name="usernameOrEmail" id="usernameOrEmail" class="form-control">
	
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control">
	
			<button type="submit" class="btn btn-default">Login</button>
		</div>
		<div>
			<p><?php if(isset($error)) echo $error; ?></p>
		</div>
	</form>
</div>