<?php

require 'controleur/ControleurAuthentification.php' ;
require 'controleur/ControleurContact.php' ;

/**
 * Cette classe represente le routeur principal de l'application.
 */
class Routeur {

	private $controleurContact;
	private $controleurAuthentification;

	/**
	 * Constructeur de la classe Routeur.
	 */
	public function __construct() {
	    $this->controleurContact = new ControleurContact();
	    $this->controleurAuthentification = new ControleurAuthentification();
	}

	/**
	 * Méthode permettant de gérer les routes et d'appeler les bons controleurs en fonction des URL.
	 * Vue la bonne vue générée.
	 */
	public function routerRequete() {
		try {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'liste') {
					if (isset($_GET['page'])) {
						$this->controleurContact->listeContactAction();
					} else {
						throw new Exception("Numero de page non renseigné !");
					}
				} 
				else if ($_GET['action'] == 'ajout') {
					$this->controleurContact->ajoutAction();
				}
				else if ($_GET['action'] == 'modification') {
					if (isset($_GET['id'])) {
						$idContact = intval($_GET['id']);
						if ($idContact != 0) {
							$this->controleurContact->modificationContactAction($idContact);
						}
			          	else {
			          		throw new Exception("Identifiant de contact non valide !");
			          	}
					}
					else {
						throw new Exception("Identifiant de contact non renseigné !");
					}
				} else if ($_GET['action'] == 'notification')  {
					$this->controleurContact->notificationAction();
				} 
				else if ($_GET['action'] == 'miseAJour') {
					if (isset($_GET['id'])) {
						$idContact = intval($_GET['id']);
						if ($idContact != 0) {
							$this->controleurContact->miseAJourContactAction($idContact);
						}
			          	else {
			          		throw new Exception("Identifiant de contact non valide !");
			          	}
					}
					else {
						throw new Exception("Identifiant de contact non renseigné !");
					}
				}
				else if ($_GET['action'] == 'suppression') {
					if (isset($_GET['id'])) {
						$idContact = intval($_GET['id']);
						if ($idContact != 0) {
							$this->controleurContact->suppressionContactAction($idContact);
						}
			          	else {
			          		throw new Exception("Identifiant de contact non valide !");
			          	}
					}
					else {
						throw new Exception("Identifiant de contact non renseigné !");
					}
				}
				else {
					throw new Exception("Action non valide !");
				}
			} else {
				$this->controleurAuthentification->authentificationAction();
			}
		} catch (Exception $e) {
		    $this->erreur($e->getMessage());
		}
	}

	/**
	 * Methode permettant d'afficher les messages d'erreur.
	 * @param String $message le message d'erreur à afficher.
	 * @return Vue la vue d'un message d'erreur.
	 */
	public function erreur($message) {
		$vue = new Vue("vueErreur");
    	$vue->generer(array('message' => $message));
	}
}
