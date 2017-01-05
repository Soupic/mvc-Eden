<?php

namespace Controller;

use View\View;
use Model\Manager\NewsManager;
use Model\Manager\CaractersManager;

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

	function contact()
	{
		echo "contact";
	}

	function error404()
	{
		echo "error404";
	}

	function login()
	{
		echo "login";
	}

	function registration()
	 {
	 	echo "registration";
	 }
}