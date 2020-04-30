<?php const _VUES = "./"; ?>
<?php require_once './../../config.php' ?>

<?php 
	Utilitaires\Page::titre("inscription"); 
?>

<?php include "./includes/header.php" ?>
<link rel="stylesheet" href="<?= _PUBLIC ?>/css/inscription.css">
	<main>
		<div class="conteneur">
			<form id="form-inscription" action="<?= _PUBLIC ?>/vues/membre/profil_utilisateur.php" method="POST">
				<input class="champ-texte width-100" type="hidden" name="nom" id="nom" value="<?= $_POST['nom']?>">
				<input class="champ-texte width-100" type="hidden" name="identifiant" id="identifiant" value="<?= $_POST['identifiant']?>">
				<input class="champ-texte width-100" type="hidden" name="mot-de-passe" id="mot-de-passe" value="<?= $_POST['mot-de-passe']?>">
				<input class="champ-texte width-100" type="hidden" name="confirm-mot-de-passe" id="confirm-mot-de-passe" value="<?= $_POST['confirm-mot-de-passe']?>">
				<div class="etape">                    
                    <div class="profil">
                        <div class="profil-image"></div>
                    </div>
                    <button class="bouton">Ajouter une photo de profil</button>
                </div>
                <input type="hidden" name="action" value="inscription">
                <button type="submit" class="bouton width-45" >Confirmer</button>
			</form>
			<br>
			<div class="lil-row">
				<div class="lil-col 12-12">
					<button type="submit" class="bouton-secondaire width-100" onclick="history.back()">Précédent</button>
				</div>
			</div>
        </div>
	</main>
<?php include "./includes/footer.php" ?>