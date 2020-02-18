<?php 

namespace Accesseurs;

use Modeles\Panier;
use Accesseurs\Requetes\PanierSQL;
use Accesseurs\ArticleDAO;
use Accesseurs\Connexion;

class PanierDAO
{
	public static function listerPaniers()
	{
		$demandePaniers = Connexion::instance()->basededonnees->prepare(PanierSQL::SQL_LISTE_PANIERS);
		$demandePaniers->execute();
		$paniersTableau = $demandePaniers->fetchAll(\PDO::FETCH_ASSOC);
		foreach($paniersTableau as $panierTableau) {
			$panierTableau['articles'] = ArticleDAO::listerArticlesPanier($panierTableau["id"]);
			$paniers[] = new Panier($panierTableau);
		}
		return $paniers;
	}
	
	public static function detaillerPanier($id)
	{
		$demandePanier = Connexion::instance()->basededonnees->prepare(PanierSQL::SQL_DETAIL_PANIER);
		$demandePanier->bindParam(':id', $id, \PDO::PARAM_INT);
		$demandePanier->execute();
		$panier = $demandePanier->fetch(\PDO::FETCH_ASSOC);
		$panier['articles'] = ArticleDAO::listerArticlesPanier($id);
		return new Panier($panier);
	}
}