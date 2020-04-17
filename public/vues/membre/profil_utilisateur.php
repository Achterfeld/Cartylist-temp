<?php require_once './../../../config.php' ?>
<?php session_start() ?>

<?php include_once _RACINE . "/utilitaires/routes.php" ?>

<?php include "./includes/header.php" ?>
<link rel='stylesheet' href='./../css/profil_utilisateur.css'>
    <main>
		<div class="conteneur-centre-page">
            <div class="profil">
				<h1>Mon profil</h1>
                <div class="profil-image"></div>
                <div class="profil-infos">
                    <h3>Nom d'utilisateur</h3>
                    <?php if(isset($_SESSION['utilisateur'])) {?>
                        <p><?= $_SESSION['utilisateur']['prenom'] ?></p>
                        <h3>Email</h3>
                        <p><?= $_SESSION['utilisateur']['mail']?></p>
                        <h3>Paniers créés</h3>
                    <p><a href="liste_panier_privee.php">Liste ici</a></p>
                    <?php }?>
                </div>
            </div>
            <button class="bouton">Modifier les informations</button>
        </div>
    </main>
</body>
</html>