<?php

namespace Accesseurs\Requetes;

interface ArticleSQL
{
	public const SQL_LISTE_ARTICLES = "SELECT * FROM article";
	public const SQL_DETAIL_ARTICLE = "SELECT * FROM article WHERE id = :id"; 
	public const SQL_LISTE_ARTICLES_PANIER = "SELECT * FROM article WHERE panier = :id";
	public const SQL_NOMBRE_ARTICLES_PANIER = "SELECT COUNT(*) FROM article WHERE panier = :id";
	public const SQL_AJOUTER_ARTICLE = "INSERT INTO article (panier, nom, prix, adresse, notes) VALUES (:panier, :nom, :prix, :adresse, :notes)";
	public const SQL_EDITER_ARTICLE = "UPDATE article SET panier = :panier, nom = :nom, prix = :prix, adresse = :adresse, notes = :notes WHERE id = :id";
}
?>