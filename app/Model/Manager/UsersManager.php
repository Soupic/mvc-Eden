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
				WHERE add_mail = :email";

		$dbh = DbConnexion::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":add_mail", $email);
		$stmt->execute();

		$restults = $stmt->fetch();

		return $restults;
	}

	//methode d'insertion d'un utilisateur
	public function insertUser($date_registration, $pseudo, $email, $passwordHash, $token, $age, $role)
	{
		$sql = "INSERT INTO users (id, date_registration, pseudo, add_mail, password, token, age, role)
				VALUES (NULL, NOW(), :pseudo, :add_mail, :password, : token, :age, :role)";

		$dbh = DbConnexion::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":pseudo", $pseudo);
		$stmt->bindValue(":add_mail", $email);
		$stmt->bindValue(":password", $passwordHash);
		$stmt->bindValue(":token", $token);
		$stmt->bindValue(":age", $age);
		$stmt->bindValue(":role", $role);

		return $stmt->execute();
	}
}