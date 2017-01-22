<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>/public/css/bootstrap.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>/public/css/bootstrap-theme.css">
	<title><?= $title ?></title>
</head>
<body>
	<div id="header">
		<?php include("app/templates/header.php");?>
	</div>
	<div id="page">
		<?php include("app/templates/$page.php");?>
	</div>
</body>
</html>