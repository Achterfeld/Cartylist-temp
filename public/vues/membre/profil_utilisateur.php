<?php const _VUES = "../"; ?>
<?php require_once './../../../config.php' ?>

<?php include_once _RACINE . "/utilitaires/routes.php" ?>

<?php include "../includes/header.php" ?>
<link rel='stylesheet' href='../../css/profil_utilisateur.css'>
    <main>
		<div class="conteneur-centre-page">
            <?php if(isset($_SESSION['utilisateur'])) {?>
            <div class="profil">
				<h1>Mon profil</h1>
                <img class="profil-image" src="<?= $_SESSION['utilisateur']['avatar'] ?>" alt="avatar-utilisateur">
                <div class="profil-infos">
                
                        <h3>Nom d'utilisateur</h3>
                        <p><?= $_SESSION['utilisateur']['prenom'] ?></p>
                        <h3>Email</h3>
                        <p><?= $_SESSION['utilisateur']['mail']?></p>
                        <!-- <h3>Liste des paniers publiques:</h3>
                    <p><a href="<?= _PUBLIC ?>/vues/membre/liste_panier.php">Liste ici</a></p> -->
                        
                        <button class="bouton">Modifier les informations</button>
                        <br>
                        <br>
                        <a href="liste_transaction.php"><button class="bouton">Voir mes transactions</button></a>
                        <br><br>
                        <a href="../admin/ajouter_panier.php"><button class="bouton">Créer un panier</button></a>
                        <br><br>
                        <button class="bouton" id="checkout-button">Faire un don</button>
                        <br><br>
                        <form action="<?= _PUBLIC ?>/vues/membre/profil_utilisateur.php" method="POST">
                            <input type="hidden" name="action" value="se-deconnecter">
                            <button type="submit" class="bouton-secondaire">Se déconnecter</button>
                        </form>
                </div>
                
            </div>
            <?php } else { ?>
                <p>Vous devez être connecté pour avoir accès à votre profil, cliquez <a href="<?= _PUBLIC ?>/vues/connexion.php">ici</a> pour vous connecter.</p>
            <?php } ?>
        </div>
    </main>


<script src="https://js.stripe.com/v3"></script>

<script>
var stripe = Stripe('<?php echo $stripe['publishable_key']; ?>');

var checkoutButton = document.querySelector('#checkout-button');
checkoutButton.addEventListener('click', function () {
  stripe.redirectToCheckout({
    items: [{
      // Define the product and SKU in the Dashboard first, and use the SKU
      // ID in your client-side code.
      sku: 'sku_Gltrh8elnSx1XP',
      quantity: 1
    }],
    successUrl: 'http://cartylist.com/vues/payement/succes.php',
    cancelUrl: 'http://cartylist.com/vues/payement/annulation.php'
  }).then(function (result) {
  // If `redirectToCheckout` fails due to a browser or network
  // error, display the localized error message to your customer
  console.log(result.error.message);
});
});
</script>

<?php include "../includes/footer.php" ?>