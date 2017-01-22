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
		$error = null;
		//si $_POST n'est pas vide on vérifie le username ou l'email
		if (!empty($_POST)) {
			//on récupère le usernameOrEmail saisie par l'utilisateur
			$usernameOrEmail = $_POST["usernameOrEmail"];
			$usersManager = new UsersManager();
			//on appel la fonction de vérification usernameOrEmail
			$user = $usersManager->getUserByEmailOrUsername($usernameOrEmail);

			//on vérifie si il est admin ou pas
			$userRoles = $usersManager->getAdminOnly($usernameOrEmail);
			//on boucle pour vérifié si la méthode nous à retourné un utiliateur admin, si oui on stock dans $SESSION['role'] la valeur true
			if(!empty($userRoles)){
				$_SESSION['role'] = true;
				}
				else {
					$_SESSION['role'] = false;
				}
			

			//hash le password et le compare à celui de la base de donnée
			if (password_verify($_POST['password'], $user['password'])){
				//utilisation de $_SESSION pour socké une donnée pour l'utilisé lors de l'autorisation des page sécurisés
				$_SESSION['user'] = $user;

				//$_COOKIE pour la lecture
                //on stocke le token dans un cookie
                //on ne devrait placer ce cookie que si une case est cochée
                //pour l'instant, ce cookie ne sert à rien !!!
                setcookie("remember_me", $user['token'], strtotime("+ 1 months"), "/");
                //redirige vers le menu
                header("Location: ".BASE_URL);
			}
			else {
				//erreur en cas de mauvaise saisie
				$error = "Erreur de pseudo ou de mot de passe";
			}
		}
		View::show("login.php", "Login", ["error" => $error]);
	}

	function register()
	{
		$errors = [];
	 	$usersManager = new UsersManager();

	 	//on vérifie qu'il y a bien quelque chose dans $_POST
	 	if(!empty($_POST)){
	 		//on évite les injection XSS avec la fonction php strip_tags
	 		$pseudo = strip_tags($_POST['pseudo']);
	 		$email = strip_tags($_POST['email']);
	 		$password = $_POST['password'];
	 		$passwordBis = $_POST['passwordBis'];
	 		$age = $_POST['age'];

	 		if (empty($pseudo) || empty($email) || empty($password) || (empty($passwordBis))) {
	 			$errors[] = "Tout les champs ne sont pas remplis !!";
	 		}
	 		if (strlen($pseudo) > 20) {
	 			$errors[] = "Votre pseudo est trop long";
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
                    $user = $usersManager->getUserByEmailOrUsername($pseudo);
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

	function logout()
	{
		View::show("logout.php", "Logout");
	}

	function adminNews()
	{

		$usersManager = new UsersManager();
		$user = $usersManager->checkPseudo($_SESSION['user']['pseudo']);
		$news = $_GET['add'];
		

		if(!empty($_SESSION['role'] == true ) && !empty($news)){
			$newsManager = new NewsManager();
			$imagesManager = new ImagesManager();
			if (!empty($_POST['title']) && !empty($_POST['content']) && (($_POST['link']) || ($_POST['link'] == null))) {
				$initNumPost = 0;
				$numPost = $newsManager->lastNews();
				$initNumPost = intval($numPost['num_post']);
				$initNumPost += 1;
				$title = $_POST['title'];
				$content = $_POST['content'];
				$link = $_POST['link'];
				$newsManager->addNews($initNumPost, $title, $content, $link, intval($user));
			}
		}
		 else {
		 	View::show("errors/404.php", "Page Not Found");
		 }
		
		View::show("addNew.php", "Add News");

	}

}