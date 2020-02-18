<?php

namespace Modeles;

class Panier
{
	protected $id;
	protected $nom;
	protected $articles;

	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'nom' => FILTER_SANITIZE_STRING,
		);

	public function __construct($tableau)
	{
		$this->articles = $tableau['articles'];

		$tableau = filter_var_array($tableau, Panier::$filtres);

		$this->id = $tableau['id'];
		$this->nom = $tableau['nom'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
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