<?php const _VUES = "../"; ?>
<?php require_once './../../../config.php' ?>

<?php
use Controleurs\PanierControleur;
use Accesseurs\PanierDAO;

echo var_dump($_SESSION);

if($_SESSION['utilisateur']['id'] == PanierDAO::detaillerPanier($_GET['id'])) {

    PanierControleur::effacer();
}