<?php

namespace Modeles;

class Utilisateur
{
	protected $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
            'prenom' => FILTER_SANITIZE_STRING,
            'mail' => FILTER_SANITIZE_STRING,
            'hash' => FILTER_SANITIZE_STRING,
            'avatar' => FILTER_SANITIZE_STRING,
            'admin' => FILTER_VALIDATE_BOOLEAN,
		);
		
    protected $id;
    protected $prenom;
    protected $mail;
    protected $hash;
	protected $avatar;
	protected $admin;

	
	public function __construct($tableau)
	{
		if(isset($tableau['utilisateur_id'])) {
			$tableau['utilisateur_id'] = filter_var($tableau['utilisateur_id'], $this->filtres['id']);
			$this->id = $tableau['utilisateur_id'];
		}

		if(isset($tableau['prenom'])) {
			$tableau['prenom'] = filter_var($tableau['prenom'], $this->filtres['prenom']);
			$this->prenom = $tableau['prenom'];
		}
		if(isset($tableau['mail'])) {
			$tableau['mail'] = filter_var($tableau['mail'], $this->filtres['mail']);
			$this->mail = $tableau['mail'];
		}
		if(isset($tableau['hash'])) {
			$tableau['hash'] = filter_var($tableau['hash'], $this->filtres['hash']);
			$this->hash = $tableau['hash'];
		}
		if(isset($tableau['avatar'])) {
			$tableau['avatar'] = filter_var($tableau['avatar'], $this->filtres['avatar']);
			$this->avatar = $tableau['avatar'];
		}
		if(isset($tableau['admin'])) {
			$tableau['admin'] = filter_var($tableau['admin'], $this->filtres['admin']);
			$this->admin = $tableau['admin'];
		}
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'prenom':
				$this->$propriete = $valeur;
			break;
		
			case 'mail':
				$this->$propriete = $valeur;
			break;

			case 'hash':
				$this->$propriete = $valeur;
			break;

			case 'avatar':
				$this->$propriete = $valeur;
			break;

			case 'admin':
				$this->$propriete = $valeur;
			break;
		}
	}

	public function &__get($propriete)
	{
		$self = get_object_vars($this); // externaliser pour optimiser
		return $self[$propriete];
	}	
}
?>