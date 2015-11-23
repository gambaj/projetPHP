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

	public function getNombreContact() {
		$connexion = $this->bdd;
		$req = $connexion->query("select count(id) as nombre from contact");
		$resultat = $req->fetch();
		return $resultat['nombre'];
	}

	public function getContacts($contactParPage, $pageCourante) {

		$connexion = $this->bdd;
		$req = $connexion->query("select * from contact order by prenom limit " . (($pageCourante-1)*$contactParPage) . ",$contactParPage");
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

	public function modifierContact($idContact, $nom, $prenom, $societe, $adresse, $numero, $email, $site, $type) {
		$connexion = $this->bdd;
		$req = $connexion->prepare('UPDATE contact set nom = :nouveauNom, prenom = :nouveauPrenom, societe = :nouvelleSociete, adresse = :nouvelleAdresse, numero = :nouveauNumero, email = :nouvelleEmail, site = :nouveauSite, type = :nouveauType where id = :id');
		$req->execute(array(
			'nouveauNom' => $nom, 
			'nouveauPrenom' => $prenom, 
			'nouvelleSociete' => $societe, 
			'nouvelleAdresse' => $adresse, 
			'nouveauNumero' => $numero, 
			'nouvelleEmail' => $email, 
			'nouveauSite' => $site, 
			'nouveauType' => $type,
			'id' => $idContact
		));
	}

	public function supprimerContact($idContact) {
		$connexion = $this->bdd;
		$req = $connexion->prepare('delete from contact where id = ?');
		$req->execute(array($idContact));
	}
}