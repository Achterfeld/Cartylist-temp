<?php
require '../config.php';

try {
	$bdd = new PDO($DSN, $USAGER, $MDP);
	$idPanier = filter_var($_GET['panier'],FILTER_VALIDATE_INT);
	$sqlPanier = "SELECT * FROM panier WHERE panier.id = $idPanier";
	$sqlArticles = "SELECT * FROM article WHERE article.panier = $idPanier";
	$demandeArticles = $bdd->prepare($sqlArticles);
	$demandeArticles->execute();
	$articles = $demandeArticles->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
	echo '<br>' . $e->getMessage() . '<br>';
}
?>

<?php include "./header.php" ?>
	<main>
        <h1><?=($idPanier->nom)?></h1>
        <p>Description du panier.</p>
        <div class="liste-articles">
		<?php
		foreach($articles as $article)
		{
		?>
			<div class="article">			
				<a href="<?=($article->adresse)?>"><?=($article->nom)?></a><br />
				<span class="article-prix"><?=($article->prix)?></span>
				<span class="article-notes"><?=($article->notes)?></span>
			</div>
		<?php
		}
		?>
        </div>
	</main>
<?php include "./footer.php" ?> 