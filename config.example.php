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

// Stripe API :
$stripe = [
    "secret_key"      => "",
    "publishable_key" => "",
];

// Autoloading :
if (file_exists(_RACINE . "/utilitaires/autoload.php")) {
	require_once _RACINE . "/utilitaires/autoload.php";
}

// Initialisation stripe :
require_once _RACINE . '/lib/stripe-php-7.24.0/init.php';
\Stripe\Stripe::setApiKey($stripe['secret_key']);