SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `panier`;
CREATE TABLE `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `panier` ( `id`, `nom`) VALUES
(	1,	'Panier de course'),
(	2,	'Panier pour ordinateur'),
(	3,	'Panier de vétement');

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `panier` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prix` decimal(7,2) DEFAULT NULL,
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `article` ( `id`, `panier`,`nom`, `prix`) VALUES
(	1,	2, 'nvidia geforce gtx 1050', 200),
(	2,	1, 'steak haché pur bœuf 15% MG', 7.55),
(	3,	3, 'tee shirt blanc en coton', 14.99),
(	4,	2, 'intel core i5', 299.99);