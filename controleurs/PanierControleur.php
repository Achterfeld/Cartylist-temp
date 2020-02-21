<?php

namespace Controleurs;

use Controleurs\ControleurCRUD;
use Accesseurs\PanierDAO;
use Accesseurs\ArticleDAO;
use Modeles\Article;
use Modeles\Panier;

class PanierControleur implements ControleurCRUD
{
	public static function lister() {
		return PanierDAO::listerPaniers();
	}

	public static function detailler() {
		return PanierDAO::detaillerPanier($_GET["id"]);
	}

	public static function ajouter() {
	
	}

	public static function stocker() {
		$articles = [];

		for ($i=0; $i < $_POST["nb_produits"]; $i++) {
			$article = [];
			$article["nom"] = $_POST["nom_produit_" . $i];
			$article["prix"] = $_POST["prix_produit_" . $i];
			$article["adresse"] = $_POST["adresse_produit_" . $i];
			$article["notes"] = $_POST["notes_produit_" . $i];

			$articles[$i] = $article;
		}

		try {
			$lastid = PanierDAO::ajouterPanier(new Panier(["nom" => $_POST["nom_panier"]]));
			foreach ($articles as $article) {
				$article['panier'] = $lastid;
				ArticleDAO::ajouterArticle(new Article($article));
			}
		} catch(\PDOException $e) {
			echo '<br>' . $e->getMessage() . '<br>';
		}
	}

	public static function editer() {
		return PanierDAO::detaillerPanier($_GET["id"]);
	}

	public static function mettreAJour() {

		$articles = [];

		for ($i=0; $i < $_POST["nb_produits"]; $i++) {
			$article = [];
			$article["id"] = (isset($_POST["id_produit_" . $i])) ? $_POST["id_produit_" . $i] : "";
			$article["nom"] = $_POST["nom_produit_" . $i];
			$article["prix"] = $_POST["prix_produit_" . $i];
			$article["adresse"] = $_POST["adresse_produit_" . $i];
			$article["notes"] = $_POST["notes_produit_" . $i];
			$article["action"] = $_POST["action_produit_" . $i];
			$article["panier"] = $_POST["id_panier"];

			$articles[$i] = $article;
		}

		try {
			PanierDAO::editerPanier(new Panier(["id"=> $_POST["id_panier"], "nom" => $_POST["nom_panier"]]));
			foreach ($articles as $article) {
				if ($article["action"] == "ajouter")
					ArticleDAO::ajouterArticle(new Article($article));
				elseif ($article["action"] == "modifier")
					ArticleDAO::editerArticle(new Article($article));
			}
		} catch(\PDOException $e) {
			echo '<br>' . $e->getMessage() . '<br>';
		}
	}

	public static function effacer() {

	}
}
