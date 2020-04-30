<?php

namespace Utilitaires;

class Page {

	public static $titre = '';
	public static $chemin = '';

	public static function titre($titre) {
		Page::$titre = $titre;
		$_SESSION["page"]['titre'] = $titre;
	}

	public static function chemin($chemin) {
		Page::$titre = $chemin;
		$_SESSION["page"]['chemin'] = $chemin;
	}
}