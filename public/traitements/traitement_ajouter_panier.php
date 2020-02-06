<?php
require '/config.php';

// echo json_encode($_GET, JSON_PRETTY_PRINT);
$produits = [];

for ($i=0; $i < $_POST["nb_produits"]; $i++) {
	$produit = [];
	$produit["nom"] = filter_var($_POST["nom_produit_" . $i],FILTER_SANITIZE_STRING);
	$produit["prix"] = filter_var(filter_var($_POST["prix_produit_" . $i],FILTER_SANITIZE_FLOAT),FILTER_VALIDATE_FLOAT);
	$produit["adresse"] = filter_var($_POST["adresse_produit_" . $i],FILTER_SANITIZE_STRING);
	$produit["notes"] = filter_var($_POST["notes_produit_" . $i],FILTER_SANITIZE_STRING);

	$produits[$i] = $produit;
}

print_r($produits);

try {
	$bdd = new PDO($DSN, $USAGER, $MDP);
	$sqlPanier = "INSERT INTO panier (nom) VALUES ('" . filter_var($_POST["nom_panier"],FILTER_SANITIZE_STRING) . "');";
	$demandePanier = $bdd->prepare($sqlPanier);
	$demandePanier->execute();
	$panierId = $bdd->lastInsertId();
	$demandePanier->closeCursor();

	$sqlProduits = "";
	foreach ($produits as $produit) {
		$sqlProduits = $sqlProduits . "INSERT INTO article (panier, nom, prix, adresse, notes) VALUES (" . 
			$panierId . ",'" . 
			$produit["nom"] . "'," .
			$produit["prix"] . ",'" .
			$produit["adresse"] . "','" .
			$produit["notes"] . "');";
	}
	$demandeProduit = $bdd->prepare($sqlProduits);
	$demandeProduit->bindParam(":panier", $panierId, PDO::PARAM_INT);
	$demandeProduit->bindParam(":nom",$produit["nom"] , PDO::PARAM_STR);
	$demandeProduit->bindParam(":prix", $produit["prix"] , PDO::PARAM_STR);
	$demandeProduit->bindParam(":adresse",$produit["adresse"] , PDO::PARAM_STR);
	$demandeProduit->bindParam(":notes", $produit["notes"], PDO::PARAM_STR);
	$demandeProduit->execute();
	$demandeProduit->closeCursor();
} catch(PDOException $e) {
	echo '<br>' . $e->getMessage() . '<br>';
}


?>