<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Inscription</title>
	<link rel="stylesheet" href="./../css/style.css">
	<link rel='stylesheet' href='./../css/inscription.css'>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/ColinEspinas/lilcss/css/grid.min.css'>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/ColinEspinas/lilcss/css/utility.min.css'>
</head>
<body>
	<nav class="nav-principale">
		<ul class="menu-principal">
			<li><a href="#">Accueil</a></li>
			<li><a href="#">Contact</a></li>
			<li class="marque"><a href="">Cartylist</a></li>
			<li><a href="#">Connexion</a></li>
			<li class="special"><a href="#">Inscription</a></li>
		</ul>
	</nav>
	<main>
		<div class="conteneur">
			<form id="form-inscription" action="profil_utilisateur.php" method="POST">
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
        </div>
					<div class="lil-row">
                        <div class="lil-col 3-12">
                        </div>
                        <div class="lil-col 6-12">
                            <button type="submit" class="bouton-secondaire width-45" onclick="history.back()">Précédent</button>
                        </div>
						<div class="lil-col 3-12">
						</div>
					</div>
	</main>
	<!-- Exemple grille : -->
</body>
</html>