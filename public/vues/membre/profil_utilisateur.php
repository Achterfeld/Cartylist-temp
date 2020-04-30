<?php const _VUES = "../"; ?>
<?php require_once './../../../config.php' ?>

<?php include_once _RACINE . "/utilitaires/routes.php" ?>

<?php include "../includes/header.php" ?>
<link rel='stylesheet' href='./../css/profil_utilisateur.css'>
    <main>
		<div class="conteneur-centre-page">
            <div class="profil">
				<h1>Mon profil</h1>
                <div class="profil-image"></div>
                <div class="profil-infos">
                    <?php if(isset($_SESSION['utilisateur'])) {?>
                        <h3>Nom d'utilisateur</h3>
                        <p><?= $_SESSION['utilisateur']['prenom'] ?></p>
                        <h3>Email</h3>
                        <p><?= $_SESSION['utilisateur']['mail']?></p>
                        <!-- <h3>Liste des paniers publiques:</h3>
                    <p><a href="<?= _PUBLIC ?>/vues/membre/liste_panier.php">Liste ici</a></p> -->
                        
                        <button class="bouton">Modifier les informations</button>
                        <br><br>
                        <form action="<?= _PUBLIC ?>/vues/membre/profil_utilisateur.php" method="POST">
                            <input type="hidden" name="action" value="se-deconnecter">
                            <button type="submit" class="bouton-secondaire">Se déconnecter</button>
                        </form>
                    <?php } else { ?>
                        <p>Vous devez être connecté pour avoir accès à votre profil, cliquez <a href="<?= _PUBLIC ?>/vues/connexion.php">ici</a> pour vous connecter.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>