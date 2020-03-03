<?php

namespace Modeles;

class Panier
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'nom' => FILTER_SANITIZE_STRING,
			'proprietaire' => FILTER_VALIDATE_INT
		);

	protected $id;
	protected $nom;
	protected $articles;

	public function __construct($tableau)
	{
		if (isset($tableau['articles']))
			$this->articles = $tableau['articles'];

		$tableau = filter_var_array($tableau, Panier::$filtres);

		$this->id = $tableau['id'];
		$this->nom = $tableau['nom'];
		$this->proprietaire = $tableau['proprietaire'];
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