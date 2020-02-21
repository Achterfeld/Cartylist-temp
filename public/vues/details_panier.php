<?php require_once './../../config.php' ?>

<?php
	Utilitaires\Page::titre("detail-panier");
	$panier = Controleurs\PanierControleur::detailler();
?>

<?php include "./includes/header.php" ?>
	<main>
		<div class="conteneur-centre-page">
			<div class="conteneur panier-affichage">
				<h1><?= $panier->nom ?></h1>
				<p>Description du panier.</p>
				<div class="liste-articles">
				<?php foreach($panier->articles as $article) { ?>
					<div class="article">
						<a href="<?= $article->adresse ?>"><?= $article->nom ?></a><br />
						<span class="article-prix"><?= $article->prix ?></span><br />
						<span class="article-notes"><?= $article->notes ?></span>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</main>
<?php include "./includes/footer.php" ?>