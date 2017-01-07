<?php

namespace Model\Manager;

use Model\DbConnexion;
use PDO;
use Model\Entity\Caracters;

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


}