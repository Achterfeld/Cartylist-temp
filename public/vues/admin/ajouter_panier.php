<?php const _VUES = "../"; ?>
<?php require_once './../../../config.php' ?>

<?php include "../includes/header.php" ?>
    <main>
        <div class="conteneur-centre-page">
            <div class="conteneur panier-editer">
                <form method="POST" action="<?= _PUBLIC ?>/vues/admin/liste_panier.php">
                    <div class="lil-row ">
                        <h1>Ajouter un panier:</h1>
                        <div class="lil-col 12-12">
                            <input class="champ-texte width-100 block" type="text" placeholder="Nom du panier" name="nom_panier">
                        </div>
                    </div>

                    <!-- Ajoue d'un produit -->
                    <div id="conteneur-produits">
                        <div id="0" class="panier-conteneur">
                            <h3>Ajouter un produit:</h3>
                            <div class="lil-row lil-col between margin-tb-10">
                                <input class="champ-texte lil-col 8-12" type="text" placeholder="Nom du produit" name="nom_produit_0">
                                <input class="champ-texte lil-col 4-12" type="text" placeholder="Prix"  name="prix_produit_0">
                            </div>
                            <input class="champ-texte width-100 margin-tb-10" type="text" placeholder="Adresse du produit"  name="adresse_produit_0">
                            <textarea class="champ-texte width-100 margin-tb-10" placeholder="Si vous avez des notes" name="notes_produit_0"></textarea>
                        </div>
                    </div>
                   <input id="nb-produits" type="hidden" name="nb_produits" value="1">

                   <input name="action" type="hidden" value="panier-ajouter">

                    <!-- Fin de l'ajoue d'un produit -->
                    <button  type="submit" class="bouton sauvegarder-btn">Sauvegarder</button>
                </form>
                <div class="">
                    <button id="ajouterProduit" class="bouton margin-tb-5">Ajouter un produit</button>
                </div>
            </div>
        </div>

    </main>
    <script src="../../js/panier.js"></script>
<?php include "../includes/footer.php" ?>