<?php require_once './../../config.php' ?>

<?php
try {
	$bdd = new PDO($DSN, $USAGER, $MDP);
	$sqlPaniers = "SELECT panier.id, panier.nom FROM panier";
	$demandePanier = $bdd->prepare($sqlPaniers);
	$demandePanier->execute();
	$paniers = $demandePanier->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
	echo '<br>' . $e->getMessage() . '<br>';
}
?>

<?php include "./includes/header.php" ?>
	<main>
		<div class="conteneur-centre-page panier-liste">
			<div id="panier-conteneur">
				<h2 class="titre-section">Paniers:</h2>
				<?php foreach ($paniers as $panier) { ?>
					<div class="conteneur panier">
						<h3><?= $panier["nom"] ?></h3>
						<div class="actions">
							<a class="bouton" href="./details_panier.php?id=<?= $panier["id"] ?>">Voir</a>
							<a class="bouton" href="./modifier_panier.php?id=<?= $panier["id"] ?>">Modifier</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</main>
<?php include "./includes/footer.php" ?>