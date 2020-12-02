# Host: localhost  (Version 5.5.5-10.4.14-MariaDB)
# Date: 2020-12-02 06:50:27
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "destinatario"
#

CREATE TABLE `destinatario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "destinatario"
#

INSERT INTO `destinatario` VALUES (3,'Walter','41995690245'),(10,'Helena.','41888899999'),(11,'Maria','41555566666'),(12,'Mirely','31777744444');

#
# Structure for table "rastreio"
#

CREATE TABLE `rastreio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(13) NOT NULL DEFAULT '',
  `data_consulta` datetime DEFAULT NULL,
  `localizacao` varchar(255) NOT NULL DEFAULT '' COMMENT 'Ativo - Entregue',
  `id_destinatario` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_id_destinatario` (`id_destinatario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "rastreio"
#

INSERT INTO `rastreio` VALUES (8,'SL947132131BR',NULL,'',12),(9,'PM477093265BR',NULL,'',3),(10,'OL206773114BR',NULL,'',10),(11,'OL323055694BR',NULL,'',11);
