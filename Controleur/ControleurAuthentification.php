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

	public function validationAuthentificationAction() {

		$utilisateur = $this->authentification->getUtilisateur($_POST['pseudo'], $_POST['password']);
		if (isset($utilisateur)) {
			if(!isset($_SESSION)) { 
        		session_start(); 
    		}
			$_SESSION['pseudo'] = $utilisateur->getPseudo();
			$controleurContact = new controleurContact();
			$controleurContact->listeContactAction();
		} else {
			$message = 'Pseudo ou mot de passe incorrect !';
			$vue = new Vue("vueErreur");
    		$vue->generer(array('message' => $message));
		}
	}

	public function creationUtilisateurAction() {

		$vue = new Vue("vueCreationUtilisateur");
    	$vue->generer(array());
	}

	public function validationUtilisateurAction() {

		if ($_POST['password1'] == $_POST['password2']) {
			$this->authentification->ajouterUtilisateur($_POST['pseudo'], $_POST['password1']);
			$this->authentificationAction();
		} else {
			$message = 'Les mots de passe ne sont pas pareils !';
			$vue = new Vue("vueErreur");
    		$vue->generer(array('message' => $message));
		}
	}

	public function deconnexionAction() {
		if(!isset($_SESSION)) { 
        	session_start(); 
    	}
		unset($_SESSION['pseudo']);
		$this->authentificationAction();
	}
}