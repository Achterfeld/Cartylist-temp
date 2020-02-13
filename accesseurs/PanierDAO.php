<?php 

namespace Accesseurs;

use Modeles\Panier;
use Accesseurs\Requetes\PanierSQL;
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
}

// function formater($texte)
// {
// 	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
// 	$texte = htmlentities($texte,ENT_COMPAT,'ISO-8859-1');
// 	return $texte;

// }