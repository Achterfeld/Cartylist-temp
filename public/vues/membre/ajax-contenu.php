<?php require_once './../../../config.php' ?>

<?php
	Utilitaires\Page::titre("liste-paniers");
?>

<?php include_once _RACINE . "/utilitaires/routes.php" ?>
<?php

// Nombre de panniers par page
$nb_panniers = 3;

$page = is_numeric($_POST['page']) ? $_POST['page'] : 1 ;
$debut = ($page-1) * $nb_panniers;
$fin = $debut + $nb_panniers;

$paniers = Controleurs\PanierControleur::listerLimite($debut, $fin);
?>
<?php if (is_array($paniers)) {foreach ($paniers as $panier) { ?>
    <div class="conteneur panier" id="<?= $panier->__get("id") ?>">
        <h3><?= $panier->__get("nom") ?></h3>
        <div class="actions">
            <a class="bouton" href="./details_panier.php?id=<?= $panier->__get("id") ?>">Voir</a>
            <button class="bouton-supprimer" onclick="supprimer(<?= $panier->__get("id") ?>)">Supprimer</button>
        </div>
    </div>
<?php }}?>

