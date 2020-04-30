<?php const _VUES = "../"; ?>
<?php require_once './../../../config.php' ?>

<?php include_once _RACINE . "/utilitaires/routes.php" ?>

<?php
	Utilitaires\Page::titre("liste-paniers");
	$paniers = Controleurs\PanierControleur::lister();
?>

<?php include "../includes/header.php" ?>
	<main>
		<div class="conteneur-centre-page panier-liste">
			<div id="panier-conteneur">
				<h2 class="titre-section">Paniers:</h2>
				<?php foreach ($paniers as $panier) { ?>
					<div class="conteneur panier" id="<?=$panier->id ?>">
						<h3><?= $panier->nom ?></h3>
						<div class="actions">
							<a class="bouton" href="./details_panier.php?id=<?= $panier->id ?>">Voir</a>
							<a class="bouton" href="./modifier_panier.php?id=<?= $panier->id ?>">Modifier</a>
							<button class="bouton-supprimer" onclick="supprimer(<?= $panier->__get("id") ?>)">Supprimer</button>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</main>
<?php include "../includes/footer.php" ?>
<script src="./../../js/supprimer.js"></script>
