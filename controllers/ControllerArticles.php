<?php
require_once('views/View.php');

class ControllerArticles
{
	private $_articleManager;
	private $_view;

	public function __construct($url)
	{

		if(isset($url) && is_array($url) && sizeof($url) > 1)
			throw new Exception("Page introuvable");
		else
		{

			if(isset($_GET['param']) && !empty($_GET['param']))
			{

				$param = explode('/', filter_var($_GET['param'], FILTER_SANITIZE_URL));
				$prm = (int) $param[0];

				if(is_array($param) && sizeof($param) == 1 && is_int($prm))
					$this->article($prm);

			}else
				throw new Exception("Page introuvable");
		}
	}

	public function article($id)
	{
		$this->_articleManager = new ArticleManager;
		$articles = $this->_articleManager->getArticleById($id);

		if(sizeof($articles) == 1)
		{
			$this->_view = new View('Articles');
			$this->_view->generate(array('articles' => $articles));
		}else
		{
			$this->articles();
		}
	}

	public function articles()
	{
		$this->_articleManager = new ArticleManager;
		$articles = $this->_articleManager->getArticles();

		$this->_view = new View('Accueil');
		$this->_view->generate(array('articles' => $articles));
	}
}