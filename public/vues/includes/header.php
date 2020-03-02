<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cartylist</title>
	<link rel="stylesheet" href="<?= _PUBLIC ?>/css/style.css">
	<link rel="stylesheet" href="<?= _PUBLIC ?>/css/ajouter_panier.css">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/ColinEspinas/lilcss/css/grid.min.css'>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/ColinEspinas/lilcss/css/utility.min.css'>
</head>

<body>
	<nav class="nav-principale">
		<ul class="menu-principal">
			<li class="<?php if (Utilitaires\Page::$titre === 'accueil') echo 'actif' ?>"><a href="<?= _PUBLIC ?>/vues/index.php">Accueil</a></li>
			<li class="<?php if (Utilitaires\Page::$titre === 'liste-paniers') echo 'actif' ?>"><a href="<?= _PUBLIC ?>/vues/liste_panier.php">Liste paniers</a></li>
			<li class="marque"><a href="<?= _PUBLIC ?>/vues/index.php">Cartylist</a></li>
			<li class="<?php if (Utilitaires\Page::$titre === 'connexion') echo 'actif' ?>"><a href="<?= _PUBLIC ?>/vues/connexion.php">Connexion</a></li>
			<li class="<?php if (Utilitaires\Page::$titre === 'inscription') echo 'actif' ?> special"><a href="#">Inscription</a></li>
		</ul>
	</nav>