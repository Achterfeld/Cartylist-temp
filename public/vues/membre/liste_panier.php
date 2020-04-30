<?php const _VUES = "../"; ?>
<?php require_once './../../../config.php' ?>

<?php
	Utilitaires\Page::titre("liste-paniers");
?>

<?php include_once _RACINE . "/utilitaires/routes.php" ?>

<?php include "../includes/header.php" ?>

<main>
	<div id="panier-liste" class="conteneur-centre-page ">
		<h2 class="titre-section">Paniers:</h2>
		<div id="panier-conteneur" class="liste-panier">
		</div>
		<div id="page-loading">Now loading...</div>
	</div>
</main>

<?php include "../includes/footer.php" ?>
<!-- intersection observer -->
<script src="../../js/supprimer.js"></script>

<script src="../../js/defilement.js"></script>

