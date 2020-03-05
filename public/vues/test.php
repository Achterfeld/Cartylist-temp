<?php require_once './../../config.php' ?>

<?php
use Services\Authentification;

echo Authentification::nouveauUtilisateur('unPrenom', 'unPass', 'unPass', 'un@mail.com');