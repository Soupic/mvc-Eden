<?php

namespace Model\Manager;

class ImagesManager
{
	/*
	Function pour récupéré les images lié un personnage
	Pensé à changer la page et l'url, cette fonction sera pour l'affichage d'un seul personnage elle doit affiché toute les images lié au personnage
	Regardé comment récupéré l'id, surmeent à mettre dans un $_GET

	 */
	public function allImageCaracters($id)
	{
		$sql = "SELECT id, name, type, id_caracters
				FROM images img
				INNER JOIN caracters car
				ON img.id_caracters = car.id
				WHERE car.ig = :id";

		$dbh = DbConnexion::getDbh();
	
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();

		$results = $stmt->fetch();
	
		return $results;

	}

	public function caractresImage()
	{
		$sql = "SELECT id, name, type, id_caracters
				FROM images img
				INNER JOIN caracters car
				ON img.id_caracters = car.id";

		$dbh = DbConnexion::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->execute();

		$results = $stmt->fetch();

		return $results;
	}
}