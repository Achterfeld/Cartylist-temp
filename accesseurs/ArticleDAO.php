<?php 

namespace Accesseurs;

use Modeles\Panier;
use Modeles\Article;
use Accesseurs\Requetes\ArticleSQL;
use Accesseurs\Connexion;

class ArticleDAO
{

	public static function ajouterArticle($article) {
		$demandeArticle = Connexion::instance()->basededonnees->prepare(ArticleSQL::SQL_AJOUTER_ARTICLE);
		$demandeArticle->bindParam(':panier', $article->panier, \PDO::PARAM_INT);
		$demandeArticle->bindParam(':nom', $article->nom, \PDO::PARAM_STR);
		$demandeArticle->bindParam(':prix', $article->prix, \PDO::PARAM_STR);
		$demandeArticle->bindParam(':adresse', $article->adresse, \PDO::PARAM_STR);
		$demandeArticle->bindParam(':notes', $article->notes, \PDO::PARAM_STR);
		$demandeArticle->execute();
		$demandeArticle->closeCursor();
	}

	public static function editerArticle($article) {
		$demandeArticle = Connexion::instance()->basededonnees->prepare(ArticleSQL::SQL_EDITER_ARTICLE);
		$demandeArticle->bindParam(':id', $article->id, \PDO::PARAM_INT);
		$demandeArticle->bindParam(':panier', $article->panier, \PDO::PARAM_INT);
		$demandeArticle->bindParam(':nom', $article->nom, \PDO::PARAM_STR);
		$demandeArticle->bindParam(':prix', $article->prix, \PDO::PARAM_STR);
		$demandeArticle->bindParam(':adresse', $article->adresse, \PDO::PARAM_STR);
		$demandeArticle->bindParam(':notes', $article->notes, \PDO::PARAM_STR);
		$demandeArticle->execute();
		$demandeArticle->closeCursor();
	}

	public static function listerArticles() {
		$demandeArticles = Connexion::instance()->basededonnees->prepare(ArticleSQL::SQL_LISTE_ARTICLES);
		$demandeArticles->execute();
		$articles = $demandeArticles->fetchAll(\PDO::FETCH_ASSOC);
		$articlesObjs = [];
		foreach($articles as $article) $articlesObjs[] = new Article($article);
		return $articlesObjs;
	}
	
	public static function detaillerArticle($id) {
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

	public static function nombreArticlesPanier($idPanier) {
		$demandeArticle = Connexion::instance()->basededonnees->prepare(ArticleSQL::SQL_NOMBRE_ARTICLES_PANIER);
		$demandeArticle->bindParam(':id', $idPanier, \PDO::PARAM_INT);
		$demandeArticle->execute();
		$nombreArticle = $demandeArticle->fetch();
		return $nombreArticle;
	}
}