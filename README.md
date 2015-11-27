# projetPHP
Gestion de contact avec systeme d'authentification

# Technologie
- HTML
- CSS
- JavaScript
- PHP

# Architecture
- MVC objet en PHP
- PHPdoc généré dans le dosser "docs"
- Php-cs-fixer utilisé pour les conventions PSR-1 et PSR-2

# Auteur
Jordann Gamba

# Fonctionnalité
- Liste de tous les contacts
- Création d'un nouveau contact
- Mise à jour d'un contact existant
- Suppression d'un contact
- Pagination de la liste de contact
- Système d'authentification de l'utilisateur
- La validation des données entrées pas l'utilisateur

# Base de données
- Voir le fichier "BD_dump/projet.sql" et le constructeur de la classe "Authentification" pour sa connexion.

# Docu

# Page de base :
- http://localhost/Contact/index.php/

# Page de création de compte :
- http://localhost/Contact/index.php
- http://localhost/Contact/index.php?action=creationUtilisateur
Le pseudo ne doit pas deja exister dans la base.

# Page de connexion : 
- http://localhost/Contact/index.php?action=authentification

# Page de liste de contact :
- http://localhost/Contact/index.php?action=liste&page=0
