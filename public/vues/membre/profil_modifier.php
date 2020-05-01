<?php const _VUES = "../"; ?>
<?php require_once './../../../config.php' ?>

<?php 
	Utilitaires\Page::titre("modification"); 
?>
<?php include_once _RACINE . "/utilitaires/routes.php" ?>

<?php include "../includes/header.php" ?>
<link rel="stylesheet" href="../../css/profil_utilisateur.css">
	<main>
		<div class="conteneur-centre-page">
            <?php if(isset($_SESSION['utilisateur'])) {?>
            <div class="profil">
				<h1>Modifier mes informations</h1>
                <img class="profil-image" src="<?= $_SESSION['utilisateur']['avatar'] ?>" alt="avatar-utilisateur">
                <div class="profil-infos">
			        <form id="form-modification" action="<?= _PUBLIC ?>/vues/membre/profil_utilisateur.php" method="POST">
                        <h3>Nom d'utilisateur</h3>
                        <input class="champ-texte width-100" name="nom" id="nom" type="text" value="<?= $_SESSION['utilisateur']['prenom'] ?>">
                        <h3>Email</h3>
                        <input class="champ-texte width-100" name="identifiant" id="identifiant" type="text" value="<?= $_SESSION['utilisateur']['mail'] ?>">
                        <h3>Avatar</h3>
						<input class="champ-texte width-100" type="url" name="avatar-dernier" id="avatar-dernier" value="<?= $_SESSION['utilisateur']['avatar'] ?>">
				        <input type="hidden" name="id" id="id" value="<?= $_SESSION['utilisateur']['id']?>"> 
                        <input type="hidden" name="action" value="modification">
                        <button type="submit" class="bouton width-100" style="margin-top: 30px;">Valider les modifications</button>
                    </form>
                    <br>
                    <form action="<?= _PUBLIC ?>/vues/membre/profil_utilisateur.php" method="POST">
                        <button type="submit" class="bouton-secondaire">Annuler</button>
                    </form>
                </div>
            </div>
            <?php } else { ?>
                <p>Vous devez être connecté pour avoir accès à votre profil, cliquez <a href="<?= _PUBLIC ?>/vues/connexion.php">ici</a> pour vous connecter.</p>
            <?php } ?>
        </div>
    </main>
<?php include "../includes/footer.php" ?>