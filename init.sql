SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `panier`;
CREATE TABLE `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `proprietaire` int(11) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `panier` ( `id`, `nom`, `proprietaire`) VALUES
(	1,	'Panier de course', 1),
(	2,	'Panier pour ordinateur', 1),
(	3,	'Panier de vétement', 1),
(	4,	'Panier de vegan', 1);

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panier` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prix` decimal(7,2) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `article` ( `id`, `panier`,`nom`, `prix`, `adresse`, `notes`) VALUES
(	1,	2, 'nvidia geforce gtx 1050', 200, '1 rue des roses, Lyon', 'une note'),
(	2,	1, 'steak haché pur bœuf 15% MG', 7.55, '2 rue du ciel, Paris', 'une autre note'),
(	3,	3, 'tee shirt blanc en coton', 14.99, '1 rue saint Rédempteur, Bordeau', 'une mauvaise note'),
(	4,	2, 'intel core i5', 299.99, '5 rue de Paris, Nante', 'la bonne note'),
(	5,	4, 'Salade', 1.99, '5 rue de Paris, Nante', 'la bonne note');


DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` text,

  PRIMARY KEY (`utilisateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `utilisateur` (`prenom`, `mail`) VALUES
('colin','colin@gmail.com'),
('salome','salome@gmail.com'),
('mateo','mateo@gmail.com'),
('antonin','antonin@gmail.com');
