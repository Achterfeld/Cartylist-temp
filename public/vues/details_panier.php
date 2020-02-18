<?php require_once './../../config.php' ?>

<?php
	$panierControleur = new Controleurs\PanierControleur();
	$panier = $panierControleur->detailler();
?>

<?php include "./includes/header.php" ?>
	<main>
		<div class="conteneur-centre-page">
			<div class="conteneur panier-affichage">
				<h1><?= $panier->__get("nom") ?></h1>
				<p>Description du panier.</p>
				<div class="liste-articles">
				<?php foreach($panier->__get("articles") as $article) { ?>
					<div class="article">
						<a href="<?= $article->__get("adresse") ?>"><?= $article->__get("nom") ?></a><br />
						<span class="article-prix"><?= $article->__get("prix") ?></span><br />
						<span class="article-notes"><?= $article->__get("notes") ?></span>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</main>
<?php include "./includes/footer.php" ?>