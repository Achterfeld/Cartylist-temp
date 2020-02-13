<?php

namespace Modeles;

class Panier
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'nom' => FILTER_SANITIZE_STRING,
		);
		
	protected $nom;

	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Panier::$filtres);

		$this->id = $tableau['id'];
		$this->nom = $tableau['nom'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'id':
				$this->id = $valeur;
			break;
			case 'nom':
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