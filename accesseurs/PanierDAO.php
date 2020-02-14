<?php 

namespace Accesseurs;

use Modeles\Panier;
use Modeles\Article;
use Accesseurs\Requetes\PanierSQL;
use Accesseurs\Requetes\ArticleSQL;
use Accesseurs\Connexion;

class PanierDAO implements PanierSQL
{

	public static function listerPaniers()
	{
		$demandePaniers = Connexion::instance()->basededonnees->prepare(PanierDAO::SQL_LISTE_PANIERS);
		$demandePaniers->execute();
		$paniersTableau = $demandePaniers->fetchAll(\PDO::FETCH_ASSOC);
		foreach($paniersTableau as $panierTableau) $paniers[] = new Panier($panierTableau);
		return $paniers;
	}
	
	public static function detaillerPanier($id)
	{
		$demandePanier = Connexion::instance()->basededonnees->prepare(PanierDAO::SQL_DETAIL_PANIER);
		$demandePanier->bindParam(':id', $id, \PDO::PARAM_INT);
		$demandePanier->execute();
		$panier = $demandePanier->fetch(\PDO::FETCH_ASSOC);
		return new Panier($panier);
	}

	public static function listeArticle($id) {
		$demandeArticle = Connexion::instance()->basededonnees->prepare(PanierDAO::SQL_ARTICLE_PANIER);
		$demandeArticle->bindParam(':id', $id, \PDO::PARAM_INT);
		$demandeArticle->execute();
		$articles = $demandeArticle->fetchAll(\PDO::FETCH_ASSOC);
		$articlesobj = [];
		foreach ($articles as $article) {
			$articlesobj[] = new Article($arcticle);
		}	

		return $articlesobj;
	}
}