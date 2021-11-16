OpenclassRooms - Formation PHP/Symfony
Projet 5 - Création d'un blog PHP

[![SymfonyInsight](https://insight.symfony.com/projects/37040ac3-bba9-43a8-967f-eba30d8cff74/big.svg)](https://insight.symfony.com/projects/37040ac3-bba9-43a8-967f-eba30d8cff74)

Prérequis
Php et Composer doivent être installés sur votre serveur afin de pouvoir utiliser le blog.
Disposer d'un server local en cours d'exécution.

Installation
- Cloner le Repositary sur votre serveur et une fois dans le dossier du projet utiliser la commande composer install afin d'installer les dépendances du projet.

- Créer une base de données sur votre SGBD et importer le fichier blogdev.sql se trouvant à la racine du projet. En plus de créer la base de données il intègrera de nombreuses fausses données, comptes admin, utilisateurs, articles et commentaires. 

- Afin d'accéder à cette base de données remplir le fichier Config/database.php avec les accès à votre BDD.

<?php

define('DB_DSN', 'mysql:host=localhost;dbname='name of your database' (ne pas laisser les '');charset=UTF8');

define('DB_USER', 'your username');

define('DB_PASS', 'your database password');

define('DB_OPTIONS', array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>

- Dans le fichier index.php à la ligne 13 

define('local', 'http://localhost/P5_Blog/');

Il vous faudra remplacer l'URL par celle que vous utiliserez.

- Pour terminer et afin de que vous puissiez profiter de l'utilisation du formulaire de contact et de la récupération de mot de passe, veuillez remplir le fichier mail.php avec les accès à votre compte email, le protocole smtp ainsi que le port utilisé. Ces informations sont trouvables chez votre hébergeur.
Puis renommer le fichier en env.php. En fonction du smtp utilisé il peut nécessiter quelques modifications au niveau de celui-ci. Si c'est le cas vous trouverez de nombreux tutoriels.

<?php
    define('email', 'your adress');
    define('passwordEmail', 'mail password');
    define('smtp','your smtp');
    define('port', 'the smtp port');
?>

Le blog est désormais fonctionnel, vous pouvez utiliser les accès visiteur et administrateur.
Pour que vous puissiez vous connecter à votre base de données, veuillez modifier le fichier avec vos identifiants, hôte et nom de base de données Ces informations sont trouvables chez votre hébergeur.

Voici les identifiants de deux des comptes créés:

Administrateur
Login: admin
Password: adminadmin

Utilisateur
Login: user2
Password: user2user2

Contexte
Le projet est donc de développer votre blog professionnel. Ce site web se décompose en deux grands groupes de pages :

les pages utiles à tous les visiteurs;
les pages permettant d’administrer votre blog.
Voici la liste des pages qui devront être accessibles depuis votre site web :

la page d'accueil;
la page listant l’ensemble des blog posts;
la page affichant un blog post;
la page permettant d’ajouter un blog post;
la page permettant de modifier un blog post;
les pages permettant de modifier/supprimer un blog post;
les pages de connexion/enregistrement des utilisateurs.
Vous développerez une partie administration qui devra être accessible uniquement aux utilisateurs inscrits et validés. Les pages d’administration seront donc accessibles sur conditions et vous veillerez à la sécurité de la partie administration. Commençons par les pages utiles à tous les internautes. Sur la page d’accueil, il faudra présenter les informations suivantes :

votre nom et votre prénom;

une photo et/ou un logo;

une phrase d’accroche qui vous ressemble (exemple : “Martin Durand, le développeur qu’il vous faut !”);

un menu permettant de naviguer parmi l’ensemble des pages de votre site web;

un formulaire de contact (à la soumission de ce formulaire, un e-mail avec toutes ces informations vous sera envoyé) avec les champs suivants :

nom/prénom,
e-mail de contact,
message,
un lien vers votre CV au format PDF;

et l’ensemble des liens vers les réseaux sociaux où l’on peut vous suivre (GitHub, LinkedIn, Twitter…).

Sur la page listant tous les blogs posts (du plus récent au plus ancien), il faut afficher les informations suivantes pour chaque blog post :

le titre;
la date de dernière modification;
le châpo;
et un lien vers le blog post.
Sur la page présentant le détail d’un blog post, il faut afficher les informations suivantes :

le titre;
le chapô;
le contenu;
l’auteur;
la date de dernière mise à jour;
le formulaire permettant d’ajouter un commentaire (soumis pour validation);
les listes des commentaires validés et publiés.
Sur la page permettant de modifier un blog post, l’utilisateur a la possibilité de modifier les champs titre, chapô, auteur et contenu. Dans le footer menu, il doit figurer un lien pour accéder à l’administration du blog.

Librairies utilisées:
twig
phpmailer

Auteur
Guillaume Vignères - Formation Développeur d'application PHP/Symfony - Openclassroom
