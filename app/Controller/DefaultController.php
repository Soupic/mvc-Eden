<?php

namespace Controller;

use View\View;
use Model\Manager\NewsManager;
use Model\Manager\CaractersManager;
use Model\Entity\Caracters;
use Model\Manager\ImagesManager;

class DefaultController
{
	function home()
	{
		View::show("home.php", "Acceuil");
	}

	function news()
	{
		$newsManager = new NewsManager();
		$news = $newsManager->news();

		$data = [
			"news" => $news,
		];

		View::show("news.php", "News", $data);
	}

	function videos()
	{
		echo "video";
	}

	function caracters()
	{
		$caractersManager = new CaractersManager();
		$caracters = $caractersManager->caracters();

		$data = [
			"caracters" => $caracters,
		];

		View::show("caracters.php", "Caracters", $data);
	}

	function caracterDetail()
	{
		$imagesManager = new ImagesManager();
		$caractersManager = new CaractersManager();
		$caracters = $caractersManager->caracters();
		$id = $_GET['id'];
		if(!empty($id)) {
			if(!empty($id)) {
				$images = $imagesManager-> allImageCaracters($id);
			}
			else {
				$images = $imagesManager-> allImageCaracters();
			}
		}

		$data = [
			"images" => $images,
			"caracters" => $caracters,

		];

		View::show("caracterDetails.php", "Caracters", $data);
	}

	function contact()
	{
		echo "contact";
	}

	function error404()
	{
		header("HTTP/1.0 403 Forbidden");
		View::show("errors/404.php", "Forbidden ?");
	}

	function login()
	{
		echo "login";
	}

	function register()
	 {
	 	echo "registration";
	 }
}