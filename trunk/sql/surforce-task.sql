/*
MySQL Data Transfer
Source Host: localhost
Source Database: surforce-task
Target Host: localhost
Target Database: surforce-task
Date: 18/06/2008 12:31:16 a.m.
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for tareas_departamentos
-- ----------------------------
CREATE TABLE `tareas_departamentos` (
  `id_departamento` tinyint(4) NOT NULL auto_increment,
  `nombre` varchar(150) collate latin1_general_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id_departamento`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for tareas_estados_tareas
-- ----------------------------
CREATE TABLE `tareas_estados_tareas` (
  `id_estado_tarea` tinyint(4) NOT NULL auto_increment,
  `nombre` varchar(150) collate latin1_general_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id_estado_tarea`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for tareas_roles
-- ----------------------------
CREATE TABLE `tareas_roles` (
  `id_rol` tinyint(4) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id_rol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tareas_tareas
-- ----------------------------
CREATE TABLE `tareas_tareas` (
  `id_tarea` mediumint(9) NOT NULL auto_increment,
  `nombre` varchar(150) collate latin1_general_ci NOT NULL,
  `descripcion` char(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_tarea`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for tareas_tareas_departamentos
-- ----------------------------
CREATE TABLE `tareas_tareas_departamentos` (
  `id_tarea` mediumint(9) NOT NULL,
  `id_departamento_origen` tinyint(4) NOT NULL,
  `id_departamento_destino` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id_tarea`,`id_departamento_origen`,`id_departamento_destino`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for tareas_tareas_estados
-- ----------------------------
CREATE TABLE `tareas_tareas_estados` (
  `id_tarea` mediumint(9) NOT NULL,
  `id_estado_tarea` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id_tarea`,`id_estado_tarea`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tareas_tareas_usuarios
-- ----------------------------
CREATE TABLE `tareas_tareas_usuarios` (
  `id_tarea` mediumint(9) NOT NULL,
  `id_usuario` mediumint(9) NOT NULL,
  PRIMARY KEY  (`id_tarea`,`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for tareas_usuarios
-- ----------------------------
CREATE TABLE `tareas_usuarios` (
  `id_usuario` mediumint(9) NOT NULL auto_increment,
  `nombre` varchar(150) collate latin1_general_ci NOT NULL,
  `apellido` varchar(150) collate latin1_general_ci NOT NULL,
  `email` varchar(150) collate latin1_general_ci NOT NULL,
  `password` varchar(150) collate latin1_general_ci NOT NULL,
  `role` varchar(255) collate latin1_general_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for tareas_usuarios_departamentos
-- ----------------------------
CREATE TABLE `tareas_usuarios_departamentos` (
  `id_usuario` mediumint(9) NOT NULL,
  `id_departamento` tinyint(4) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id_usuario`,`id_departamento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for tareas_usuarios_roles
-- ----------------------------
CREATE TABLE `tareas_usuarios_roles` (
  `id_usuario` mediumint(9) NOT NULL,
  `id_rol` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id_usuario`,`id_rol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- View structure for tareas_listado
-- ----------------------------
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tareas_listado` AS select `tt`.`id_tarea` AS `tarea_id`,`tt`.`nombre` AS `tarea_nombre`,`tt`.`descripcion` AS `tarea_descripcion`,`ttd`.`id_departamento_origen` AS `id_departamento_origen`,(select `td`.`nombre` AS `nombre` from `tareas_departamentos` `td` where (`td`.`id_departamento` = `ttd`.`id_departamento_origen`)) AS `departamento_origen`,`ttd`.`id_departamento_origen` AS `id_departamento_destino`,(select `td`.`nombre` AS `nombre` from `tareas_departamentos` `td` where (`td`.`id_departamento` = `ttd`.`id_departamento_destino`)) AS `departamento_destino`,`tet`.`id_estado_tarea` AS `id_tarea_estado`,`tet`.`nombre` AS `tarea_estado` from (((`tareas_tareas` `tt` join `tareas_tareas_departamentos` `ttd` on((`tt`.`id_tarea` = `ttd`.`id_tarea`))) join `tareas_tareas_estados` `tte` on((`tte`.`id_tarea` = `tt`.`id_tarea`))) join `tareas_estados_tareas` `tet` on((`tet`.`id_estado_tarea` = `tte`.`id_estado_tarea`)));

-- ----------------------------
-- Records
-- ----------------------------
INSERT INTO `tareas_departamentos` VALUES ('1', 'Sistemas', '1');
INSERT INTO `tareas_departamentos` VALUES ('2', 'Contenidos', '1');
INSERT INTO `tareas_departamentos` VALUES ('3', 'Marketing', '1');
INSERT INTO `tareas_departamentos` VALUES ('4', 'AdministraciÃ³n', '1');
INSERT INTO `tareas_estados_tareas` VALUES ('1', 'Sin asignar', '1');
INSERT INTO `tareas_estados_tareas` VALUES ('2', 'Asignada', '1');
INSERT INTO `tareas_estados_tareas` VALUES ('3', 'Terminada', '1');
INSERT INTO `tareas_tareas` VALUES ('1', 'Hacer admin tareas', 'Crear el administrador de tareas.');
INSERT INTO `tareas_tareas_departamentos` VALUES ('1', '1', '2');
INSERT INTO `tareas_tareas_estados` VALUES ('1', '2');
INSERT INTO `tareas_tareas_usuarios` VALUES ('1', '1');
INSERT INTO `tareas_usuarios` VALUES ('1', 'Pedro', 'Gomez', 'admin', 'admin', 'admin', '1');
INSERT INTO `tareas_usuarios` VALUES ('2', 'Federico', 'Autuori', 'member', 'member', 'member', '1');
INSERT INTO `tareas_usuarios_departamentos` VALUES ('1', '4', '1');