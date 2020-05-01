<?php

namespace Modeles;

class Transaction
{
	public static $filtres = 
		array(
            'id' => FILTER_VALIDATE_INT,
            'emetteur' => FILTER_SANITIZE_STRING,
            'montant' => FILTER_VALIDATE_FLOAT,
		);
		
	protected $id;
    protected $emetteur;
    protected $montant;

	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Transaction::$filtres);

        $this->id = $tableau['id'];
        $this->emetteur = $tableau['emetteur'];
        $this->montant = $tableau['montant'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'emetteur':
				$this->emetteur = $valeur;
			break;

			case 'montant':
				$this->montant = $valeur;
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