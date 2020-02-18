<?php

require_once './../config.php';

class Authentification
{

	const Insertion_OK = 0;
	const Pb_MDP = 1;
	const Pb_Mail = 2;



	/**
	 * Fonction permettant de créer un utilisateur.
	 *
	 * La fonction est en static car elle est utilisé dans plusieurs classes.
	 * Cette fonction permet de créer un nouvel utilisateur. Les paramètres sont filtrer par php pour éviter tous les problèmes.
	 * @param string $prenom Le prenom de l'utilisateur.
	 * @param string $password Le password de l'utilisateur.
	 * @param string $password2 Une nouvelle fois le password de l'utilisateur pour pouvoir vérifier qu'il n'y a pas d'erreur. 
	 * @param string $mail L'email de l'utilisateur.
	 * @return int Retourne un code permettant d'identifier si il y a un problème ou non.
	 */

	public static function nouveauUtilisateur($prenom, $password, $password2, $mail)
	{

		$USAGER = _BDD_USAGER;
		$MDP = _BDD_MOTDEPASSE;
		$HOTE = _BDD_HOTE;
		$BASE = _BDD_BASE;
		$DSN = _BDD_DSN;

		$prenom = filter_var($prenom, FILTER_SANITIZE_SPECIAL_CHARS);
		$password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
		$password2 = filter_var($password2, FILTER_SANITIZE_SPECIAL_CHARS);
		$mail = filter_var($mail, FILTER_SANITIZE_SPECIAL_CHARS);

		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		try {

			$basededonnees = new PDO($DSN, $USAGER, $MDP);
			$SQL_SELECT_MAIL = "SELECT count(*) FROM utilisateur WHERE mail = :mail";
			$demandeMail = $basededonnees->prepare($SQL_SELECT_MAIL);
			$demandeMail->bindParam(':mail', $mail);
			$demandeMail->execute();

			$resultat = $demandeMail->fetchAll();

		} catch(PDOException $e) {

			echo '<br>' . $e->getMessage() . '<br>';
		}
 

		if ($resultat[0][0] == 0) {

			$hash1 = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

			if (password_verify($password2, $hash1)) {
				try {
					$SQL_INSERT_UTILISATEUR = "INSERT INTO utilisateur (prenom, mail, hash) VALUES (:prenom, :mail, :hash);";
					$demandeUtilisateur = $basededonnees->prepare($SQL_INSERT_UTILISATEUR);
					$demandeUtilisateur->bindParam(':prenom', $prenom);
					$demandeUtilisateur->bindParam(':mail', $mail);
					$demandeUtilisateur->bindParam(':hash', $hash1);
					$demandeUtilisateur->execute();
				} catch(PDOException $e) {

					echo '<br>' . $e->getMessage() . '<br>';
				}
				return self::Insertion_OK;
			} else {
				return self::Pb_MDP;
			}
		} else {
			return self::Pb_Mail;
		}
	}


	/**
	 * La fonction permet de charger un profil.
	 *
	 * La fonction est en static car elle est utilisé dans plusieurs classes.
	 * @param int $user_id L'identifiant de l'utilisateur.
	 */
	public static function chargerProfile($mail)
	{

		$USAGER = _BDD_USAGER;
		$MDP = _BDD_MOTDEPASSE;
		$HOTE = _BDD_HOTE;
		$BASE = _BDD_BASE;
		$DSN = _BDD_DSN;

		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		try {

			$basededonnees = new PDO($DSN, $USAGER, $MDP);
			$SQL_SELECT_UTILISATEUR = "SELECT utilisateur_id, prenom, mail  FROM utilisateur WHERE mail = :mail";
			$demandeMail = $basededonnees->prepare($SQL_SELECT_UTILISATEUR);
			$demandeMail->bindParam(':mail', $mail);
			$demandeMail->execute();

			$resultat = $demandeMail->fetchAll();

		} catch(PDOException $e) {

			echo '<br>' . $e->getMessage() . '<br>';
		}

		if (isset($_SESSION['session']))
			unset($_SESSION['session']);


		if (!is_null($resultat[0][0])) {

			$_SESSION['session']['eMail'] = $resultat[0]['mail'];
			$_SESSION['session']['prenom'] = $resultat[0]['prenom'];
			$_SESSION['session']['utilisateur_id'] = $resultat[0]['utilisateur_id'];
		}

		setcookie("mail", $resultat[0]['mail'], time() + 60 * 60 * 24 * 2, "/");
	}

	/**
	 * La fonction permet de s'authentifier.
	 * 
	 * La fonction est en static car elle est utlisié dans plusieurs classes. 
	 * @param string $mail Email de l'utilisateur.
	 * @param string $password Mot de passe de l'utilisateur.
	 */
	public static function authentifier($mail, $password)
	{

		$USAGER = _BDD_USAGER;
		$MDP = _BDD_MOTDEPASSE;
		$HOTE = _BDD_HOTE;
		$BASE = _BDD_BASE;
		$DSN = _BDD_DSN;
		
		$mail = filter_var($mail, FILTER_SANITIZE_SPECIAL_CHARS);
		$password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);

		try {

			$basededonnees = new PDO($DSN, $USAGER, $MDP);
			$SQL_SELECT_UTILISATEUR = "SELECT utilisateur_id, prenom, mail, hash  FROM utilisateur WHERE mail = :mail";
			$demandeMail = $basededonnees->prepare($SQL_SELECT_UTILISATEUR);
			$demandeMail->bindParam(':mail', $mail);
			$demandeMail->execute();

			$resultat = $demandeMail->fetchAll();

		} catch(PDOException $e) {

			echo '<br>' . $e->getMessage() . '<br>';
		}

		if (!is_null($resultat[0][0])) {

			if (password_verify($password, $resultat[0]['hash'])) {
				Authentification::chargerProfile($resultat[0]['mail']);
				return 0;
			} else {
				echo "Le mot de passe n'est pas bon";
			}
		}
	}

	/**
	 * La fonction permet de se déconnecter.
	 * 
	 * La fonction est en static car elle est utlisié dans plusieurs classes. 
	 */
	public static function disconnect()
	{
		if (isset($_SESSION['session'])) {
			unset($_SESSION['session']);
		}
	}
}
