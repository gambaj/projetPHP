<?php
class BaseDeDonnees {

	private $bdd;

	public function __construct() {
		try {
			$this->bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
		} catch(Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
	}

	public function getContacts() {

		$connexion = $this->bdd;
		$req = $connexion->query('select * from contact');
		$contacts = array();
		while ($contactData = $req->fetch()) {

			$contact = new Contact($contactData['nom']);
			$contact->hydrate($contactData);
			array_push($contacts, $contact);
		}
		return $contacts;
	}

	public function getContact($idContact) {

		$connexion = $this->bdd;
		$req = $connexion->prepare('select * from contact where id = ?');
		$req->execute(array($idContact));

		if (1 == $req->rowCount()) {
			$contactData = $req->fetch();
			$contact = new Contact($contactData['nom']);
			$contact->hydrate($contactData);
		}
	
		return $contact;
	}

	public function ajouterContact($nom, $prenom, $societe, $adresse, $numero, $email, $site, $type) {
		$connexion = $this->bdd;
		$req = $connexion->prepare('INSERT INTO contact (nom, prenom, societe, adresse, numero, email, site, type) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
		$req->execute(array($nom, $prenom, $societe, $adresse, $numero, $email, $site, $type));
	}

	public function modifierContact($nom, $prenom, $societe, $adresse, $numero, $email, $site, $type) {
		$connexion = $this->bdd;
		$req = $connexion->prepare('INSERT INTO contact (nom, prenom, societe, adresse, numero, email, site, type) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
		$req->execute(array($nom, $prenom, $societe, $adresse, $numero, $email, $site, $type));
	}

}