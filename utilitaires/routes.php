<?php

use Services\Authentification;




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

		case 'se-connecter':
			if(Authentification::authentifier($_POST['identifiant'], $_POST['mot-de-passe'])) {
				Authentification::chargerProfile($_POST['identifiant']);
			}
		break;

		default:
			break;
	}
}