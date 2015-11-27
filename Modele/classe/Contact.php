<?php
/**
 * Cette classe represente un contacte.
 */
class Contact
{
    private $id;
    private $utilisateur;
    private $prenom;
    private $nom;
    private $societe;
    private $email;
    private $type;
    private $numero;
    private $adresse;
    private $site;

    /**
     * Constructeur de la classe Contact.
     *
     * @param String $nom le nom du contact.
     */
    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Methode permettant de créer un objet Contact à partir de la table Contact de la base de données.
     *
     * @param array $donnees le tableau de champ de la table Contact.
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * Getter de l'ID d'un contact.
     *
     * @return id du contact.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Getter de l'utilisateur d'un contact.
     *
     * @return utilisateur du contact.
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Getter du prenom d'un contact.
     *
     * @return prenom du contact.
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Getter du nom d'un contact.
     *
     * @return nom du contact.
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Getter de la societe d'un contact.
     *
     * @return societe du contact.
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Getter de l'email d'un contact.
     *
     * @return email du contact.
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Getter du type d'un contact.
     *
     * @return type du contact.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Getter du numero d'un contact.
     *
     * @return numero du contact.
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Getter de l'adresse d'un contact.
     *
     * @return adresse du contact.
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Getter du site d'un contact.
     *
     * @return site du contact.
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Setter de l'id d'un contact.
     *
     * @param int $id l'id du contact.
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Setter de l'utilisateur d'un contact.
     *
     * @param String $utilisateur l'utilisateur du contact.
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;
    }

    /**
     * Setter du prenom d'un contact.
     *
     * @param String $prenom le prenom du contact.
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * Setter du nom d'un contact.
     *
     * @param String $nom le nom du contact.
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Setter de la societe d'un contact.
     *
     * @param String $societe la societe du contact.
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;
    }

    /**
     * Setter de l'email d'un contact.
     *
     * @param String $email l'email du contact.
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Setter du type d'un contact.
     *
     * @param String $type le type du contact.
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Setter du numero d'un contact.
     *
     * @param String $numero le numero du contact.
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * Setter de l'adresse d'un contact.
     *
     * @param String $adresse le adresse du contact.
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * Setter du site d'un contact.
     *
     * @param String $site le site du contact.
     */
    public function setSite($site)
    {
        $this->site = $site;
    }
}
