<?php require_once './../../config.php' ?>

<?php
	use Accesseurs\PanierDAO;
	
	$paniers = PanierDAO::listerPaniers();
?>

<?php include "./includes/header.php" ?>
	<main>
		<div class="conteneur-centre-page panier-liste">
			<div id="panier-conteneur">
				<h2 class="titre-section">Paniers:</h2>
				<?php foreach ($paniers as $panier) { ?>
					<div class="conteneur panier">
						<h3><?= $panier->__get("nom") ?></h3>
						<div class="actions">
							<a class="bouton" href="./details_panier.php?id=<?= $panier->__get("id") ?>">Voir</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</main>
<?php include "./includes/footer.php" ?>