-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 26 oct. 2021 à 12:04
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogdev`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_art` int(11) NOT NULL AUTO_INCREMENT,
  `title_art` varchar(255) COLLATE utf8_bin NOT NULL,
  `chapo_art` text COLLATE utf8_bin NOT NULL,
  `content_art` text COLLATE utf8_bin NOT NULL,
  `autor_art` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_art` datetime NOT NULL,
  `dateUpdate_art` datetime NOT NULL,
  `image_art` varchar(250) COLLATE utf8_bin NOT NULL,
  `altImage_art` varchar(25) COLLATE utf8_bin NOT NULL,
  `isActive_art` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_art`),
  KEY `article_utilisateur_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_art`, `title_art`, `chapo_art`, `content_art`, `autor_art`, `date_art`, `dateUpdate_art`, `image_art`, `altImage_art`, `isActive_art`, `id_user`) VALUES
(1, 'Projet 1 - Définissez votre stratégie d\'apprentissage', 'L’objectif de ce premier projet est de vous donner toutes les clés pour réussir votre parcours, puis votre insertion professionnelle ! ', 'Vous venez de vous inscrire chez OpenClassrooms pour un parcours de formation et vous ne savez pas trop par où commencer. C’est tout à fait normal ! La pédagogie par projet est moins guidée que les méthodes de formation classiques. Cependant, elle vous permet de gagner rapidement en autonomie et d’aller à votre rythme. Cela vous donnera la possibilité d’être pleinement opérationnel dès la fin de votre formation !\r\n\r\nAlors, pour vous organiser, pourquoi ne pas démarrer par la mise en place de votre planning de formation ?\r\n\r\nPassez en revue chaque projet. Lisez rapidement les énoncés pour vous familiariser avec le vocabulaire de votre futur métier. \r\n\r\nEn fonction de votre emploi du temps personnel, du temps que vous souhaitez consacrer à la formation et de vos contraintes, déterminez quand vous allez pouvoir travailler dans la semaine et les dates prévisionnelles de soutenance de chacun de ces projets.', 'admin', '2021-06-07 15:59:26', '2021-06-10 15:59:26', 'desktop.jpg', 'Bureau avec ordinateur', 1, 1),
(2, 'Projet 2 - Intégrez un thème Wordpress pour un client', 'Bravo ! Vous venez de vous lancer en tant que développeur freelance et vous avez décroché votre premier contrat.\r\n\r\nVotre client ? L’agence immobilière “Chalets et caviar” de Courchevel. ', 'Cette agence possède une quinzaine de chalets de luxe à la vente et une vingtaine en location.\r\n\r\nCependant, elle ne possède pas encore de site web pour promouvoir la vente et la location de ses chalets. C’est pour cette raison qu’elle fait appel à vous.\r\n\r\nLors d’une première réunion, vous rencontrez Marie, la directrice de l’agence.  Voici l’échange de mails que vous recevez suite à cette réunion.\r\n\r\n \r\n\r\nDe : Marie D.\r\n\r\nÀ : Moi\r\n\r\n--------------------------------------------------------------------------------------------------------\r\n\r\nBonjour,\r\n\r\nJe suis ravie de savoir que le projet te plaise. Comme nous en avons discuté, je souhaite créer un site web pour notre agence “Chalets et caviar”. J’aimerais que mon équipe et moi puissions mettre à jour le site régulièrement, sans passer par un prestataire.\r\n\r\nAs-tu une recommandation à me faire pour que les mises à jour soient le plus simple possible ?\r\n\r\nCordialement, \r\n\r\nMarie Dubois\r\n\r\nDirectrice de l’agence Chalets et caviar\r\n\r\n--------------------------------------------------------------------------------------------------------\r\n\r\nDe : moi\r\n\r\nÀ : Marie\r\n\r\n------------------------------------------------------------------------------------------------------\r\n\r\nBonjour Marie,\r\n\r\nPour que vous puissiez mettre à jour votre site facilement, sans passer par un prestataire externe, je vous recommande un site Wordpress.\r\n\r\nPeux-tu me donner plus de détails sur le design du site que tu recherches ? Cela me permettra de te proposer le thème Wordpress le plus adapté à tes besoins.\r\n\r\nMerci.\r\n\r\n-------------------------------------------------------------------------------------------------------\r\n\r\nDe : Marie \r\n\r\nÀ : Moi\r\n\r\n-------------------------------------------------------------------------------------------------------\r\n\r\nBonjour,\r\n\r\nJe souhaite un design clair et épuré, qui montre la ligne luxe de l’agence. J’aimerais que tu me présentes la première version en ligne du site avec les éléments suivants : \r\n\r\nune section avec 5 chalets à louer ;\r\nune section avec 5 chalets à vendre ;\r\nune page de contact avec les coordonnées de l’agence et un formulaire de contact fonctionnel.\r\n \r\n\r\nPour que ce soit plus facile pour nous de collaborer sur les différentes offres, pourras-tu t’assurer de bien utiliser des catégories séparées pour que chacun retrouve ses petits ?\r\n\r\nTu trouveras en pièce jointe un dossier contenant les visuels de nos chalets ainsi qu’un document avec leurs caractéristiques.\r\n\r\n \r\n\r\nMerci, \r\n\r\nMarie Dubois\r\n\r\nDirectrice de l’agence Chalets et caviar\r\n\r\n--------------------------------------------------------------------------------------------------------\r\n\r\nDe : Moi\r\n\r\nÀ : Marie Dubois\r\n\r\n--------------------------------------------------------------------------------------------------------\r\n\r\nBonjour Marie,\r\n\r\nMerci, j’ai bien pris en note toutes les informations. Je te préparerai un document présentant le thème wordpress et montrant que cela correspond bien à tes attentes en termes de design.\r\n\r\nY a-t-il d’autres éléments que je dois prendre en compte pour la création du site ?\r\n\r\n--------------------------------------------------------------------------------------------------------\r\n\r\nDe : Marie \r\n\r\nÀ : Moi\r\n\r\n--------------------------------------------------------------------------------------------------------\r\n\r\nOui, tout d\'abord, il faut que l\'ont puisse éditer plusieurs articles en même temps pour faciliter la mise à jour du site par l’équipe (ajout, suppression et modification de chalets). De plus, pourrais-tu ajouter des droits d’administrateur selon les règles suivantes : \r\n\r\nun compte administrateur pour la directrice de l\'agence ;\r\nun compte administrateur pour le développeur (toi) s\'il n\'existe pas déjà ;\r\ndes comptes éditeurs pour les 2 autres collaborateurs de l\'agence ?\r\nPourrais-tu également me fournir un document contenant les instructions de mise à jour ? 3 à 5 pages devraient suffire. N’oublie pas qu’on ne connaît rien au développement, donc je veux bien toutes les étapes détaillées, si possible avec des captures d’écran !\r\n\r\n\r\nMerci,\r\n\r\nMarie Dubois\r\n\r\nDirectrice de l’agence Chalets et caviar', 'admin', '2021-06-11 15:59:26', '2021-06-25 15:59:26', 'chalet_art2.jpg', 'Chalet en montagne', 0, 1),
(3, 'Projet 3 - Analysez les besoins de votre client pour son festival de films', 'Jennifer Edwards est l\'organisatrice du festival des Films de Plein Air. Elle ambitionne de sélectionner et de projeter des films d\'auteur en plein air du 5 au 8 août au parc Monceau à Paris.', 'Son association vient juste d\'être créée et elle dispose d\'un budget limité. Elle a besoin de communiquer en ligne sur son festival, d\'annoncer les films projetés et de recueillir les réservations.\r\n\r\nVoici ce qu\'elle vous dit :\r\n\r\nMon association \"Les Films de Plein Air\" vient d\'obtenir l\'autorisation de projeter au parc Monceau cette année, chaque soir du 5 au 8 août, de 18 heures à minuit. Je souhaite ainsi faire découvrir des films d\'auteur au grand public.\r\n\r\nJ\'ai besoin de communiquer sur le festival en amont et j\'ai besoin pour cela d\'une présence en ligne avec un site web. Sur ce site, pour lequel il faudra définir une charte graphique, j\'ai besoin notamment de présenter le festival, la liste des films et de communiquer régulièrement sur les dernières actualités du festival.\r\n\r\nL\'accès aux projections sera gratuit et ouvert à tous mais je souhaite que le public puisse se préinscrire pour estimer le nombre de personnes présentes chaque soir.\r\n\r\nJe souhaite avoir une adresse professionnelle en .com ou en .org : je suis preneuse de conseils sur le meilleur choix pour l\'adresse et je ne souhaite pas m\'occuper de l\'hébergement.', 'admin', '2021-06-26 15:59:26', '2021-07-15 15:59:26', 'cinema_art3.jpg', 'Salle de cinéma', 1, 1),
(4, 'Projet 4 - Concevez la solution technique d\'une application de restauration en ligne, ExpressFood', 'Vous venez d\'être recruté par la toute jeune startup ExpressFood. Elle ambitionne de livrer des plats de qualité à domicile en moins de 20 minutes grâce à un réseau de livreurs à vélo.', 'Chaque jour, ExpressFood prépare 2 plats et 2 desserts à son QG en collaboration avec des chefs expérimentés. Ces plats sont conditionnés à froid puis transmis à des livreurs à domicile qui &quot;maraudent&quot; ensuite dans les rues en attendant une livraison. Dès qu\'un client a commandé, l\'un des livreurs (qui possède déjà les plats dans un sac) est missionné pour livrer en moins de 20 minutes.\r\n\r\nSur son application, ExpressFood propose à ses clients de commander un ou plusieurs plats et desserts. Les frais de livraison sont gratuits. Les plats changent chaque jour.\r\n\r\nUne fois la commande passée, le client a accès à une page lui indiquant si un livreur a pris sa commande et le temps estimé avant livraison.\r\n\r\nExpressFood a besoin que vous conceviez sa base de données. Il s\'agit de stocker notamment :\r\n\r\nLa liste des clients\r\nLa liste des différents plats du jour\r\nLa liste des livreurs, avec leur statut (libre, en cours de livraison) et leur position\r\nLa liste des commandes passées\r\n...\r\nPour structurer votre réflexion, vous utiliserez UML et construirez une suite de diagrammes afin de modéliser les besoins de l’application et le diagramme de classe pour modéliser les entités de l\'application. Une fois que les diagrammes vous satisferont, vous réaliserez le schéma de base de données MySQL correspondant, puis vous remplirez la base avec des premières valeurs fictives.\r\n\r\nVous veillerez à produire des schémas UML cohérents par rapport au cahier des charges et respectant les standards UML. Vous concevrez ensuite un schéma de base de données SQL adéquat.', 'admin', '2021-07-16 15:59:26', '2021-10-25 14:00:28', 'expressFood_art4.jpg', 'Livreur en moto', 1, 1),
(5, 'Projet 5 - Créez votre premier blog en PHP', 'Ça y est, vous avez sauté le pas ! Le monde du développement web avec PHP est à portée de main et vous avez besoin de visibilité pour pouvoir convaincre vos futurs employeurs/clients en un seul regard. Vous êtes développeur PHP, il est donc temps de montrer vos talents au travers d’un blog à vos couleurs.', 'Le projet est donc de développer votre blog professionnel. Ce site web se décompose en deux grands groupes de pages :\r\n\r\nles pages utiles à tous les visiteurs ;\r\nles pages permettant d’administrer votre blog.\r\nVoici la liste des pages qui devront être accessibles depuis votre site web :\r\n\r\nla page d\'accueil ;\r\nla page listant l’ensemble des blog posts ;\r\nla page affichant un blog post ;\r\nla page permettant d’ajouter un blog post ;\r\nla page permettant de modifier un blog post ;\r\nles pages permettant de modifier/supprimer un blog post ;\r\nles pages de connexion/enregistrement des utilisateurs.\r\nVous développerez une partie administration qui devra être accessible uniquement aux utilisateurs inscrits et validés.\r\n\r\nLes pages d’administration seront donc accessibles sur conditions et vous veillerez à la sécurité de la partie administration.\r\n\r\nCommençons par les pages utiles à tous les internautes.\r\n\r\nSur la page d’accueil, il faudra présenter les informations suivantes :\r\n\r\nvotre nom et votre prénom ;\r\nune photo et/ou un logo ;\r\nune phrase d’accroche qui vous ressemble (exemple : “Martin Durand, le développeur qu’il vous faut !”) ;\r\nun menu permettant de naviguer parmi l’ensemble des pages de votre site web ;\r\nun formulaire de contact (à la soumission de ce formulaire, un e-mail avec toutes ces informations vous sera envoyé) avec les champs suivants :\r\nnom/prénom,\r\ne-mail de contact,\r\nmessage,\r\nun lien vers votre CV au format PDF ;\r\net l’ensemble des liens vers les réseaux sociaux où l’on peut vous suivre (GitHub, LinkedIn, Twitter…).\r\nSur la page listant tous les blogs posts (du plus récent au plus ancien), il faut afficher les informations suivantes pour chaque blog post :\r\n\r\nle titre ;\r\nla date de dernière modification ;\r\nle châpo ;\r\net un lien vers le blog post.\r\nSur la page présentant le détail d’un blog post, il faut afficher les informations suivantes :\r\n\r\nle titre ;\r\nle chapô ;\r\nle contenu ;\r\nl’auteur ;\r\nla date de dernière mise à jour ;\r\nle formulaire permettant d’ajouter un commentaire (soumis pour validation) ;\r\nles listes des commentaires validés et publiés.\r\nSur la page permettant de modifier un blog post, l’utilisateur a la possibilité de modifier les champs titre, chapô, auteur et contenu.\r\n\r\nDans le footer menu, il doit figurer un lien pour accéder à l’administration du blog.', 'admin', '2021-08-06 15:59:26', '2021-08-06 15:59:26', 'blog_art5.jpg', 'Ecran ordinateur blog', 1, 1),
(6, 'Projet 6 - Développez de A à Z le site communautaire SnowTricks', 'Jimmy Sweat est un entrepreneur ambitieux passionné de snowboard. Son objectif est la création d\'un site collaboratif pour faire connaître ce sport auprès du grand public et aider à l\'apprentissage des figures (tricks).', 'Il souhaite capitaliser sur du contenu apporté par les internautes afin de développer un contenu riche et suscitant l’intérêt des utilisateurs du site. Par la suite, Jimmy souhaite développer un business de mise en relation avec les marques de snowboard grâce au trafic que le contenu aura généré.\r\n\r\nPour ce projet, nous allons nous concentrer sur la création technique du site pour Jimmy.\r\n\r\nVotre mission : créer un site communautaire pour apprendre les figures de snowboard\r\nVotre mission : créer un site communautaire pour apprendre les figures de snowboard\r\nDescription du besoin\r\nVous êtes chargé de développer le site répondant aux besoins de Jimmy. Vous devez ainsi implémenter les fonctionnalités suivantes : \r\n\r\nun annuaire des figures de snowboard. Vous pouvez vous inspirer de la liste des figures sur Wikipédia. Contentez-vous d\'intégrer 10 figures, le reste sera saisi par les internautes ;\r\nla gestion des figures (création, modification, consultation) ;\r\nun espace de discussion commun à toutes les figures.\r\nPour implémenter ces fonctionnalités, vous devez créer les pages suivantes :\r\n\r\nla page d’accueil où figurera la liste des figures ; \r\nla page de création d\'une nouvelle figure ;\r\nla page de modification d\'une figure ;\r\nla page de présentation d’une figure (contenant l’espace de discussion commun autour d’une figure).', 'admin', '2021-10-14 15:37:14', '2021-10-26 11:03:38', 'snow_art6.jpg', 'snowboarder', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `content_com` varchar(5000) COLLATE utf8_bin NOT NULL,
  `autor_com` varchar(100) COLLATE utf8_bin NOT NULL,
  `date_com` datetime NOT NULL,
  `dateUpdate_com` datetime NOT NULL,
  `statut_com` tinyint(1) DEFAULT NULL,
  `isDeleted_com` tinyint(1) NOT NULL,
  `id_art` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `commentaire_article_FK` (`id_art`),
  KEY `commentaire_utilisateur0_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_com`, `content_com`, `autor_com`, `date_com`, `dateUpdate_com`, `statut_com`, `isDeleted_com`, `id_art`, `id_user`) VALUES
(1, 'Article 3 - Comment 1', 'user1', '2021-07-05 15:38:10', '2021-07-05 15:38:10', 0, 0, 3, 2),
(2, 'Article 3 - Comment 10', 'admin', '2021-09-29 15:38:10', '2021-10-25 14:31:13', 1, 0, 3, 1),
(3, 'Article 3 - Comment 3', 'user3', '2021-09-01 15:38:10', '2021-09-01 15:38:10', 1, 0, 3, 4),
(4, 'Article 3 - Comment 4', 'admin', '2021-10-03 15:38:10', '2021-10-03 15:38:10', 1, 0, 3, 1),
(5, 'Article 3 - Comment 4', 'user1', '2021-10-05 15:38:10', '2021-10-19 09:48:54', 0, 0, 3, 2),
(6, 'Article 3 - Comment 6', 'user3', '2021-10-06 15:38:10', '2021-10-06 15:38:10', NULL, 0, 3, 4),
(7, 'Article 3 - Comment 7', 'admin', '2021-10-09 15:38:10', '2021-10-21 13:56:41', 1, 0, 3, 1),
(8, 'Article 3 - Comment 8', 'user3', '2021-10-13 15:38:10', '2021-10-13 15:38:10', 1, 0, 3, 4),
(9, 'Article 5 - Comment 3', 'user4', '2021-09-01 15:38:10', '2021-10-25 15:37:54', NULL, 0, 5, 5),
(10, 'Article 5 - Comment 2', 'admin2', '2021-09-15 15:38:10', '2021-09-15 15:38:10', 1, 1, 5, 7),
(11, 'Article 1 - Comment 1', 'admin', '2021-10-25 11:25:37', '2021-10-25 11:25:47', 1, 0, 1, 1),
(12, 'Article 5 - Comment 2', 'admin', '2021-10-25 11:26:05', '2021-10-25 15:46:49', 1, 0, 5, 1),
(13, 'Article 1 - Comment 2', 'user2', '2021-10-25 11:26:40', '2021-10-25 14:24:54', NULL, 0, 5, 3),
(14, 'Article 4 - Comment 1', 'admin', '2021-10-25 11:27:15', '2021-10-25 11:27:15', NULL, 0, 4, 1),
(15, 'Article 4 - Comment 1', 'admin', '2021-10-25 15:02:39', '2021-10-26 09:11:04', 1, 0, 4, 1),
(16, 'Article 1 - Comment 2', 'admin2', '2021-10-25 15:03:23', '2021-10-25 15:03:23', 1, 0, 1, 7),
(17, 'Article 5 - Comment 1', 'admin', '2021-10-25 15:22:53', '2021-10-25 15:47:03', 1, 0, 5, 1),
(18, 'Article 1 - Comment 3', 'admin', '2021-10-25 15:48:34', '2021-10-25 15:48:34', 1, 0, 1, 1),
(19, 'Article 3 - Comment 11', 'admin', '2021-10-26 08:55:05', '2021-10-26 08:55:05', 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `lastname_user` varchar(20) COLLATE utf8_bin NOT NULL,
  `firstname_user` varchar(20) COLLATE utf8_bin NOT NULL,
  `email_user` varchar(50) COLLATE utf8_bin NOT NULL,
  `login_user` varchar(25) COLLATE utf8_bin NOT NULL,
  `password_user` varchar(500) COLLATE utf8_bin NOT NULL,
  `role_user` tinyint(1) NOT NULL,
  `dateCreate_user` datetime NOT NULL,
  `dateUpdate_user` datetime NOT NULL,
  `isActiveUser_user` tinyint(1) NOT NULL,
  `isActiveAdmin_user` tinyint(1) NOT NULL,
  `tokenNewPass_user` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `dateNewPass_user` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `lastname_user`, `firstname_user`, `email_user`, `login_user`, `password_user`, `role_user`, `dateCreate_user`, `dateUpdate_user`, `isActiveUser_user`, `isActiveAdmin_user`, `tokenNewPass_user`, `dateNewPass_user`) VALUES
(1, 'VIGNERES', 'Guillaume', 'g.vigneres65@orange.fr', 'admin', '$2y$10$XPoeC0uCqtxVmNRS1JXk3edl/iovuDM1/k5jHFuaBMTGMNJhqixSe', 1, '2021-10-04 13:29:36', '2021-10-22 15:12:57', 1, 1, NULL, '2021-10-13 12:39:44'),
(2, 'DUPONT', 'Pierre', 'user1@gmail.fr', 'user1', '$2y$10$4VuJ4yoNZROGy175fymKEO3ror4mOXqxk/g0SuLOHBOkrherzUFyi', 0, '2021-10-04 13:30:09', '2021-10-04 13:30:09', 1, 1, NULL, NULL),
(3, 'BUBULLE', 'Claire', 'guillaume.vigneres@greta-cfa-aquitaine.academy', 'user2', '$2y$10$dyNf0b.MU3NOI6CmkSxZFOypp9ZRQMwi/81rzhfHyW7xisnczSQhq', 0, '2021-10-08 15:22:26', '2021-10-21 10:11:38', 1, 1, NULL, NULL),
(4, 'VAILLANT', 'Marie', 'marie@sss.fr', 'user3', '$2y$10$blAmggE8p2rNd.PIH7hAt.KaT/xyMRy4tAbXLIx9xRJs2NA.A13rC', 0, '2021-10-12 16:11:01', '2021-10-12 16:11:01', 0, 1, NULL, NULL),
(5, 'DOUDOU', 'Paul', 'user4@gmail.fr', 'user4', '$2y$10$iMOeehYidwb8fZBv0lgLJO7n0c/eKlzU9YWrp8QXr2LA9nWPwpep2', 0, '2021-10-14 00:39:30', '2021-10-14 00:39:30', 1, 0, NULL, NULL),
(6, 'TARTEMPION', 'Marcel', 'user5@orange.fr', 'user5', '$2y$10$Xy7bMtBApvAgxlNpFxwTE.e.2qil7cVDDuXuJU7alfVqUhOxrFkGu', 0, '2021-10-14 00:43:28', '2021-10-14 00:43:28', 1, 1, NULL, NULL),
(7, 'BALOU', 'Lucie', 'admin2@gmail.fr', 'admin2', '$2y$10$Ru1..bFadLc1v1sdYcEAW.s0/KvOM7KNHpTOglERNIEhVIEKa3fcC', 1, '2021-10-14 01:17:39', '2021-10-14 01:17:39', 1, 1, NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `article_utilisateur_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `commentaire_article_FK` FOREIGN KEY (`id_art`) REFERENCES `articles` (`id_art`),
  ADD CONSTRAINT `commentaire_utilisateur0_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
