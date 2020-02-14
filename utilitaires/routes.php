<?php

use Controleurs\PanierControleur;

// Controleurs:
$panierControleur = new PanierControleur();

// Routes GET:
switch ($_GET["route"]) {
	default:
		break;
}

// Routes POST:
switch ($_POST["route"]) {
	case 'panier-ajouter':
		$panierControleur->stocker();
		break;
	
	case 'panier-editer':
		$panierControleur->mettreAJour();
		break;

	case 'panier-effacer':
		$panierControleur->effacer();
		break;

	default:
		break;
}