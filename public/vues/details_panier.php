<?php require_once './../../config.php' ?>

<?php
try {
	$bdd = new PDO($DSN, $USAGER, $MDP);
	$idPanier = filter_var($_GET['id'],FILTER_VALIDATE_INT);
	$sqlPanier = "SELECT * FROM panier WHERE panier.id = $idPanier";
	$demandePanier = $bdd->prepare($sqlPanier);
	$demandePanier->execute();
	$panier = $demandePanier->fetch(PDO::FETCH_ASSOC);

	$sqlArticles = "SELECT * FROM article WHERE article.panier = $idPanier";
	$demandeArticles = $bdd->prepare($sqlArticles);
	$demandeArticles->execute();
	$articles = $demandeArticles->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
	echo '<br>' . $e->getMessage() . '<br>';
}
?>

<?php include "./includes/header.php" ?>
	<main>
		<div class="conteneur-centre-page">
			<div class="conteneur panier-affichage">
				<h1><?= $panier["nom"] ?></h1>
				<p>Description du panier.</p>
				<div class="liste-articles">
				<?php foreach($articles as $article) { ?>
					<div class="article">
						<a href="<?= $article["adresse"] ?>"><?= $article["nom"] ?></a><br />
						<span class="article-prix"><?= $article["prix"] ?></span>
						<span class="article-notes"><?= $article["notes"] ?></span>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</main>
<?php include "./includes/footer.php" ?> 