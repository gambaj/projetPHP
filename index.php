<?php

require('controleur/Controleur.php');

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'liste') {
			listeContactAction();
		} 
		else if ($_GET['action'] == 'ajout') {
			ajoutAction();
		}
		else if ($_GET['action'] == 'modification') {
			if (isset($_GET['id'])) {
				$idContact = intval($_GET['id']);
				if ($idContact != 0) {
					modificationContactAction($idContact);
				}
	          	else {
	          		throw new Exception("Identifiant de billet non valide !");
	          	}
			}
			else {
				throw new Exception("Identifiant de billet non renseigné !");
			}
		} else if ($_GET['action'] == 'notification')  {
			notficationAction();
		}
		else {
			throw new Exception("Action non valide !");
		}
	} else {
		ajoutAction();
	}
} catch (Exception $e) {
    erreurAction($e->getMessage());
}
