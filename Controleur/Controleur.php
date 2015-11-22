<?php

require 'modele/Contact.php';
require 'modele/BaseDeDonnees.php';

function ajoutAction() {
	require 'vue/vueAjout.php';
}

function notficationAction() {
	$baseDeDonnees = new BaseDeDonnees();
    $baseDeDonnees->ajouterContact($_POST['nom'], $_POST['prenom'], $_POST['societe'], $_POST['adresse'], $_POST['numero'], $_POST['email'], $_POST['site'], $_POST['type']);
    require 'vue/vueNotification.php';
}

function authentificationAction() {
	require 'vue/vueAuthentification.php';
}

function listeContactAction() {
	$baseDeDonnees = new BaseDeDonnees();
    $contacts = $baseDeDonnees->getContacts();
	require 'vue/vueListeContact.php';
}

function modificationContactAction($id) {
	$baseDeDonnees = new BaseDeDonnees();
    $contact = $baseDeDonnees->getContact($id);
	require 'vue/vueModificationContact.php';
}

function erreurAction($message) {
	require 'vue/vueErreur.php';
}