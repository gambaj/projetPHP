<?php
/**
 * Cette classe est le modèle d'Authentification et permet la liaison à la table Utilisateur base de données.
 */
class Authentification {

	private $bdd;

	/**
	 * Constructeur de la classe Authentification.
	 */
	public function __construct() {
		try {
			$this->bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
		} catch(Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
	}

	/**
	 * Methode retournant un tableau d'objet Utilisateur.
	 * @return array Utilisateur un tableau d'objet Utilisateur retournée par la requete SQL.
	 */
	public function getUtilisateurs() {

		$connexion = $this->bdd;
		$req = $connexion->query("select * from utilisateur order by pseudo");
		$utilisateurs = array();
		while ($utilisateurData = $req->fetch()) {

			$utilisateur = new Utilisateur($utilisateurData['pseudo']);
			$utilisateur->hydrate($utilisateurData);
			array_push($utilisateurs, $utilisateur);
		}
		return $utilisateurs;
	}

	/**
	 * Methode retournant un objet Utilisateur.
	 * @param  String $pseudo le pseudo de l'utilisateur cherché.
	 * @param  String $password le password de l'utilisateur cherché.
	 * @return String l'utilisateur representant le pseudo et password.
	 */
	public function getUtilisateur($pseudo, $password) {

		$connexion = $this->bdd;
		$req = $connexion->prepare("select * from utilisateur where pseudo = ? and password = ?");
		$req->execute(array($pseudo, $password));

		if (1 == $req->rowCount()) {
			$utilisateurData = $req->fetch();
			$utilisateur = new Utilisateur($utilisateurData['pseudo']);
			$utilisateur->hydrate($utilisateurData);
		}
	
		return $utilisateur;
	}

	/**
	 * Methode permettant d'ajouter un utilisateur dans la base.
	 * @param  String $pseudo     le pseudo.
	 * @param  String $password   le mot de passe.
	 * @return true si la requete c'est bien passée.
	 */
	public function ajouterUtilisateur($pseudo, $password) {
		$connexion = $this->bdd;
		$req = $connexion->prepare('INSERT INTO utilisateur (pseudo, password) VALUES(?, ?)');
		$req->execute(array($pseudo, $password));
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