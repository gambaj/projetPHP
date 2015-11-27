<?php
/**
 * Cette classe est le modèle d'Authentification et permet la liaison à la table Utilisateur base de données.
 */
class Authentification
{
    private $bdd;

    /**
     * Constructeur de la classe Authentification.
     */
    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    /**
     * Methode retournant un tableau d'objet Utilisateur.
     *
     * @return array Utilisateur un tableau d'objet Utilisateur retournée par la requete SQL.
     */
    public function getUtilisateurs()
    {
        $connexion = $this->bdd;
        $req = $connexion->query('select * from utilisateur order by pseudo');
        $utilisateurs = array();
        while ($utilisateurData = $req->fetch()) {
            $utilisateur = new Utilisateur($utilisateurData['pseudo']);
            $utilisateur->hydrate($utilisateurData);
            array_push($utilisateurs, $utilisateur);
        }

        return $utilisateurs;
    }

    /**
     * Methode retournant un objet Utilisateur en fonction du pseudo et mot de passe.
     *
     * @param String $pseudo   le pseudo de l'utilisateur cherché.
     * @param String $password le password de l'utilisateur cherché.
     *
     * @return String l'utilisateur representant le pseudo et password s'il existe, null sinon.
     */
    public function getUtilisateur($pseudo, $password)
    {
        $connexion = $this->bdd;
        $req = $connexion->prepare('select * from utilisateur where pseudo = ? and password = ?');
        $req->execute(array($pseudo, $password));

        if (1 == $req->rowCount()) {
            $utilisateurData = $req->fetch();
            $utilisateur = new Utilisateur($utilisateurData['pseudo']);
            $utilisateur->hydrate($utilisateurData);

            return $utilisateur;
        }

        return;
    }

    /**
     * Methode permettant de tester si le pseudo choisis existe déjà ou non.
     *
     * @param String $pseudo le pseudo de l'utilisateur cherché.
     *
     * @return bool true si le pseudo n'existe pas deja dans la base.
     */
    public function pseudoNonExistant($pseudo)
    {
        $connexion = $this->bdd;

        $req = $connexion->prepare('select count(id) as nombre from utilisateur where pseudo = ?');
        $req->execute(array($pseudo));
        $resultat = $req->fetch();

        if ($resultat['nombre'] > 0) {
            return false;
        }

        return true;
    }

    /**
     * Methode permettant d'ajouter un utilisateur dans la base.
     *
     * @param String $pseudo   le pseudo.
     * @param String $password le mot de passe.
     *
     * @return true si la requete c'est bien passée.
     */
    public function ajouterUtilisateur($pseudo, $password)
    {
        $connexion = $this->bdd;
        $req = $connexion->prepare('INSERT INTO utilisateur (pseudo, password) VALUES(?, ?)');
        $req->execute(array($pseudo, $password));
    }
}
