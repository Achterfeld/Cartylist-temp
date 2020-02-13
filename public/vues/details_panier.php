<?php require_once './../../config.php' ?>

<?php
<<<<<<< HEAD
try {
	$bdd = new PDO($DSN, $USAGER, $MDP);
	$idPanier = filter_var($_GET['id'],FILTER_VALIDATE_INT);
	$sqlPanier = "SELECT panier.id, panier.nom FROM panier WHERE panier.id = $idPanier";
	$demandePanier = $bdd->prepare($sqlPanier);
	$demandePanier->execute();
	$panier = $demandePanier->fetch(PDO::FETCH_ASSOC);

	$sqlArticles = "SELECT article.id, article.panier, article.nom, article.prix, article.notes FROM article WHERE article.panier = $idPanier";
	$demandeArticles = $bdd->prepare($sqlArticles);
	$demandeArticles->execute();
	$articles = $demandeArticles->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
	echo '<br>' . $e->getMessage() . '<br>';
}
=======
	use Accesseurs\PanierDAO;
	
	$paniers = PanierDAO::detaillerPanier($_GET["id"]);
>>>>>>> 37fabcc634777fdb6c8fed24e3dd259c2bee461c
?>

<?php
	include "../accesseur/ArticleDAO.php";
	$articles = ArticleDAO::listerArticles();

?>

<?php include "./includes/header.php" ?>
	<main>
		<div class="conteneur-centre-page">
			<div class="conteneur panier-affichage">
<<<<<<< HEAD
				<h1><?= $panier["nom"] ?></h1>
=======
				<h1><?= $panier->__get("nom") ?></h1>
				<p>Description du panier.</p>
>>>>>>> 37fabcc634777fdb6c8fed24e3dd259c2bee461c
				<div class="liste-articles">
				<?php foreach($articles as $article) { ?>
					<div class="article">
						<a href="<?= $article["adresse"] ?>"><?= $article["nom"] ?></a><br />
						<span class="article-prix"><?= $article["prix"] ?></span><br />
						<span class="article-notes"><?= $article["notes"] ?></span>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</main>
<?php include "./includes/footer.php" ?>