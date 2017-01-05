<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title><?= $title ?></title>
</head>
<body>
	<div>
		<?php include("app/templates/header.php");?>
	</div>
	<div>
		<?php include("app/templates/$page.php");?>
	</div>
</body>
</html>