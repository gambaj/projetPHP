<?php

require 'controleur/ControleurAuthentification.php';
require 'controleur/ControleurContact.php';

/**
 * Cette classe represente le routeur principal de l'application et permet d'utiliser les actions des bons controleurs en fonctions de l'url.
 */
class Routeur
{
    private $controleurContact;
    private $controleurAuthentification;

    /**
     * Constructeur de la classe Routeur.
     */
    public function __construct()
    {
        $this->controleurContact = new ControleurContact();
        $this->controleurAuthentification = new ControleurAuthentification();
    }

    /**
     * Méthode permettant de gérer les routes et d'appeler les bons controleurs en fonction des URL.
     * Vue la bonne vue générée.
     */
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'liste' :
                        $this->liste();
                        break;

                    case 'ajout' :
                        $this->ajout();
                        break;

                    case 'modification' :
                        $this->modification();
                        break;

                    case 'notification' :
                        $this->notification();
                        break;

                    case 'miseAJour' :
                        $this->miseAJour();
                        break;

                    case 'suppression' :
                        $this->suppression();
                        break;

                    case 'authentification' :
                        $this->authentification();
                        break;

                    case 'validationAuthentification' :
                        $this->validationAuthentification();
                        break;

                    case 'validationUtilisateur' :
                        $this->validationUtilisateur();
                        break;

                    case 'creationUtilisateur' :
                        $this->creationUtilisateur();
                        break;

                    case 'deconnexion' :
                        $this->deconnexion();
                        break;

                    default :
                        throw new Exception('Action non valide !');
                }
            } else {
                $this->controleurAuthentification->creationUtilisateurAction();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    /**
     * Methode appelant l'action de liste du controleur Contact.
     *
     * @return Vue la vue de liste de contact.
     */
    public function liste()
    {
        if (isset($_GET['page'])) {
            $this->controleurContact->listeContactAction();
        } else {
            throw new Exception('Numero de page non renseigné !');
        }
    }

    /**
     * Methode appelant l'action de modification du controleur Contact.
     *
     * @return Vue la vue de modification d'un contact.
     */
    public function modification()
    {
        if (isset($_GET['id'])) {
            $idContact = intval($_GET['id']);
            if ($idContact != 0) {
                $this->controleurContact->modificationContactAction($idContact);
            } else {
                throw new Exception('Identifiant de contact non valide !');
            }
        } else {
            throw new Exception('Identifiant de contact non renseigné !');
        }
    }

    /**
     * Methode appelant l'action d'ajout du controleur Contact.
     *
     * @return Vue la vue d'ajout de contact.
     */
    public function ajout()
    {
        $this->controleurContact->ajoutAction();
    }

    /**
     * Methode appelant l'action de notification du controleur Contact.
     *
     * @return Vue la vue de notification de contact.
     */
    public function notification()
    {
        $this->controleurContact->notificationAction();
    }

    /**
     * Methode appelant l'action de mise a jour du controleur Contact.
     *
     * @return Vue la vue de mise a jour de contact.
     */
    public function miseAJour()
    {
        if (isset($_GET['id'])) {
            $idContact = intval($_GET['id']);
            if ($idContact != 0) {
                $this->controleurContact->miseAJourContactAction($idContact);
            } else {
                throw new Exception('Identifiant de contact non valide !');
            }
        } else {
            throw new Exception('Identifiant de contact non renseigné !');
        }
    }

    /**
     * Methode appelant l'action de suppression du controleur Contact.
     *
     * @return Vue la vue de liste de contact.
     */
    public function suppression()
    {
        if (isset($_GET['id'])) {
            $idContact = intval($_GET['id']);
            if ($idContact != 0) {
                $this->controleurContact->suppressionContactAction($idContact);
            } else {
                throw new Exception('Identifiant de contact non valide !');
            }
        } else {
            throw new Exception('Identifiant de contact non renseigné !');
        }
    }

    /**
     * Méthode appelant l'action d'authentification du controleur Authentification.
     *
     * @return Vue la vue d'authentification de l'authentification.
     */
    public function authentification()
    {
        $this->controleurAuthentification->authentificationAction();
    }

    /**
     * Méthode appelant l'action de validation de l'authentification du controleur Authentification.
     *
     * @return Vue la vue de liste de contact de contact.
     */
    public function validationAuthentification()
    {
        $this->controleurAuthentification->validationAuthentificationAction();
    }

    /**
     * Méthode appelant l'action de validation de l'utilisateur du controleur Authentification.
     *
     * @return Vue la vue de validation de l'authentification de l'authentification.
     */
    public function validationUtilisateur()
    {
        $this->controleurAuthentification->validationUtilisateurAction();
    }

    /**
     * Méthode appelant l'action de creation d'utilisateur du controleur Authentification.
     *
     * @return Vue la vue de creation d'utilisateur de l'authentification.
     */
    public function creationUtilisateur()
    {
        $this->controleurAuthentification->creationUtilisateurAction();
    }

    /**
     * Méthode appelant l'action de deconnexion d'utilisateur du controleur Authentification.
     *
     * @return Vue la vue d'authentification' de l'authentification.
     */
    public function deconnexion()
    {
        $this->controleurAuthentification->deconnexionAction();
    }

    /**
     * Methode permettant d'afficher les messages d'erreur.
     *
     * @param String $message le message d'erreur à afficher.
     *
     * @return Vue la vue d'un message d'erreur.
     */
    public function erreur($message)
    {
        $vue = new Vue('vueErreur');
        $vue->generer(array('message' => $message));
    }
}
