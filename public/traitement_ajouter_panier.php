<?php
require '../config.php';

// echo json_encode($_GET, JSON_PRETTY_PRINT);
$produits = [];

for ($i=0; $i < $_POST["nb_produits"]; $i++) {
    $produit = [];
    $produit["nom"] = $_POST["nom_produit_" . $i];
    $produit["prix"] = $_POST["prix_produit_" . $i];
    $produit["adresse"] = $_POST["adresse_produit_" . $i];
    $produit["notes"] = $_POST["notes_produit_" . $i];

    $produits[$i] = $produit;
}

print_r($produits);

try {
    $bdd = new PDO($DSN, $USAGER, $MDP);
    $sqlPanier = "INSERT INTO panier (nom) VALUES ('" . $_POST["nom_panier"] . "');";
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
    $demandeProduit->execute();
    $demandeProduit->closeCursor();
} catch(PDOException $e) {
	echo '<br>' . $e->getMessage() . '<br>';
}
?>