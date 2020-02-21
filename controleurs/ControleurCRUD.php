<?php

namespace Controleurs;

interface ControleurCRUD {
	public static function lister();
	public static function detailler();
	public static function ajouter();
	public static function stocker();
	public static function editer();
	public static function mettreAJour();
	public static function effacer();
}