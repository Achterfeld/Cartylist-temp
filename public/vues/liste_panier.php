<?php require_once './../../config.php' ?>

<?php
	Utilitaires\Page::titre("liste-paniers");
?>

<?php include_once _RACINE . "/utilitaires/routes.php" ?>

<?php include "./includes/header.php" ?>
<script src="./../js/scroll.js"></script>
	<main>
		<div id="panier-liste" class="conteneur-centre-page panier-liste">
			<div id="panier-conteneur">
    			<h2 class="titre-section">Paniers:</h2>
				</div>
			</div>
    	<div id="page-loading">Now loading...</div>
	</main>


<?php include "./includes/footer.php" ?>
<!-- intersection observer -->
