<?php
/**
 * Cette classe est le modèle de Contact et permet la liaison à la table Contact base de données.
 */
class ListeDeContact {

	private $bdd;

	/**
	 * Constructeur de la classe ListeDeContact.
	 */
	public function __construct() {
		try {
			$this->bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
		} catch(Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
	}

	/**
	 * Methode retournant le nombre de contact.
	 * @return le nombre de contact
	 */
	public function getNombreContact($utilisateur) {
		$connexion = $this->bdd;
		$req = $connexion->prepare('select count(id) as nombre from contact where utilisateur = ?');
		$req->execute(array($utilisateur));
		$resultat = $req->fetch();
		return $resultat['nombre'];
	}

	/**
	 * Methode retournant un tableau d'objet Contact.
	 * @param  int $contactParPage le nombre de contact voulu par page.
	 * @param  int $pageCourante   le numero de la page courante.
	 * @return array Contact un tableau d'objet Contact retournée par la requete SQL.
	 */
	public function getContacts($utilisateur, $contactParPage, $pageCourante) {

		$connexion = $this->bdd;
		$req = $connexion->prepare("select * from contact where utilisateur = ? order by prenom limit " . (($pageCourante-1)*$contactParPage) . ",$contactParPage");
		$req->execute(array($utilisateur));

		$contacts = array();
		while ($contactData = $req->fetch()) {

			$contact = new Contact($contactData['nom']);
			$contact->hydrate($contactData);
			array_push($contacts, $contact);
		}
		return $contacts;
	}

	/**
	 * Methode retournant un objet Contact
	 * @param  int $idContact l'id du contact cherché.
	 * @return Contact le contact representant l'id.
	 */
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

	/**
	 * Methode permettant d'ajouter un contact dans la base.
	 * @param  String $nom       le nom.
	 * @param  String $prenom    le prenom.
	 * @param  String $societe   la societe.
	 * @param  String $adresse   la adresse.
	 * @param  String $numero    le numero.
	 * @param  String $email     l'adresse email.
	 * @param  String $site      le site.
	 * @param  String $type      le type.
	 * @return true si la requete c'est bien passée.
	 */
	public function ajouterContact($utilisateur, $nom, $prenom, $societe, $adresse, $numero, $email, $site, $type) {
		$connexion = $this->bdd;
		$req = $connexion->prepare('INSERT INTO contact (utilisateur, nom, prenom, societe, adresse, numero, email, site, type) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
		$req->execute(array($utilisateur, $nom, $prenom, $societe, $adresse, $numero, $email, $site, $type));
	}

	/**
	 * Methode permettant de modifier un contact de la base.
	 * @param  int $idContact [description]
	 * @param  String $nom       le nouveau nom.
	 * @param  String $prenom    le nouveau prenom.
	 * @param  String $societe   la nouvelle societe.
	 * @param  String $adresse   la nouvelle adresse.
	 * @param  String $numero    le nouveau numero.
	 * @param  String $email     la nouvelle adresse email.
	 * @param  String $site      le nouveau site.
	 * @param  String $type      le nouveau type.
	 * @return true si la requete c'est bien passée.
	 */
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

	/**
	 * Methode permettant de supprimer un contact de la base.
	 * @param  int $idContact l'id du contact à supprimer.
	 * @return true si la requete c'est bien passée.
	 */
	public function supprimerContact($idContact) {
		$connexion = $this->bdd;
		$req = $connexion->prepare('delete from contact where id = ?');
		$req->execute(array($idContact));
	}
}