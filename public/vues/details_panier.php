<?php require_once './../../config.php' ?>

<?php
	use Accesseurs\PanierDAO;
	
	$paniers = PanierDAO::detaillerPanier($_GET["id"]);
?>

<?php include "./includes/header.php" ?>
	<main>
		<div class="conteneur-centre-page">
			<div class="conteneur panier-affichage">
				<h1><?= $panier->__get("nom") ?></h1>
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