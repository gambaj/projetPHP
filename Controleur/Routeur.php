<?php

require 'controleur/ControleurContact.php' ;
//require 'vue/Vue.php';

class Routeur {

	private $controleurContact;

	public function __construct() {
	    $this->controleurContact = new ControleurContact();
	}

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
			          		throw new Exception("Identifiant de billet non valide !");
			          	}
					}
					else {
						throw new Exception("Identifiant de billet non renseigné !");
					}
				} else if ($_GET['action'] == 'notification')  {
					$this->controleurContact->notficationAction();
				}
				else {
					throw new Exception("Action non valide !");
				}
			} else {
				$this->controleurContact->ajoutAction();
			}
		} catch (Exception $e) {
		    $this->erreur($e->getMessage());
		}
	}

	public function erreur($message) {
		$vue = new Vue("vueErreur");
    	$vue->generer(array('message' => $message));
	}
}
