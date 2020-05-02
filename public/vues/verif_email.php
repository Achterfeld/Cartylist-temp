<?php const _VUES = "./"; ?>
<?php require_once './../../config.php' ?>

<?php include_once _RACINE . "/utilitaires/routes.php" ?>

<?php
$utilisateurIdentique = Accesseurs\UtilisateurDAO::obtenirUtilisateur($_GET['mailtest']);
echo $utilisateurIdentique;
// if($utilisateurIdentique){
//     echo "ca touche";
// }else{
//     echo "ca touche rien";
// };
?>