<?php

require 'modele/Contact.php';
require 'modele/BaseDeDonnees.php';
require 'vue/Vue.php';

class ControleurContact {

	private $bdd;

	public function __construct() {

    	$this->baseDeDonnees = new BaseDeDonnees();
	}

	public function ajoutAction() {

		$vue = new Vue("vueAjout");
    	$vue->generer(array());
	}

	public function notficationAction() {

	    $this->baseDeDonnees->ajouterContact($_POST['nom'], $_POST['prenom'], $_POST['societe'], $_POST['adresse'], $_POST['numero'], $_POST['email'], $_POST['site'], $_POST['type']);
	    $vue = new Vue("vueNotification");
    	$vue->generer(array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom']));
	}

	public function authentificationAction() {

		$vue = new Vue("vueAuthentification");
    	$vue->generer(array());
	}

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

	public function modificationContactAction($id) {

	    $contact = $this->baseDeDonnees->getContact($id);
	    $vue = new Vue("vueModificationContact");
    	$vue->generer(array('contact' => $contact));
	}
}