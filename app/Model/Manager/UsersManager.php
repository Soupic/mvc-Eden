<?php

namespace Model\Manager;

use Model\DbConnexion;
use PDO;

class UsersManager
{
	//methode pour vérifié si le pseudo n'existe pas déjà
	public function checkPseudo($pseudo)
	{
		$sql = "SELECT id
				FROM users
				WHERE pseudo = :pseudo";

		//on ce connect à la base de donnée
		$dbh = DbConnexion::getDbh();

		//on prepare la raquete
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":pseudo", $pseudo);
		$stmt->execute();
		$results = $stmt->fetch();

		return $results;
	}

	//meme chose avec l'adresse mail
	public function checkEmail($email)
	{
		$sql = "SELECT id
				FROM users
				WHERE email = :email";

		$dbh = DbConnexion::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":email", $email);
		$stmt->execute();

		$restults = $stmt->fetch();

		return $restults;
	}

	//methode d'insertion d'un utilisateur
	public function insertUser($pseudo, $email, $passwordHash, $token, $age, $role)
	{
		$sql = "INSERT INTO users (id, date_registation, pseudo, email, password, token, age, role)
				VALUES (NULL, NOW(), :pseudo, :email, :password, :token, :age, :role)";

		$dbh = DbConnexion::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":pseudo", $pseudo);
		$stmt->bindValue(":email", $email);
		$stmt->bindValue(":password", $passwordHash);
		$stmt->bindValue(":token", $token);
		$stmt->bindValue(":age", $age);
		$stmt->bindValue(":role", $role);

		return $stmt->execute();
	}

	public function getUserByEmailOrUsername($usernameOrEmail)
    {
        $sql = "SELECT * FROM users 
				WHERE pseudo = :usernameOrEmail 
				OR email = :usernameOrEmail";

        $dbh = DbConnexion::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":usernameOrEmail", $usernameOrEmail);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }

    public function getAdminOnly($usernameOrEmail)
    {
    	$sql = "SELECT pseudo, role
    			FROM users
    			WHERE pseudo = :usernameOrEmail AND role = 1
    			OR email = :usernameOrEmail AND role = 1";

    	$dbh = DbConnexion::getDbh();
    	$stmt = $dbh->prepare($sql);
    	$stmt->bindValue(":pseudo", $usernameOrEmail);
    	$stmt->bindValue(":usernameOrEmail", $usernameOrEmail);
    	$stmt->execute();

    	$results = $stmt->fetch();

    	return $results;
    }
}