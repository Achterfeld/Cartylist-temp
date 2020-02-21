<?php

namespace Utilitaires;

class Page {

	public static $titre = '';

	public static function titre($titre) {
		Page::$titre = $titre;
		$_SESSION["page"]['titre'] = $titre;
	}
}