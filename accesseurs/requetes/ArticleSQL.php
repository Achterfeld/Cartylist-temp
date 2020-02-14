
<?php
interface ArticleSQL
{
	
	public const SQL_LISTE_ARTICLES = "SELECT * FROM article";
	public const SQL_DETAIL_ARTICLE = "SELECT * FROM article WHERE id = :id"; 
	public const SQL_ARTICLE_PANIER = "SELECT * FROM article WHERE panier = :id";
}
?>