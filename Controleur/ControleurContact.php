<?php

require 'modele/classe/Contact.php';
require 'modele/BaseDeDonnees.php';

/**
 * Cette classe est le controleur d'un Contact et permet de gérer les differentes actions possibles.
 */
class ControleurContact {

	private $baseDeDonnees;

	/**
	 * Constructeur de la classe ControleurContact.
	 */
	public function __construct() {

    	$this->baseDeDonnees = new BaseDeDonnees();
	}

	/**
	 * Methode permettant d'afficher la vue d'ajout de contact.
	 * @return Vue la vue d'ajout de contact.
	 */
	public function ajoutAction() {

		if(!isset($_SESSION)) { 
        	session_start(); 
    	}
		if (isset($_SESSION['pseudo'])) {
			$vue = new Vue("vueAjout");
    		$vue->generer(array());
		} else {
			$message = 'Vous devez vous connecter !';
			$vue = new Vue("vueErreur");
    		$vue->generer(array('message' => $message));
		}
	}

	/**
	 * Methode permettant de notifier qu'un contact a bien été ajouté dans son repertoire.
	 * @return Vue la vue de notification.
	 */
	public function notificationAction() {

		if(!isset($_SESSION)) { 
        	session_start(); 
    	}
		if (isset($_SESSION['pseudo'])) {
		    $this->baseDeDonnees->ajouterContact($_POST['nom'], $_POST['prenom'], $_POST['societe'], $_POST['adresse'], $_POST['numero'], $_POST['email'], $_POST['site'], $_POST['type']);
		    $vue = new Vue("vueNotification");
	    	$vue->generer(array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom']));
    	} else {
			$message = 'Vous devez vous connecter !';
			$vue = new Vue("vueErreur");
    		$vue->generer(array('message' => $message));
		}
	}

	/**
	 * Methode permettant de gérer la pagination, la liste de contact et d'y afficher la vue de liste de contact.
	 * @return Vue la vue de liste de contact.
	 */
	public function listeContactAction() {

		if(!isset($_SESSION)) { 
        	session_start(); 
    	}
		if (isset($_SESSION['pseudo'])) {
			$contactParPage = 5;
		    $nombreContact = $this->baseDeDonnees->getNombreContact();
			$nombrePage = ceil($nombreContact/$contactParPage);

			if (isset($_GET['page']) && $_GET['page'] <= $nombrePage && $_GET['page'] > 0) {
				$pageCourante = $_GET['page'];
			} else {
				$pageCourante = 1;
			}
		    $contacts = $this->baseDeDonnees->getContacts($contactParPage, $pageCourante);
		    
		    $vue = new Vue("vueListeContact");
	    	$vue->generer(array('nombreContact' => $nombreContact, 'nombrePage' => $nombrePage, 'pageCourante' => $pageCourante, 'contacts' => $contacts));
		} else {
			$message = 'Vous devez vous connecter !';
			$vue = new Vue("vueErreur");
    		$vue->generer(array('message' => $message));
		}
	}

	/**
	 * Methode permettant de gérer la modification d'un contact et d'afficher la vue de modification d'un contact.
	 * @param  int $id l'id du contact.
	 * @return Vue la vue de modification d'un contact.
	 */
	public function modificationContactAction($id) {

		if(!isset($_SESSION)) { 
        	session_start(); 
    	}
		if (isset($_SESSION['pseudo'])) {
		    $contact = $this->baseDeDonnees->getContact($id);
		    $vue = new Vue("vueModificationContact");
	    	$vue->generer(array('contact' => $contact, 'id' => $id));
    	} else {
			$message = 'Vous devez vous connecter !';
			$vue = new Vue("vueErreur");
    		$vue->generer(array('message' => $message));
		}
	}

	/**
	 * Methode permettant de gérer la mise à jour d'un contact et de rediriger vers la page de liste de contact.
	 * @param  int $id l'id du contact à modifier..
	 * @return Vue la vue de liste de contact.
	 */
	public function miseAJourContactAction($id) {

		if(!isset($_SESSION)) { 
        	session_start(); 
    	}
		if (isset($_SESSION['pseudo'])) {
			$this->baseDeDonnees->modifierContact($id, $_POST['nom'], $_POST['prenom'], $_POST['societe'], $_POST['adresse'], $_POST['numero'], $_POST['email'], $_POST['site'], $_POST['type']);
			$this->listeContactAction();
		} else {
			$message = 'Vous devez vous connecter !';
			$vue = new Vue("vueErreur");
    		$vue->generer(array('message' => $message));
		}
	}

	/**
	 * Methode permettant de gérer la mise à jour d'un contact et de rediriger vers la page de liste de contact.
	 * @param  int $id l'id du contact à supprimer.
	 * @return Vue la vue de liste de contact.
	 */
	public function suppressionContactAction($id) {

		if(!isset($_SESSION)) { 
        	session_start(); 
    	}
		if (isset($_SESSION['pseudo'])) {
			$this->baseDeDonnees->supprimerContact($id);
			$this->listeContactAction();
		} else {
			$message = 'Vous devez vous connecter !';
			$vue = new Vue("vueErreur");
    		$vue->generer(array('message' => $message));
		}
	}
}