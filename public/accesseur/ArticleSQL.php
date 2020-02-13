
<?php
interface ArticleSQL
{
	
	public const SQL_LISTE_ARTICLES = "SELECT * FROM article";
	public const SQL_DETAIL_ARTICLE = "SELECT * FROM article WHERE id = :id"; 

}
?>