<?php

namespace Services;

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
		$prenom = filter_var($prenom, FILTER_SANITIZE_SPECIAL_CHARS);
		$password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
		$password2 = filter_var($password2, FILTER_SANITIZE_SPECIAL_CHARS);
		$mail = filter_var($mail, FILTER_SANITIZE_SPECIAL_CHARS);

		$utilisateur = new Utilisateur([$prenom, $mail]);

		if (!estInscrit($utilisateur)) {

			$hash1 = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

			if (password_verify($password2, $hash1)) {

				$utilisateur->__set('hash', $hash1);
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

		$utilisateur = UtilisateurDAO::obtenirUtilisateur($mail);

		if (isset($_SESSION['utilisateur'])) {
			unset($_SESSION['utilisateur']);
		}

		if (!is_null($utilisateur)) {

			$_SESSION['utilisateur']['mail'] = $utilisateur->mail;
			$_SESSION['utilisateur']['prenom'] = $utilisateur->prenom;
			$_SESSION['utilisateur']['id'] = $utilisateur->id;
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
		try {	
			$mail = filter_var($mail, FILTER_SANITIZE_SPECIAL_CHARS);
			$password = filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);

			$utilisateur = UtilisateurDAO::obtenirUtilisateur($mail);

			if(password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]) == $utilisateur->hash) {
				return true;
			} else {
				return false;
			}
		} catch(PDOException $e) {
			return false;
		}
	}

	/**
	 * La fonction permet de se déconnecter.
	 * 
	 * La fonction est en static car elle est utlisié dans plusieurs classes. 
	 */
	public static function disconnect()
	{
		if (isset($_SESSION['utilisateur'])) {
			unset($_SESSION['utilisateur']);
		}
	}
}
