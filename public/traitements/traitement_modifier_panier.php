<?php
require_once './../../config.php';

// echo json_encode($_GET, JSON_PRETTY_PRINT);
$produits = [];

for ($i=0; $i < $_POST["nb_produits"]; $i++) {
    $produit = [];
    $produit["nom"] = filter_var($_POST["nom_produit_" . $i],FILTER_SANITIZE_STRING);
    $produit["prix"] = filter_var(filter_var($_POST["prix_produit_" . $i],FILTER_SANITIZE_NUMBER_FLOAT),FILTER_VALIDATE_FLOAT);
    $produit["adresse"] = filter_var($_POST["adresse_produit_" . $i],FILTER_SANITIZE_STRING);
    $produit["notes"] = filter_var($_POST["notes_produit_" . $i],FILTER_SANITIZE_STRING);

    $produits[$i] = $produit;
}
print_r($produits);

$panier = [];
$panier["id_panier"] = filter_var(filter_var($_POST["id_panier"],FILTER_SANITIZE_NUMBER_INT),FILTER_VALIDATE_INT);
$panier["nom_panier"] = filter_var($_POST["nom_panier"],FILTER_SANITIZE_STRING);

try {

    $bdd = new PDO($DSN, $USAGER, $MDP);
    $sqlPanier = "
        UPDATE panier SET nom = :nom_panier WHERE panier.id = :id_panier ;
        DELETE FROM article WHERE article.panier = :id_panier;";
    $demandePanier = $bdd->prepare($sqlPanier);
    $demandePanier->bindParam(":id_panier",$panier["id_panier"] , PDO::PARAM_INT);
    $demandePanier->bindParam(":nom_panier",$panier["nom_panier"] , PDO::PARAM_STR);
    $demandePanier->execute();
    $demandePanier->closeCursor();
    
    foreach ($produits as $produit) {
        $sqlProduit = "INSERT INTO article (panier, nom, prix, adresse, notes) VALUES (:panier,:nom,:prix,:adresse,:notes)";
        $demandeProduit = $bdd->prepare($sqlProduit);
        $demandeProduit->bindParam(":panier", $panier["id_panier"], PDO::PARAM_INT);
        $demandeProduit->bindParam(":nom",$produit["nom"] , PDO::PARAM_STR);
        $demandeProduit->bindParam(":prix", $produit["prix"] , PDO::PARAM_STR);
        $demandeProduit->bindParam(":adresse",$produit["adresse"] , PDO::PARAM_STR);
        $demandeProduit->bindParam(":notes", $produit["notes"], PDO::PARAM_STR);
        $demandeProduit->execute();
        $demandeProduit->closeCursor();
    }    
} catch(PDOException $e) {
	echo '<br>' . $e->getMessage() . '<br>';
}
?>