<?php

namespace Accesseurs\Requetes;

interface UtilisateurSQL
{
	
	public const SQL_SAUVER_UTILISATEUR = "UPDATE utilisateur SET prenom = :prenom , mail = :mail , `hash` = `:hash` img = :img WHERE id = :id";
    public const SQL_DETAIL_PANIER = "SELECT count(*) FROM utilisateur WHERE id = :id";
    public const SQL_SELECT_UTILISATEUR = "SELECT *  FROM utilisateur WHERE mail = :mail";

}