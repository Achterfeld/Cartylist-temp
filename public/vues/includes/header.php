<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cartylist</title>
	<link rel="stylesheet" href="<?= _PUBLIC ?>/css/style.css">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/ColinEspinas/lilcss/css/grid.min.css'>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/ColinEspinas/lilcss/css/utility.min.css'>
	<script src="https://kit.fontawesome.com/6c5ab1f8a0.js" crossorigin="anonymous"></script>
</head>

<body>
	<nav class="nav-principale">
		<ul class="menu-principal">
			<?php if(!isset($_SESSION['utilisateur'])) { ?>
				<li class="<?php if (Utilitaires\Page::$titre === 'connexion') echo 'actif' ?>"><a href="<?= _PUBLIC ?>/vues/connexion.php">Connexion</a></li>
				<li class="marque"><a href="<?= _PUBLIC ?>/vues/index.php">Cartylist</a></li>
				<li class="<?php if (Utilitaires\Page::$titre === 'inscription') echo 'actif' ?> special"><a href="<?= _PUBLIC ?>/vues/inscription1.php">Inscription</a></li>
			<?php } ?>
			<?php if(isset($_SESSION['utilisateur'])) { ?>
				<li class="<?php if (Utilitaires\Page::$titre === 'profil') echo 'actif' ?>"><a href="<?= _PUBLIC ?>/vues/membre/profil_utilisateur.php">Profil</a></li>
				<li class="marque"><a href="<?= _PUBLIC ?>/vues/index.php">Cartylist</a></li>
				<li class="<?php if (Utilitaires\Page::$titre === 'liste-panier') echo 'actif' ?> special"><a href="<?= _PUBLIC ?>/vues/<?php if($_SESSION['utilisateur']['admin']){echo('admin');} else {echo('membre');} ?>/liste_panier.php">Liste des paniers</a></li>
			<?php } ?>
		</ul>
	</nav>