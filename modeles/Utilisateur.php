<?php

namespace Modeles;

class Utilisateur
{
	public static $filtres = 
		array(
            'id' => FILTER_VALIDATE_INT,
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
		$tableau = filter_var_array($tableau, Utilisateur::$filtres);

        $this->id = $tableau['id'];
        $this->prenom = $tableau['prenom'];
        $this->mail = $tableau['mail'];
        $this->hash = $tableau['hash'];
        $this->img = $tableau['img'];
        
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