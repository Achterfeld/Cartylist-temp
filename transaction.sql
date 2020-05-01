DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emetteur` text NOT NULL,
  `montant` decimal(7,2) DEFAULT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `transaction` ( `id`, `emetteur`, `montant`) VALUES
(	1,	'Theo', 10.75),
(	2,	'Martin', 5.36),
(	3,	'Tom', 14),
(	4,	'Mateo', 5.54),
(	5,	'Mateo', 42.23),
(	6,	'Nicolas', 1.99);