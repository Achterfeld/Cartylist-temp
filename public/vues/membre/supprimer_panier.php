<?php const _VUES = "../"; ?>
<?php require_once './../../../config.php' ?>

<?php
use Controleurs\PanierControleur;
use Accesseurs\PanierDAO;



    PanierControleur::effacer();
    echo var_dump($_SESSION);
