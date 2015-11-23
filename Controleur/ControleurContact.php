<?php

require 'modele/Contact.php';
require 'modele/BaseDeDonnees.php';
require 'vue/Vue.php';

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

		$vue = new Vue("vueAjout");
    	$vue->generer(array());
	}

	/**
	 * Methode permettant de notifier qu'un contact a bien été ajouté dans son repertoire.
	 * @return Vue la vue de notification.
	 */
	public function notificationAction() {

	    $this->baseDeDonnees->ajouterContact($_POST['nom'], $_POST['prenom'], $_POST['societe'], $_POST['adresse'], $_POST['numero'], $_POST['email'], $_POST['site'], $_POST['type']);
	    $vue = new Vue("vueNotification");
    	$vue->generer(array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom']));
	}

	/**
	 * Methode permettant d'afficher la vue d'authentification.
	 * @return Vue la vue d'authentification.
	 */
	public function authentificationAction() {

		$vue = new Vue("vueAuthentification");
    	$vue->generer(array());
	}

	/**
	 * Methode permettant de gérer la pagination, la liste de contact et d'y afficher la vue de liste de contact.
	 * @return Vue la vue de liste de contact.
	 */
	public function listeContactAction() {

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
	}

	/**
	 * Methode permettant de gérer la modification d'un contact et d'afficher la vue de modification d'un contact.
	 * @param  int $id l'id du contact.
	 * @return Vue la vue de modification d'un contact.
	 */
	public function modificationContactAction($id) {

	    $contact = $this->baseDeDonnees->getContact($id);
	    $vue = new Vue("vueModificationContact");
    	$vue->generer(array('contact' => $contact, 'id' => $id));
	}

	/**
	 * Methode permettant de gérer la mise à jour d'un contact et de rediriger vers la page de liste de contact.
	 * @param  int $id l'id du contact à modifier..
	 * @return Vue la vue de liste de contact.
	 */
	public function miseAJourContactAction($id) {

		$this->baseDeDonnees->modifierContact($id, $_POST['nom'], $_POST['prenom'], $_POST['societe'], $_POST['adresse'], $_POST['numero'], $_POST['email'], $_POST['site'], $_POST['type']);
		$this->listeContactAction();
	}

	/**
	 * Methode permettant de gérer la mise à jour d'un contact et de rediriger vers la page de liste de contact.
	 * @param  int $id l'id du contact à supprimer.
	 * @return Vue la vue de liste de contact.
	 */
	public function suppressionContactAction($id) {

		$this->baseDeDonnees->supprimerContact($id);
		$this->listeContactAction();
	}
}