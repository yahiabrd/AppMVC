<?php

class ArticleManager extends Model
{
	public function getArticles()
	{
		return $this->getAll('articles', 'Article');
	}

	public function getArticleById($id)
	{
		$var = [];

		$req = self::getBdd()->prepare('SELECT * FROM articles WHERE id = ?');
		$req->execute(array($id));
		
		while($data = $req->fetch()){
			$var[] = new Article($data);
		}

		return $var;
		$req->closeCursor();
	}
}