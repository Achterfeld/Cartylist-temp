<?php const _VUES = "./"; ?>
<?php require_once './../../config.php' ?>

<?php include "./includes/header.php" ?>
<link rel='stylesheet' href='./../css/connexion.css'>
<body>
	<main>
		<div class="conteneur">
			<form action="<?= _PUBLIC ?>/vues/membre/profil_utilisateur.php" method="post">
				<div class="lil-row">
					<label for="identifiant">Identifiant</label>
				</div>
				<div class="lil-row">
					<input class="champ-texte width-100" type="text" name="identifiant" id="identifiant" placeholder="Votre identifiant...">
				</div><br />
				<div class="lil-row">
					<label for="mot-de-passe">Mot de passe</label>
				</div>
				<div class="lil-row">
					<input class="champ-texte width-100" type="password" name="mot-de-passe" id="mot-de-passe" placeholder="Votre mot de passe...">
				</div><br />
				<!-- <div class="lil-row">
					<input type="checkbox" name="se-souvenir-de-moi" id="se-souvenir-de-moi">&nbsp;<labelf for="se-souvenir-de-moi">Se souvenir de moi</label>
				</div><br />
				<div class="lil-row">
					<a href="#">Mot de passe oublié ?</a>
				</div><br /><br /> -->
				<input type="hidden" id="action" name="action" value="se-connecter">
					<button type="submit" class="bouton width-33">Se connecter</button>
			</form><br /><br />
			<div class="lil-row center" style="text-align: center">
				<p>Nouveau membre ?</p>
			</div>
			<div class="lil-row center" style="text-align: center">
				<a class="bouton-secondaire" href="<?= _PUBLIC ?>/vues/inscription1.php">Inscription</a>
			</div>
		</div>
	</main>
</body>
</html>