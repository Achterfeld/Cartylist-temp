<?php

use Modeles\Transaction;

const _VUES = "../"; ?>
<?php require_once './../../../config.php' ?>

<?php include_once _RACINE . "/utilitaires/routes.php" ?>

<?php
$transactions = Accesseurs\TransactionDAO::listerTransactionMembre();
if($transactions == null) {
    $transactions[] = new Transaction(['id' => -1, 'emetteur' => '', 'montant' => '']);
}
?>
<head>
    <link rel="stylesheet" href="<?= _PUBLIC ?>/css/transaction.css">
</head>
<?php include "../includes/header.php" ?>

<main>
    <div class="conteneur-transaction">
        <?php foreach ($transactions as $transaction) { ?>
            <div class="transaction">
                <span><?= $transaction->emetteur ?></span><br />
                <span><?= $transaction->montant ?>€</span>
            </div>
            <hr>
        <?php }?>
    </div>
</main>

<?php include "../includes/footer.php" ?>