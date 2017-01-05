<?php

namespace Model\Manager;

use Model\DbConnexion;
use PDO;

class NewsManager
{
	public function news()
	{
		$sql = "SELECT id, date_post, content, title, link, id_users
				FROM news";

		$dbh = DbConnexion::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS,'\Model\Entity\News');

		return $results;

	}
}