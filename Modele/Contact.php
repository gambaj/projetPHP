<?php
class Contact {

	private $id;
	private $prenom;
	private $nom;
	private $societe;
	private $email;
	private $type;
	private $numero;
	private $adresse;
	private $site;

	public function __construct($nom) {
		$this->nom = $nom;
	}

	public function hydrate(array $donnees) {

		foreach ($donnees as $key => $value) {

			$method = 'set'.ucfirst($key);
       
    		if (method_exists($this, $method)) {
				$this->$method($value);
    		}
  		}
	}

	public function getId() {
		return $this->id;
	}

	public function getPrenom() {
		return $this->prenom;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getSociete() {
		return $this->societe;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getType() {
		return $this->type;
	}

	public function getNumero() {
		return $this->numero;
	}

	public function getAdresse() {
		return $this->adresse;
	}

	public function getSite() {
		return $this->site;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function setSociete($societe) {
		$this->societe = $societe;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function setType($type) {
		$this->type = $type;
	}

	public function setNumero($numero) {
		$this->numero = $numero;
	}

	public function setAdresse($adresse) {
		$this->adresse = $adresse;
	}

	public function setSite($site) {
		$this->site = $site;
	}
}