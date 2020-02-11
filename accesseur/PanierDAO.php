<?php 

	require_once "../../modele/Panier.php";
	require_once "../../accesseur/PanierSQL.php";

	class Accesseur
	{
		public static $basededonnees = null;

		public static function initialiser()
		{
			$usager = 'mateo';
			$motdepasse = 'Matane';
			$hote = '51.161.8.152';
			$base = 'cartylist';
			$dsn = 'mysql:dbname='.$base.';host=' . $hote;
			PanierDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse);
			PanierDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}
	
	class PanierDAO extends Accesseur implements PanierSQL
	{				
		public static function listerPaniers()
		{
			
			PanierDAO::initialiser();

			$demandePaniers = PanierDAO::$basededonnees->prepare(PanierDAO::SQL_LISTE_PANIERS);
			$demandePaniers->execute();
			$paniersTableau = $demandePaniers->fetchAll(PDO::FETCH_ASSOC);
			foreach($paniersTableau as $panierTableau) $paniers[] = new Panier($panierTableau);
			return $paniers;
		}
		
		public static function detaillerContrat($id)
		{
			ContratDAO::initialiser();

			$demandePanier = ContratDAO::$basededonnees->prepare(ContratDAO::SQL_DETAIL_PANIER);
			$demandePanier->bindParam(':id', $id, PDO::PARAM_INT);
			$demandeContrat->execute();
			$panier = $demandePanier->fetch(PDO::FETCH_ASSOC);
			return new Panier($panier);
		}
	
		
	}

function formater($texte)
{
	$texte = html_entity_decode($texte,ENT_COMPAT,'UTF-8');
	$texte = htmlentities($texte,ENT_COMPAT,'ISO-8859-1');
	return $texte;

}
?>