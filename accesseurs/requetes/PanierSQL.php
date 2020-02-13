<?php

namespace Accesseurs\Requetes;

interface PanierSQL
{
	
	public const SQL_LISTE_PANIERS = "SELECT * FROM panier";
	public const SQL_DETAIL_PANIER = "SELECT * FROM panier WHERE id = :id";

}