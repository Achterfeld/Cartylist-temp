<?php const _VUES = "../"; ?>

<?php require_once './../../../config.php' ?>

<?php

// Nombre de panniers par page
$nb_panniers = 12;

$page = is_numeric($_POST['page']) ? $_POST['page'] : 1 ;

$debut = ($page-1) * $nb_panniers;
//$fin = $debut + $nb_panniers;

$paniers = Controleurs\PanierControleur::listerLimite($debut, $nb_panniers);
?>
<?php if (is_array($paniers)) {foreach ($paniers as $panier) { ?>
    <div class="panier" id="<?= $panier->__get("id") ?>">
		<header>
			<h3 class="titre" title="Mon panier"><?= $panier->__get("nom") ?></h3>
			<a class="modifier" href="./modifier_panier.php?id=<?= $panier->id ?>"><i class="fas fa-edit"></i></a>
		</header>
		<footer>
			<span class="nb-produit"><?= count($panier->articles) ?> produit(s)</span>
			<a href="../membre/details_panier.php?id=<?= $panier->__get("id") ?>" class="voir"><i class="fas fa-eye"></i><span>Voir</span></a>
		</footer>
	</div>
<?php }}?>