<?php

require '../config.php';
//$id = $_GET['id'];
$id = 1;

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {



	$basededonnees = new PDO($dsn, $usager, $motdepasse);
	$SQL_SUPR_PANIER = "DELETE FROM panier WHERE id = " . $id;
	$demandePanier = $basededonnees->prepare($SQL_SUPR_PANIER);
	$demandePanier->execute();

} catch(PDOException $e) {

	echo '<br>' . $e->getMessage() . '<br>';
}

?>