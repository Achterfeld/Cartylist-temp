<?php const _VUES = "../"; ?>
<?php require_once './../../../config.php' ?>

<?php
	Utilitaires\Page::titre("detail-panier");
	$panier = Controleurs\PanierControleur::detailler();
?>

<?php include "../includes/header.php" ?>
	<main>
        <h1>Panier supprimé</h1>
	</main>

<?php include "../includes/footer.php" ?>