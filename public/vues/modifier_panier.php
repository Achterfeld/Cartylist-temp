<?php require_once './../../config.php' ?>

<?php
try {
	$bdd = new PDO($DSN, $USAGER, $MDP);
	$sqlPanier = "SELECT panier.id, panier.nom FROM panier WHERE id=" . $_GET["id"] . ";";
	$demandePanier = $bdd->prepare($sqlPanier);
	$demandePanier->execute();
    $panier = $demandePanier->fetch(PDO::FETCH_ASSOC);
    
	$sqlProduits = "SELECT article.id, article.nom, article.prix, article.adresse, article.notes FROM article WHERE article.panier=" . $_GET["id"] . ";";
	$demandeProduits = $bdd->prepare($sqlProduits);
	$demandeProduits->execute();
	$produits = $demandeProduits->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
	echo '<br>' . $e->getMessage() . '<br>';
}
?>

<?php include "./includes/header.php" ?>
    <main>
        <div class="conteneur-centre-page">
            <div class="conteneur panier-editer">
                <form method="POST" action="./traitement_modifier_panier.php">
                    <div class="lil-row ">
                        <h1>Modifier un panier:</h1>
                        <div class="lil-col 12-12">
                            <input class="champ-texte width-100 block" type="text" placeholder="Nom du panier" name="nom_panier" value="<?= $panier["nom"] ?>">
                            <input type="hidden" name="id_panier" value="<?= $panier["id"] ?>">
                        </div>
                    </div>

                    <!-- Ajoue d'un produit -->
                    <div id="conteneur-produits">
                        <?php foreach ($produits as $i => $produit) { ?>
                            <div id="<?= $i ?>" class="panier-conteneur">
                                <h3>Ajouter un produit:</h3>
                                <div class="lil-row lil-col between margin-tb-10">
                                    <input class="champ-texte lil-col 8-12" type="text" placeholder="Nom du produit" name="nom_produit_<?= $i ?>" value="<?= $produit['nom'] ?>">
                                    <input class="champ-texte lil-col 4-12" type="text" placeholder="Prix"  name="prix_produit_<?= $i ?>" value="<?= $produit['prix'] ?>">
                                </div>
                                <input class="champ-texte width-100 margin-tb-10" type="text" placeholder="Adresse du produit"  name="adresse_produit_<?= $i ?>" value="<?= $produit['adresse'] ?>">
                                <textarea class="champ-texte width-100 margin-tb-10" placeholder="Si vous avez des notes" name="notes_produit_<?= $i ?>"><?= $produit['notes'] ?></textarea>
                            </div>
                        <?php } ?>
                    </div>
                   <input id="nb-produits" type="hidden" name="nb_produits" value="<?= count($produits) ?>">

                    <!-- Fin de l'ajoue d'un produit -->
                    <button  type="submit" class="bouton sauvegarder-btn">Sauvegarder</button>
                </form>
                <div class="">
                    <button id="ajouterProduit" class="bouton margin-tb-5">Ajouter un produit</button>
                </div>
            </div>
        </div>

    </main>
    <script src="../js/panier.js"></script>
<?php include "./includes/footer.php" ?>