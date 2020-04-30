<?php const _VUES = "./"; ?>
<?php require_once './../../config.php' ?>

<?php 
	Utilitaires\Page::titre("inscription"); 
?>

<?php include "./includes/header.php" ?>
<link rel="stylesheet" href="<?= _PUBLIC ?>/css/inscription.css">
	<main>
		<div class="conteneur">
			<form id="form-inscription" action="inscription2.php" method="POST">
				<div class="etape">	
					<center>
						<h1>Entrez vos informations</h1>
					</center>
					<div class="lil-row">
						<label for="nom">Identifiant</label>
					</div>
					<div class="lil-row">
						<input class="champ-texte width-100" type="text" name="nom" id="nom" placeholder="Choisissez votre identifiant...">
					</div><br />
					<div class="lil-row">
						<label for="identifiant">Email</label>
					</div>
					<div class="lil-row">
						<input class="champ-texte width-100" type="text" name="identifiant" id="identifiant" placeholder="Entrez votre adresse mail...">
					</div><br />
					
					<div class="lil-row">
						<div class="lil-col 0-12">
						</div>
						<div class="lil-col 12-12">
							<button type="submit" class="bouton width-100" >Suivant</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</main>
<?php include "./includes/footer.php" ?>