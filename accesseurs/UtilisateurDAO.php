<?php

namespace Accesseurs;

class ArticleDAO {

    public static function sauver($utilisateur) {
        try {
            $demandeUtilisateur = Connexion::instance()->basededonnees->prepare(UtilisateurSQL::SQL_SAUVER_UTILISATEUR);
            $demandeUtilisateur->bindParam(':prenom', $utilisateur->prenom);
			$demandeUtilisateur->bindParam(':mail', $utilisateur->mail);
			$demandeUtilisateur->bindParam(':hash', $utilisateur->hash);
			$demandeUtilisateur->bindParam(':id', $utilisateur->id);
            $demandeUtilisateur->execute();
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    public static function estInscrit($utilisateur) {
        try {

            $demandeUtilisateur = Connexion::instance()->basededonnees->prepare(UtilisateurSQL::SQL_EXISTE_UTILISATEUR);
            $demandeUtilisateur->bindParam(':id', $utilisateur->id);
            $demandeUtilisateur->execute();
            $resultat = $demandeUtilisateur->fetchAll();

    		if ($resultat[0][0] == 0) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            return false;
        }
    }

    public static function obtenirUtilisateur($mail) {
        try {
            $demandeUtilisateur = Connexion::instance()->basededonnees->prepare(UtilisateurSQL::SQL_SELECT_UTILISATEUR);
            $demandeUtilisateur->bindParam(':mail', $utilisateur->mail);
            $demandeUtilisateur->execute();
            $resultat = $demandeUtilisateur->fetchAll();

            return new Utilisateur($resultat[0]);

        } catch(PDOException $e) {
            $e->getMessage();
        }
    }
}