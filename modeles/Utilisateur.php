<?php

namespace Modeles;

class Utilisateur
{
	public static $filtres = 
		array(
            'prenom' => FILTER_SANITIZE_STRING,
            'mail' => FILTER_SANITIZE_STRING,
            'hash' => FILTER_SANITIZE_STRING,
            'img' => FILTER_SANITIZE_STRING,
		);
		
    protected $id;
    protected $prenom;
    protected $mail;
    protected $hash;
    protected $img;

	
	public function __construct($tableau)
	{
		if(isset($tableau['prenom'])) {
			$tableau['prenom'] = filter_var($tableau['prenom'], $filtres['prenom']);
			$this->prenom = $tableau['prenom'];
		}
		if(isset($tableau['mail'])) {
			$tableau['mail'] = filter_var($tableau['mail'], $filtres['mail']);
			$this->mail = $tableau['mail'];
		}
		if(isset($tableau['hash'])) {
			$tableau['hash'] = filter_var($tableau['hash'], $filtres['hash']);
			$this->hash = $tableau['hash'];
		}
		if(isset($tableau['img'])) {
			$tableau['img'] = filter_var($tableau['img'], $filtres['img']);
			$this->img = $tableau['img'];
		}
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'prenom':
				$this->titre = $valeur;
			break;
		
			case 'mail':
				$this->titre = $valeur;
			break;

			case 'hash':
				$this->titre = $valeur;
			break;

			case 'img':
				$this->titre = $valeur;
			break;
		}
	}

	public function __get($propriete)
	{
		$self = get_object_vars($this); // externaliser pour optimiser
		return $self[$propriete];
	}	
}
?>