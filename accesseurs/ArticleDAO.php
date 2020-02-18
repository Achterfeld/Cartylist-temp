<?php 

namespace Accesseurs;

use Modeles\Panier;
use Modeles\Article;
use Accesseurs\Requetes\ArticleSQL;
use Accesseurs\Connexion;

class ArticleDAO
{

	public static function listerArticles()
	{
		$demandeArticles = Connexion::instance()->basededonnees->prepare(ArticleSQL::SQL_LISTE_ARTICLES);
		$demandeArticles->execute();
		$articles = $demandeArticles->fetchAll(\PDO::FETCH_ASSOC);
		$articlesObjs = [];
		foreach($articles as $article) $articlesObjs[] = new Article($article);
		return $articlesObjs;
	}
	
	public static function detaillerArticle($id)
	{
		$demandeArticle = Connexion::instance()->basededonnees->prepare(ArticleSQL::SQL_DETAIL_ARTICLE);
		$demandeArticle->bindParam(':id', $id, \PDO::PARAM_INT);
		$demandeArticle->execute();
		$article = $demandeArticle->fetch(\PDO::FETCH_ASSOC);
		return new Article($article);
	}

	public static function listerArticlesPanier($idPanier) {
		$demandeArticles = Connexion::instance()->basededonnees->prepare(ArticleSQL::SQL_LISTE_ARTICLES_PANIER);
		$demandeArticles->bindParam(':id', $idPanier, \PDO::PARAM_INT);
		$demandeArticles->execute();
		$articles = $demandeArticles->fetchAll(\PDO::FETCH_ASSOC);
		$articlesObjs = [];
		foreach ($articles as $article) $articlesObjs[] = new Article($article);
		return $articlesObjs;
	}
}