<?php

namespace Model\Manager;

use Model\DbConnexion;
use PDO;

class NewsManager
{
	public function news()
	{
		$sql = "SELECT id, date_post, num_post, content, title, link, id_users
				FROM news
				ORDER BY num_post DESC";

		$dbh = DbConnexion::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetchAll(\PDO::FETCH_CLASS,'\Model\Entity\News');

		return $results;

	}

	public function lastNews()
	{
		$sql = "SELECT num_post
				FROM news
				ORDER BY id DESC
				LIMIT 1";

		$dbh =DbConnexion::getDbh();

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$results = $stmt->fetch();

		return $results;
	}

	public function addNews($numPost, $title, $content, $link, $idUsers)
	{
		$sql = "INSERT INTO news (id, date_post, num_post, title, content, link, id_users)
				VALUES (NULL, NOW(), :num_post, :title, :content, :link, :id_users)";

		$dbh = DbConnexion::getDbh();
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":num_post", $numPost);
		$stmt->bindValue(":title", $title);
		$stmt->bindValue(":content", $content);
		$stmt->bindValue(":link", $link);
		$stmt->bindValue(":id_users", $idUsers);
		
		return $stmt->execute();
	}
}