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
				<input type="hidden" name="nom" id="nom" value="<?= $_POST['nom']?>" required>
				<input type="hidden" name="identifiant" id="identifiant" value="<?= $_POST['identifiant']?>" required>
				<input type="hidden" name="mot-de-passe" id="mot-de-passe" value="<?= $_POST['mot-de-passe']?>" required>
				<input type="hidden" name="confirm-mot-de-passe" id="confirm-mot-de-passe" value="<?= $_POST['confirm-mot-de-passe']?>" required>
				<div class="etape">
					<div class="lil-row center">
						<img id="image-profil-inscription" src="https://cdn.icon-icons.com/icons2/1879/PNG/512/iconfinder-3-avatar-2754579_120516.png" alt="">
					</div>
					<div class="lil-row">
						<label for="mot-de-passe">Image de profil:</label>
					</div>
					<div class="lil-row">
						<input class="champ-texte width-100" type="url" name="avatar" id="avatar-input" value="https://cdn.icon-icons.com/icons2/1879/PNG/512/iconfinder-3-avatar-2754579_120516.png">
						<input type="hidden" name="avatar-dernier" id="avatar-dernier" value="https://cdn.icon-icons.com/icons2/1879/PNG/512/iconfinder-3-avatar-2754579_120516.png">
					</div>
					<br>
                </div>
                <input type="hidden" name="action" value="inscription">
                <button type="submit" class="bouton width-100" >Terminer l'inscription</button>
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

<script src="../js/avatar.js"></script>