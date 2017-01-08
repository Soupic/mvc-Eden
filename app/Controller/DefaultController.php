<?php

namespace Controller;

use View\View;
use Model\Manager\NewsManager;
use Model\Manager\CaractersManager;
use Model\Manager\UsersManager;
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
		$errors = [];
	 	$usersManager = new UsersManager();

	 	//on vérifie qu'il y a bien quelque chose dans $_POST
	 	if(!empty($_POST)){
	 		//on évite les injection XSS avec la fonction php strip_tags
	 		$pseudoXss = strip_tags($_POST['pseudo']);
	 		$pseudo = $this->formatPseudo($_POST['pseudo']);
	 		$email = strip_tags($_POST['email']);
	 		$password = $_POST['password'];
	 		$passwordBis = $_POST['passwordBis'];
	 		$age = $_POST['age'];

	 		if (empty($pseudo) || empty($email) || empty($password) || (empty($passwordBis))) {
	 			$errors[] = "Tout les champs ne sont pas remplis !!";
	 		}
	 		//on vérifie que les mot de passe sont identique
	 		if ($password != $passwordBis){
	 			$errors[] = "Votre mot de passe ne corresspond pas !!";
	 		}
	 		//on vérifie si le format de l'adresse mail est bien valide
	 		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	 			$errors[] = "Adresse mail invalide !";
	 		}
	 		//on vérifie si l'adresse mail n'existe pas
	 		$checkEmail = $usersManager->checkEmail($email);
	 		//si le tableau retourné n'est pas vide alors l'adresse est utilisé
	 		if (!empty($checkEmail)){
	 			$errors[] = "Cet email est déjà utilisé !";
	 		}
	 		if (empty($errors)){
	 			//hash du mdp
	 			$passwordHash = password_hash($password, PASSWORD_DEFAULT);

	 			//role par défault
	 			$role = 0;

	 			//génère une chaine alétoire via la librairie GitHub randomLib
	 			$factory = new \RandomLib\Factory;
	 			$generator = $factory->getGenerator(new \SecurityLib\Strength(\SecurityLib\Strength::MEDIUM));
	 			$token = $generator->generateString(50, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

	 			//insertion dans la base de donnée
	 			$insertUser = $usersManager->insertUser($pseudo, $email, $passwordHash, $token, $age, $role);
	 			//si la requete fonctionne
	 			if ($insertUser) {
	 				//on pourrait aussi directement connecter l'utilisateur ici
                    $user = $userManager->getUserByEmailOrUsername($username);
                    $_SESSION['user'] = $user;
                    //redirige sur l'accueil
                    header("Location: ".BASE_URL);
	 			}
	 			else {
	 				$errors[] = "Une erreur ces produite !";
	 			}

	 		}

	 	}
	 	View::show("register.php", "Register", ["errors" => $errors]);
	}

		//Vérification si longueur et format correct du pseudo
	function formatPseudo($pseudo)
	{
		//on créer un tableau d'erreur
		$errors = [];
		//on créer un tableau de valeur interdites
		$exclusions = ["admin", "administrateur", "administrator"];
		//on vérifie la longueur du pseudo
		if(strlen($pseudo) > 20){
			$errors[] = "User Name trop long, doit contenir moins de 20 caractères";
		}
		else{
			foreach ($exclusions as $value) {
				if($pseudo == $value){
					$errors[] = "User Name réservé";
				}
			}
		}
		return $pseudo;
		
	}
}