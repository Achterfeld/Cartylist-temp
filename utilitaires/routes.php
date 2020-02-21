<?php

use Controleurs\PanierControleur;

if (isset($_GET["action"])) {
	// Routes GET:
	switch ($_GET["action"]) {
		default:
			break;
	}
}

if (isset($_POST["action"])) {
	// Routes POST:
	switch ($_POST["action"]) {
		case 'panier-ajouter':
			PanierControleur::stocker();
			break;
		
		case 'panier-editer':
			PanierControleur::mettreAJour();
			break;

		case 'panier-effacer':
			PanierControleur::effacer();
			break;

		default:
			break;
	}
}