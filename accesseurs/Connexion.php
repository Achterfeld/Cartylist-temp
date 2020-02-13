<?php

namespace Accesseurs;

class Connexion
{
	private static $instance = null;
	public $basededonnee;

	private function __construct() {
		$this->basededonnees = new \PDO(_BDD_DSN, _BDD_USAGER, _BDD_MOTDEPASSE);
		$this->basededonnees->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}

	public static function instance() {
		if (Connexion::$instance == null) {
			Connexion::$instance = new Connexion;
		}
		return Connexion::$instance;
	}
}