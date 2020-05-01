<?php

namespace Accesseurs;

use Modeles\Transaction;
use Accesseurs\Requetes\TransactionSQL;

class TransactionDAO {

	public static function listerTransaction()
	{
		$demandeTransactions = Connexion::instance()->basededonnees->prepare(TransactionSQL::SQL_SELECT_TRANSACTION);
		$demandeTransactions->execute();
		$transactionsTableau = $demandeTransactions->fetchAll(\PDO::FETCH_ASSOC);
		foreach($transactionsTableau as $transactionTableau) {
			$transactions[] = new Transaction($transactionTableau);
		}
		return $transactions;
    }
    
    public static function listerTransactionMembre()
	{
		$demandeTransactions = Connexion::instance()->basededonnees->prepare(TransactionSQL::SQL_SELECT_TRANSACTION);
		$demandeTransactions->execute();
		$transactionsTableau = $demandeTransactions->fetchAll(\PDO::FETCH_ASSOC);
		foreach($transactionsTableau as $transactionTableau) {
            $transaction = new Transaction($transactionTableau);
            if($transaction->emetteur == $_SESSION['utilisateur']['prenom']) {
                $transactions[] = $transaction;
            }
        }
        if(isset($transactions)) {
		    return $transactions;   
        }
	}
}