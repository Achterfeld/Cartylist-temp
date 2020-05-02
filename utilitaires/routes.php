<?php

use Services\Authentification;
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

		case 'se-connecter':
			if(Authentification::authentifier($_POST['identifiant'], $_POST['mot-de-passe'])) {
				Authentification::chargerProfile($_POST['identifiant']);
			}
		break;

		case 'inscription':
			Authentification::nouveauUtilisateur(
				$_POST['nom'], 
				$_POST['mot-de-passe'], 
				$_POST["confirm-mot-de-passe"], 
				$_POST["identifiant"],
				$_POST["avatar-dernier"]
			);
			if(Authentification::authentifier($_POST['identifiant'], $_POST['mot-de-passe'])) {
				Authentification::chargerProfile($_POST['identifiant']);
			}
		break;

		case 'modification':
			Authentification::modifierProfil(
				$_POST['nom'],
				$_POST["identifiant"],
				$_POST["avatar-dernier"],
				$_POST['id']
			);
			Authentification::chargerProfileId($_POST['id']);
		break;

		case 'se-deconnecter':
			Authentification::deconnexion();
		break;

		default:
			break;
	}
}