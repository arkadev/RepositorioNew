
CREATE DATABASE IF NOT EXISTS `torneo`;
USE `torneo`;

CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(45) NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tournament` (
  `id_tournament` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(45) NOT NULL,
  `name` varchar(21) NOT NULL,
  `description` varchar(45) NOT NULL,
  `image_url` varchar(45) NOT NULL,
  `color` varchar(8) NOT NULL,
  PRIMARY KEY (`id_tournament`,`user_email`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `fk_tournament_user1_idx` (`user_email`),
  CONSTRAINT `fk_tournament_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `team` (
  `id_team` int(11) NOT NULL AUTO_INCREMENT,
  `id_tournament` int(11) NOT NULL,
  `name` varchar(25) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_team`,`id_tournament`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `fk_team_tournament1_idx` (`id_tournament`),
  CONSTRAINT `fk_team_tournament1` FOREIGN KEY (`id_tournament`) REFERENCES `tournament` (`id_tournament`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE IF NOT EXISTS `phase` (
  `id_phase` int(11) NOT NULL AUTO_INCREMENT,
  `id_tournament` int(11) NOT NULL,
  `name` varchar(21) NOT NULL,
  PRIMARY KEY (`id_phase`,`id_tournament`),
  KEY `fk_phase_tournament2_idx` (`id_tournament`),
  CONSTRAINT `fk_phase_tournament2` FOREIGN KEY (`id_tournament`) REFERENCES `tournament` (`id_tournament`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `match` (
  `id_match` int(11) NOT NULL,
  `id_tournament` int(11) NOT NULL,
  `id_phase` int(11) NOT NULL,
  `team_id_a` int(11) NOT NULL,
  `score_a` int(2) NOT NULL,
  `team_id_b` int(11) NOT NULL,
  `score_b` int(2) NOT NULL,
  PRIMARY KEY (`id_match`,`id_tournament`,`id_phase`,`team_id_a`,`team_id_b`),
  KEY `fk_phase_tournament_idx` (`id_tournament`),
  KEY `fk_match_team_b_idx` (`team_id_b`),
  KEY `fk_match_team_a_idx` (`team_id_a`),
  KEY `fk_match_phase_idx` (`id_phase`),
  CONSTRAINT `fk_match_phase1` FOREIGN KEY (`id_phase`) REFERENCES `phase` (`id_phase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_match_team2` FOREIGN KEY (`team_id_a`) REFERENCES `team` (`id_team`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_match_team_b` FOREIGN KEY (`team_id_b`) REFERENCES `team` (`id_team`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_phase_tournament1` FOREIGN KEY (`id_tournament`) REFERENCES `tournament` (`id_tournament`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;