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
						<div class="lil-col 9-12">
						</div>
						<div class="lil-col 3-12">
							<button type="submit" class="bouton width-100" >Suivant</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</main>
	<!-- Exemple grille : -->
</body>
</html>