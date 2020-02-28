<?php require_once './../../config.php' ?>

<?php
	Utilitaires\Page::titre("liste-paniers");
?>

<?php include_once _RACINE . "/utilitaires/routes.php" ?>
<?php
// FETCH CONTENTS
$page = is_numeric($_POST['page']) ? $_POST['page'] : 1 ;
$start = ($page-1) * PER_PAGE;
$end = $start + PER_PAGE;

$paniers = Controleurs\PanierControleur::listerLimite($start, $end);
?>
<?php if (is_array($paniers)) {foreach ($paniers as $panier) { ?>
    <div class="conteneur panier">
        <h3><?= $panier->__get("nom") ?></h3>
        <div class="actions">
            <a class="bouton" href="./details_panier.php?id=<?= $panier->__get("id") ?>">Voir</a>
        </div>
    </div>
<?php }}?>

