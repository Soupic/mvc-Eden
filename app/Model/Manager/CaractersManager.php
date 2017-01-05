<?php

namespace Model\Manager;

use Model\DbConnexion;
use PDO;

class CaractersManager
{
	public function caracters()
	{
		$sql = "SELECT id, name, resume
				FROM caracters";

		$dbh = DbConnexion::getDbh();
	
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS,'\Model\Entity\Caracters');
	
		return $results;

	}

	/*
		Function pour récupéré les images lié un personnage

		Pensé à changer la page et l'url, cette fonction sera pour l'affichage d'un seul personnage elle doit affiché toute les images lié au personnage

		Regardé comment récupéré l'id, surmeent à mettre dans un $_GET
	 */
	public function imageCaracters()
	{
		$sql = "SELECT id, name, type, id_caracters
				FROM images img
				INNER JOIN caracters.car
				ON img.id_caracters = car.id
				WHERE car.ig = :id";

		$dbh = DbConnexion::getDbh();
	
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();

		$results = $stmt->fetch();
	
		return $results;

	}
}