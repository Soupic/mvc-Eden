<?php
session_start();

//on va chercher le controller
use Controller\Dispatcher;

//inportation du fichier config
require("app/config/config.php");
//importation du fichier route!
require("app/config/routes.php");
//On importe le fichier autoload pour composer
require("vendor/autoload.php");

//autochargement des clases
spl_autoload_register(function($className){
	//contien le slash en fonction du systeme d'exploitation
	$path = "app" . DIRECTORY_SEPARATOR . str_replace("\\", DIRECTORY_SEPARATOR, $className) . ".php";
	if (file_exists($path)){
			require($path);
		}
});

//Le dispatcher récupère les URL grace au $_GET et les converti en url propre
$p = (empty($_GET['p'])) ? "/" : $_GET['p'];
$dispatcher = new Dispatcher();
$dispatcher->dispatch($routes, $p);