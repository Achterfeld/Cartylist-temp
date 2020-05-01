<?php

namespace Accesseurs;

use Modeles\Utilisateur;
use Accesseurs\Requetes\UtilisateurSQL;

class UtilisateurDAO {


    public static function ajouterUtilisateur($utilisateur) {
		$demandeUtilisateur = Connexion::instance()->basededonnees->prepare(UtilisateurSQL::SQL_INSERT_UTILISATEUR);
        $demandeUtilisateur->bindParam(':prenom', $utilisateur->prenom, \PDO::PARAM_STR);
        $demandeUtilisateur->bindParam(':hash', $utilisateur->hash, \PDO::PARAM_STR);
        $demandeUtilisateur->bindParam(':mail', $utilisateur->mail, \PDO::PARAM_STR);
        $demandeUtilisateur->bindParam(':avatar', $utilisateur->avatar, \PDO::PARAM_STR);
		$demandeUtilisateur->execute();
		$demandeUtilisateur->closeCursor();
		return Connexion::instance()->basededonnees->lastInsertId();
	}

    public static function sauver($utilisateur) {
        try {
            $demandeUtilisateur = Connexion::instance()->basededonnees->prepare(UtilisateurSQL::SQL_SAUVER_UTILISATEUR);
            $demandeUtilisateur->bindParam(':prenom', $utilisateur->prenom);
			$demandeUtilisateur->bindParam(':mail', $utilisateur->mail);
            $demandeUtilisateur->bindParam(':hash', $utilisateur->hash);
            $demandeUtilisateur->bindParam(':avatar', $utilisateur->avatar);
			$demandeUtilisateur->bindParam(':id', $utilisateur->id);
            $demandeUtilisateur->execute();
            return true;
        } catch(\PDOException $e) {
            return false;
        }
    }

    public static function modifierUtilisateur($utilisateur) {
        try {
            $demandeUtilisateur = Connexion::instance()->basededonnees->prepare(UtilisateurSQL::SQL_MODIFIER_UTILISATEUR);
            $demandeUtilisateur->bindParam(':prenom', $utilisateur->prenom);
			$demandeUtilisateur->bindParam(':mail', $utilisateur->mail);
            $demandeUtilisateur->bindParam(':avatar', $utilisateur->avatar);
			$demandeUtilisateur->bindParam(':id', $utilisateur->id);
            $demandeUtilisateur->execute();
            return true;
        } catch(\PDOException $e) {
            return false;
        }
    }

    // public static function estInscrit($utilisateur) {
    //     try {

    //         $demandeUtilisateur = Connexion::instance()->basededonnees->prepare(UtilisateurSQL::SQL_EXISTE_UTILISATEUR);
    //         $demandeUtilisateur->bindParam(':id', $utilisateur->id);
    //         $demandeUtilisateur->execute();
    //         $resultat = $demandeUtilisateur->fetchAll();

    // 		if ($resultat[0][0] == 0) {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     } catch(\PDOException $e) {
    //         return false;
    //     }
    // }

    public static function obtenirUtilisateur($mail) {
        try {
            $demandeUtilisateur = Connexion::instance()->basededonnees->prepare(UtilisateurSQL::SQL_SELECT_UTILISATEUR);
            $demandeUtilisateur->bindParam(':mail', $mail);
            $demandeUtilisateur->execute();
            $resultat = $demandeUtilisateur->fetch(\PDO::FETCH_ASSOC);
            if($resultat) {
                return new Utilisateur($resultat);
            }
            
        } catch(\PDOException $e) {
            $e->getMessage();
        }
    }

    public static function obtenirUtilisateurId($id) {
        try {
            $demandeUtilisateur = Connexion::instance()->basededonnees->prepare(UtilisateurSQL::SQL_SELECT_UTILISATEUR_ID);
            $demandeUtilisateur->bindParam(':id', $id);
            $demandeUtilisateur->execute();
            $resultat = $demandeUtilisateur->fetch(\PDO::FETCH_ASSOC);
            if($resultat) {
                return new Utilisateur($resultat);
            }
            
        } catch(\PDOException $e) {
            $e->getMessage();
        }
    }
}