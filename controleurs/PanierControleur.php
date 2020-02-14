<?php

namespace Controleurs;

use Controleurs\ControleurCRUD;
use Accesseurs\PanierDAO;

class PanierControleur implements ControleurCRUD
{
	public function lister() {
		return PanierDAO::listerPaniers();
	}

	public function detailler() {
		return PanierDAO::detaillerPanier($_GET["id"]);
	}

	public function ajouter() {

	}

	public function stocker() {

	}

	public function editer() {

	}

	public function mettreAJour() {

	}

	public function effacer() {

	}
}
