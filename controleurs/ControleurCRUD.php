<?php

namespace Controleurs;

interface ControleurCRUD {
	public function lister();
	public function detailler();
	public function ajouter();
	public function stocker();
	public function editer();
	public function mettreAJour();
	public function effacer();
}