<?php

namespace Accesseurs\Requetes;

interface PanierSQL
{
	
	public const SQL_LISTE_PANIERS = "SELECT * FROM panier";
	public const SQL_DETAIL_PANIER = "SELECT * FROM panier WHERE id = :id";
	public const SQL_AJOUTER_PANIER = "INSERT INTO panier (nom) VALUES (:nom)";
	public const SQL_EDITER_PANIER = "UPDATE panier SET nom = :nom WHERE id = :id";
}