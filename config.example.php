<?php

// Application :
const _RACINE = "../..";
const _PUBLIC = "/public";

// Base de données :
const _BDD_USAGER = '';
const _BDD_MOTDEPASSE = '';
const _BDD_HOTE = '';
const _BDD_BASE = 'cartylist';
const _BDD_DSN = 'mysql:dbname=' . _BDD_BASE . ';host=' . _BDD_HOTE;

if (file_exists(_RACINE . "/scripts/autoload.php")) {
	require_once _RACINE . "/scripts/autoload.php";
}
