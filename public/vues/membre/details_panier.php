<?php const _VUES = "../"; ?>
<?php require_once './../../../config.php' ?>

<?php
	Utilitaires\Page::titre("detail-panier");
	$panier = Controleurs\PanierControleur::detailler();
?>

<?php include "../includes/header.php" ?>
	<main>
		<div class="conteneur-centre-page">
			<div class="conteneur panier-affichage">
				<h1><?= $panier->nom ?></h1>
				<p>Description du panier.</p>
				<div class="liste-articles">
					<hr>
				<?php foreach($panier->articles as $article) { ?>
					<div class="article">
						<a href="<?= $article->adresse ?>"><?= $article->nom ?></a><br />
						<span class="article-prix"><?= $article->prix ?></span><br />
						<span class="article-notes"><?= $article->notes ?></span>
					</div>
					<hr>
				<?php } ?>
				</div>
				<?php if($panier->proprietaire == $_SESSION['utilisateur']['id']) { ?>
				<a href="<?= _PUBLIC ?>/vues/<?php if($_SESSION['utilisateur']['admin']){echo('admin/panier-supprimer.php');} else {echo('membre/supprimer_panier.php');} ?>" class="bouton-supprimer" onclick="supprimer(<?= $panier->__get("id") ?>)">Supprimer</a>
				<?php }?>
			</div>
		</div>
	</main>
<?php include "../includes/footer.php" ?>

<script src="../../js/defilement.js"></script>
<script src="../../js/supprimer.js"></script>
