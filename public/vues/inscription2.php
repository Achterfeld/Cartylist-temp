<?php const _VUES = "./"; ?>
<?php require_once './../../config.php' ?>

<?php 
	Utilitaires\Page::titre("inscription"); 
?>

<?php include "./includes/header.php" ?>
<link rel="stylesheet" href="<?= _PUBLIC ?>/css/inscription.css">
	<main>
		<div class="conteneur">
			<form id="form-inscription" action="inscription3.php" method="POST">
				<div class="etape">
					<center>
						<h1>Choisissez un mot de passe</h1>
					</center>
					<div class="lil-row">
						<input class="champ-texte width-100" type="hidden" name="nom" id="nom" value="<?= $_POST['nom']?>">
					</div><br />
					<div class="lil-row">
						<input class="champ-texte width-100" type="hidden" name="identifiant" id="identifiant" value="<?= $_POST['identifiant']?>">
					</div><br />
					<div class="lil-row between">
						<div class="lil-col 6-12">
							<div class="lil-row">
								<label for="mot-de-passe">Mot de passe</label>
							</div>
							<div class="lil-row">
								<input class="champ-texte width-100" type="text" name="mot-de-passe" id="mot-de-passe" placeholder="Choisissez votre mot de passe...">
							</div>
						</div>
						<div class="lil-col 6-12">
							<div class="lil-row">
								<label for="confirm-mot-de-passe">Confirmation du mot de passe</label>
							</div>
							<div class="lil-row">
								<input class="champ-texte width-100" type="text" name="confirm-mot-de-passe" id="confirm-mot-de-passe" placeholder="Confirmation votre mot de passe...">
							</div>
						</div>
					</div><br /><br />
					<div class="lil-row">
						<div class="lil-col 12-12">
							<button type="submit" class="bouton width-100" >Suivant</button>
						</div>
						<br>
					</div>
				</div>
			</form>
			<br>
			<div class="lil-col 12-12">
				<button class="bouton-secondaire width-100" onclick="history.back()">Précédent</button>
            </div>
		</div>
	</main>
<?php include "./includes/footer.php" ?>