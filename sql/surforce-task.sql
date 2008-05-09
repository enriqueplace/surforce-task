/*
MySQL Data Transfer
Source Host: localhost
Source Database: surforce-task
Target Host: localhost
Target Database: surforce-task
Date: 09/05/2008 17:49:43
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
-- Table structure for tareas_tareas
-- ----------------------------
CREATE TABLE `tareas_tareas` (
  `id_tarea` mediumint(9) NOT NULL auto_increment,
  `id_estado_tarea` tinyint(4) NOT NULL,
  `nombre` varchar(150) collate latin1_general_ci NOT NULL,
  `descripcion` char(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_tarea`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
-- Records
-- ----------------------------
INSERT INTO `tareas_departamentos` VALUES ('1', 'Sistemas', '1');
INSERT INTO `tareas_departamentos` VALUES ('2', 'Contenidos', '1');
INSERT INTO `tareas_departamentos` VALUES ('3', 'Marketing', '1');
INSERT INTO `tareas_departamentos` VALUES ('4', 'Administración', '1');
INSERT INTO `tareas_estados_tareas` VALUES ('1', 'Sin asignar', '1');
INSERT INTO `tareas_estados_tareas` VALUES ('2', 'Asignada', '1');
INSERT INTO `tareas_estados_tareas` VALUES ('3', 'Terminada', '1');
INSERT INTO `tareas_tareas` VALUES ('1', '2', 'Hacer admin tareas', 'Crear el administrador de tareas.');
INSERT INTO `tareas_tareas_usuarios` VALUES ('1', '1');
INSERT INTO `tareas_usuarios` VALUES ('1', 'Pedro', 'Gomez', 'pedrog@moviclips.com', '', '1');
INSERT INTO `tareas_usuarios_departamentos` VALUES ('1', '4', '1');
