<?php

namespace Accesseurs\Requetes;

interface UtilisateurSQL
{
	
	public const SQL_SAUVER_UTILISATEUR = "UPDATE utilisateur SET prenom = :prenom , mail = :mail , `hash` = `:hash` img = :img WHERE id = :id";
	public const SQL_MODIFIER_UTILISATEUR = "UPDATE utilisateur SET prenom = :prenom , mail = :mail , avatar = :avatar WHERE utilisateur_id = :id";
    public const SQL_DETAIL_PANIER = "SELECT count(*) FROM utilisateur WHERE id = :id";
    public const SQL_SELECT_UTILISATEUR = "SELECT *  FROM utilisateur WHERE mail = :mail";
    public const SQL_SELECT_UTILISATEUR_ID = "SELECT *  FROM utilisateur WHERE utilisateur_id = :id";
    public const SQL_INSERT_UTILISATEUR = "INSERT INTO utilisateur (prenom, mail, `hash`, avatar) VALUES (:prenom, :mail, :hash, :avatar)";

}