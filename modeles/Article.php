<?php

namespace Modeles;

class Article
{
	public static $filtres = 
		array(
            'id' => FILTER_VALIDATE_INT,
            'panier' => FILTER_VALIDATE_INT,
            'nom' => FILTER_SANITIZE_STRING,
            'prix' => FILTER_VALIDATE_FLOAT,
            'adresse' => FILTER_SANITIZE_URL,
            'notes' => FILTER_SANITIZE_STRING,
		);
		
    protected $nom;
    protected $prix;
    protected $adresse;
    protected $notes;

	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Article::$filtres);

        $this->id = $tableau['id'];
        $this->panier = $tableau['panier'];
        $this->nom = $tableau['nom'];
        $this->prix = $tableau['prix'];
        $this->adresse = $tableau['adresse'];
        $this->notes = $tableau['notes'];
        
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