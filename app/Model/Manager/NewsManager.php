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

	public function addNews($title, $content, $link, $idUsers)
	{
		$sql = "INSERT INTO news (id, date_post, title, content, link, id_users)
				VALUES (NULL, NOW(), :title, :content, :link, :id_users)";

		$dbh = DbConnexion::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":title", $title);
		$stmt->bindValue(":content", $content);
		$stmt->bindValue(":link", $link);
		$stmt->bindValue(":id_users", $idUsers);
		
		return $stmt->execute();
	}
}