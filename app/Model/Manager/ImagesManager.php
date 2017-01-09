<?php

namespace Model\Manager;

use Model\DbConnexion;
use PDO;
use Model\Entity\Images;

class ImagesManager
{
	/*
	Function pour récupéré les images lié un personnage
	Pensé à changer la page et l'url, cette fonction sera pour l'affichage d'un seul personnage elle doit affiché toute les images lié au personnage
	Regardé comment récupéré l'id, surmeent à mettre dans un $_GET

	 */
	public function allImageCaracters($caracterId)
	{
		$sql = "SELECT img.id, img.name, img.type, img.id_caracters
				FROM images img
				INNER JOIN caracters car
				ON img.id_caracters = car.id
				WHERE car.id = :caract_id;";

		$dbh = DbConnexion::getDbh();
	
		$dbh = DbConnexion::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":caract_id", $caracterId);
		$stmt->execute();

		$results = $stmt->fetchAll(\PDO::FETCH_CLASS,'\Model\Entity\Images');
	
		return $results;
	}

	public function caractresImage($caracterId)
	{
		$sql = "SELECT img.id, img.name, img.type, img.id_caracters
				FROM images img
				INNER JOIN caracters car
				ON img.id_caracters = car.id
				WHERE car.id = :caract_id;";



		$dbh = DbConnexion::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":caract_id", $caracterId);
		$stmt->execute();

		$results = $stmt->fetch();

		return $results;
	}


	public function addImage($name, $type)
	{
		$sql = "INSERT INTO images (id, name, type
				VALUES (NULL, :name, :type)";

		$dbh = DbConnexion::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":name", $name);
		$stmt->bindValue(":type", $type);
		
		return $stmt->execute();

	}
}