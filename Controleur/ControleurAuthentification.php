<?php

require 'modele/classe/Utilisateur.php';
require 'modele/Authentification.php';

/**
 * Cette classe est le controleur d'un Utilisateur et permet de gérer les differentes actions possibles.
 */
class ControleurAuthentification {

	private $authentification;

	/**
	 * Constructeur de la classe ControleurAuthentification.
	 */
	public function __construct() {

    	$this->authentification = new Authentification();
	}

	/**
	 * Méthode permettant d'afficher la vue d'une authentification.
	 * @return Vue la vue d'une authentification.
	 */
	public function authentificationAction() {

		$vue = new Vue("vueAuthentification");
    	$vue->generer(array());
	}
}