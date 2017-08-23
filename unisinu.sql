-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2017 a las 02:41:25
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unisinu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categorias` int(11) NOT NULL,
  `nombre_categoria` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `nombre_categoria`, `fecha`) VALUES
(1, 'SELECCIONE CATEGORIA', '2017-06-16'),
(2, 'INFORMACION PERSONAL', '2017-06-15'),
(3, 'INFORMACION FAMILIAR', '2017-06-15'),
(4, 'INFORMACION ACADÉMICA', '2017-06-16'),
(5, 'INTERESES PERSONALES', '2017-06-16'),
(6, 'INFORMACION ECONOMICA', '2017-06-16'),
(7, 'ASPECTOS PSICO SOCIO-AFECTIVOS', '2017-06-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id_encuesta` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha_apertura` date NOT NULL,
  `fecha_cierre` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id_encuesta`, `nombre`, `estado`, `fecha_apertura`, `fecha_cierre`) VALUES
(1, 'Encuesta 2017-1', 'ABIERTA', '2017-08-22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id_opcion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `opcion` varchar(45) NOT NULL,
  `id_tipo_opciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id_opcion`, `id_pregunta`, `opcion`, `id_tipo_opciones`) VALUES
(1, 94, '=>', 1),
(3, 95, '=>', 2),
(4, 96, 'Masculino', 4),
(5, 96, 'Femenino', 4),
(6, 97, '=>', 5),
(7, 98, 'Pais de nacimiento', 1),
(8, 98, 'Departamento de nacimiento', 1),
(9, 98, 'Municipio de nacimiento', 1),
(10, 99, 'TP', 6),
(11, 99, 'Numero de identificacion', 2),
(12, 101, 'Propia', 4),
(13, 101, 'Familiar', 4),
(14, 101, 'Arrendada', 4),
(15, 102, '1', 4),
(16, 102, '2', 4),
(17, 102, '3', 4),
(18, 102, '4', 4),
(19, 102, '5', 4),
(20, 102, '6', 4),
(21, 102, 'no estratificado', 4),
(32, 103, 'mis padres', 4),
(33, 103, 'En casa de un familiar', 4),
(34, 103, 'Pensionado', 4),
(35, 103, 'Amigos', 4),
(36, 103, 'Mi pareja', 4),
(37, 103, 'Solo', 4),
(38, 104, '=>', 1),
(39, 105, '1', 4),
(40, 105, '2', 4),
(41, 105, '3', 4),
(42, 105, '4', 4),
(43, 105, '5', 4),
(44, 105, '6', 4),
(45, 105, 'No estratificado', 4),
(46, 106, '=>', 2),
(47, 107, '=>', 2),
(48, 108, '=>', 1),
(49, 109, 'PROG', 6),
(50, 109, 'Semestre', 2),
(51, 109, 'Grupo', 2),
(52, 109, 'ID(Codigo)', 2),
(53, 110, 'Diurna', 4),
(54, 110, 'Nocturna', 4),
(55, 111, 'Soltero', 4),
(56, 111, 'Casado', 4),
(57, 111, 'Separado', 4),
(58, 111, 'Viudo', 4),
(59, 111, 'Union libre', 4),
(60, 112, 'Si', 4),
(61, 112, 'No', 4),
(62, 112, 'Cuantos', 2),
(63, 112, 'Edades', 1),
(64, 113, 'REL', 6),
(65, 114, 'Si', 4),
(66, 114, 'No', 4),
(67, 114, 'Cual', 1),
(68, 115, 'Si', 4),
(69, 115, 'No', 4),
(70, 115, 'Cual', 1),
(71, 116, 'Si', 4),
(72, 116, 'No', 4),
(73, 117, 'Indígenas', 4),
(74, 117, 'Afro descendientes', 4),
(75, 117, 'Raizales', 4),
(76, 117, 'Gitanos', 4),
(77, 117, 'Otra', 4),
(78, 117, 'Cual', 1),
(79, 118, 'Si', 4),
(80, 118, 'No', 4),
(81, 118, 'Fisica', 4),
(82, 118, 'Cognitiva', 4),
(83, 118, 'Auditiva', 4),
(84, 118, 'Visual', 4),
(85, 118, 'Otra', 4),
(86, 118, 'Cual', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pregunta` varchar(200) NOT NULL,
  `graficar` varchar(2) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `id_categoria`, `id_usuario`, `pregunta`, `graficar`, `fecha`) VALUES
(94, 2, 1, 'NOMBRE Y APELLIDO', 'no', '2017-08-22'),
(95, 2, 1, 'EDAD', 'no', '2017-08-22'),
(96, 2, 1, 'SEXO', 'no', '2017-08-22'),
(97, 2, 1, 'FECHA DE NACIMIENTO', 'no', '2017-08-22'),
(98, 2, 1, 'LUGAR DE NACIMIENTO', 'no', '2017-08-22'),
(99, 2, 1, 'TIPO DOCUMENTO', 'no', '2017-08-22'),
(100, 2, 1, 'LUGAR DE PROCEDENCIA', 'no', '2017-08-22'),
(101, 2, 1, 'TIPO DE VIVIENDA', 'no', '2017-08-22'),
(102, 2, 1, 'ESTRATO SOCIOECONOMICO FAMILIAR', 'no', '2017-08-22'),
(103, 2, 1, 'ACTUALMENTE VIVO CON ', 'no', '2017-08-22'),
(104, 2, 1, 'DIRECCION EN CARTAGENA', 'no', '2017-08-22'),
(105, 2, 1, 'ESTRATO SOCIO-ECONOMICO', 'no', '2017-08-22'),
(106, 2, 1, 'TELEFONO EN CARTAGENA', 'no', '2017-08-22'),
(107, 2, 1, 'CELULAR', 'no', '2017-08-22'),
(108, 2, 1, 'CORREO ELECTRONICO', 'no', '2017-08-22'),
(109, 2, 1, 'MATRICULADO EN EL PROGRAMA DE:', 'no', '2017-08-22'),
(110, 2, 1, 'JORNADA ACADEMICA', 'no', '2017-08-22'),
(111, 2, 1, 'ESTADO CIVIL', 'no', '2017-08-22'),
(112, 2, 1, 'TIENES HIJOS', 'no', '2017-08-22'),
(113, 2, 1, 'RELIGION', 'no', '2017-08-22'),
(114, 2, 1, 'PERTENECE A UN PARTIDO POLITICO', 'no', '2017-08-22'),
(115, 2, 1, 'PERTENECE USTED A MINORíAS O COMUNIDADES VULNERABLES', 'no', '2017-08-22'),
(116, 2, 1, 'ES UD VICTIMA DEL CONFLICTO ARMADO', 'no', '2017-08-22'),
(117, 2, 1, 'PERTENECE ALGUNA DE LAS ETNIAS', 'no', '2017-08-22'),
(118, 2, 1, 'TIENE ALGUN TIPO DE DISCAPACIDAD', 'no', '2017-08-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_gene`
--

CREATE TABLE `respuestas_gene` (
  `id_respuesta_gene` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  `id_opcion` int(11) NOT NULL,
  `cual` varchar(30) DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_prof`
--

CREATE TABLE `respuesta_prof` (
  `id_respuesta_prof` int(11) NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_ociones`
--

CREATE TABLE `sub_ociones` (
  `id_sub_ociones` int(11) NOT NULL,
  `id_opcion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `sub_ocionescol` varchar(45) NOT NULL,
  `id_tipo_opciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_opciones`
--

CREATE TABLE `tipo_opciones` (
  `id_tipo_opciones` int(11) NOT NULL,
  `nombre_tipo_opciones` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_opciones`
--

INSERT INTO `tipo_opciones` (`id_tipo_opciones`, `nombre_tipo_opciones`) VALUES
(1, 'texto'),
(2, 'numerico'),
(3, 'checkbox'),
(4, 'radiobutton'),
(5, 'fecha'),
(6, 'combobox');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre_tipousuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre_tipousuario`) VALUES
(1, 'Administrador'),
(2, 'Humano'),
(3, 'Deporte'),
(4, 'Cultura'),
(5, 'Institucional'),
(6, 'Salud'),
(7, 'Estudiante'),
(8, 'Auxiliar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `id_tipousuario` int(11) NOT NULL,
  `identificacion` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `id_tipousuario`, `identificacion`, `name`, `correo`, `user`, `pass`, `fecha`, `estado`) VALUES
(1, 1, 73097541, 'Arnaldo Castilla', 'arnaldo.castilla@hotmail.com', 'acastilla', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-06-10', 'activo'),
(2, 7, 73212510, 'Ruben polo', 'rubenp@gmail.com', 'rubenp', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-06-10', 'activo'),
(3, 7, 116661, 'demo', NULL, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '2017-06-10', 'activo'),
(4, 7, 11666122, 'demo', 'rubenp1@gmail.com', 'demo1', '4eae18cf9e54a0f62b44176d074cbe2f', '2017-06-10', 'activo'),
(5, 2, 1047450826, 'Angelica Del Carmen', 'angelicadelcarmen26@hotmail.com', 'amartinez', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-06-10', 'activo'),
(6, 5, 45458502, 'Judith Maria', 'judithma.florez@gmail.com', 'judithm', '4eae18cf9e54a0f62b44176d074cbe2f', '2017-06-10', 'activo'),
(7, 7, 73097536, 'Arnaldo ', 'arnaldocast2008@hotmail.com', 'arnaldol', '4eae18cf9e54a0f62b44176d074cbe2f', '2017-06-10', 'activo'),
(8, 7, 9263461, 'arnaldo', 'arnaldo1@gmail.com', 'elpete', '6af93fa45cfc39e697ee658d2dc8c25f', '2017-06-10', 'activo'),
(9, 6, 8163564, 'CArolina', NULL, 'carolina', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-06-10', 'activo'),
(10, 7, 78615625, 'demo', NULL, 'demo1@hotmail.com', '59456491ce0596957efc6b5db82bee4d', '2017-06-10', 'activo'),
(11, 7, 90762615, 'hotmail', 'hotmail@hotmail.com', 'hot', '1f2b745dcea2cf29a310d105cad6dee7', '2017-06-10', 'activo'),
(12, 7, 112313434, 'adasd', NULL, 'asdas', 'a8f5f167f44f4964e6c998dee827110c', '2017-06-10', 'activo'),
(13, 7, 73212010, 'Juan Gomez', NULL, 'jgomez', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-06-16', 'activo'),
(14, 2, 73546123, 'Humano', 'humanoo@unisinu.edu.co', 'humano', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-06-16', 'activo'),
(15, 3, 74120123, 'Deportes', 'deporte@unisinu.edu.co', 'deporte', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-06-16', 'activo'),
(16, 4, 1047450814, 'Cultura', 'cultura@unisinu.edu.co', 'cultura', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-06-16', 'activo'),
(17, 5, 2147483647, 'Institucional', 'institucional@unisinu.edu.co', 'institucional', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-06-16', 'activo'),
(18, 6, 12937470, 'Salud', 'salud@unisinu.edu.co', 'salud', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-06-16', 'activo'),
(19, 8, 862543, 'Coordinador Auxiliar', 'auxiliar@unisinu.edu.co', 'auxiliar', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-06-18', 'activo'),
(20, 7, 12345678, 'Soy un estudiante de unisinu', NULL, 'estudiante', '34f85ca80ec353d3052b8a2d3973a0c5', '2017-08-22', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_resp`
--

CREATE TABLE `usuario_resp` (
  `id_usuario_resp` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id_encuesta`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id_opcion`,`id_pregunta`,`id_tipo_opciones`),
  ADD KEY `opciones_tipo_opciones_idx` (`id_tipo_opciones`),
  ADD KEY `opciones_preguntas_idx` (`id_pregunta`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`,`id_categoria`,`id_usuario`),
  ADD KEY `preguntas_categorias_idx` (`id_categoria`),
  ADD KEY `preguntas_usuarios_idx` (`id_usuario`);

--
-- Indices de la tabla `respuestas_gene`
--
ALTER TABLE `respuestas_gene`
  ADD PRIMARY KEY (`id_respuesta_gene`),
  ADD KEY `respuestas_preguntas_idx` (`id_pregunta`),
  ADD KEY `respuesta_opciones_idx` (`id_opcion`),
  ADD KEY `respuesta_usuario_idx` (`id_usuario`),
  ADD KEY `respuesta_encuesta_idx` (`id_encuesta`);

--
-- Indices de la tabla `respuesta_prof`
--
ALTER TABLE `respuesta_prof`
  ADD PRIMARY KEY (`id_respuesta_prof`,`id_encuesta`,`id_usuario`,`id_pregunta`),
  ADD KEY `respuesta_prof_encuesta` (`id_encuesta`),
  ADD KEY `respuesta_prof_usuario` (`id_usuario`),
  ADD KEY `respuesta_prof_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `sub_ociones`
--
ALTER TABLE `sub_ociones`
  ADD PRIMARY KEY (`id_sub_ociones`,`id_opcion`,`id_pregunta`,`id_tipo_opciones`),
  ADD KEY `sub_opcines_opciones_idx` (`id_opcion`),
  ADD KEY `sub_opciones_preguntas_idx` (`id_pregunta`),
  ADD KEY `sub_opciones_tipo_opciones_idx` (`id_tipo_opciones`);

--
-- Indices de la tabla `tipo_opciones`
--
ALTER TABLE `tipo_opciones`
  ADD PRIMARY KEY (`id_tipo_opciones`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`,`id_tipousuario`),
  ADD UNIQUE KEY `user` (`user`),
  ADD KEY `usario_tipo_usaurio` (`id_tipousuario`);

--
-- Indices de la tabla `usuario_resp`
--
ALTER TABLE `usuario_resp`
  ADD PRIMARY KEY (`id_usuario_resp`,`id_usuario`),
  ADD KEY `usuario_resp_usuarios` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id_encuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id_opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT de la tabla `respuestas_gene`
--
ALTER TABLE `respuestas_gene`
  MODIFY `id_respuesta_gene` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `respuesta_prof`
--
ALTER TABLE `respuesta_prof`
  MODIFY `id_respuesta_prof` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sub_ociones`
--
ALTER TABLE `sub_ociones`
  MODIFY `id_sub_ociones` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_opciones`
--
ALTER TABLE `tipo_opciones`
  MODIFY `id_tipo_opciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `usuario_resp`
--
ALTER TABLE `usuario_resp`
  MODIFY `id_usuario_resp` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_preguntas` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `opciones_tipo_opciones` FOREIGN KEY (`id_tipo_opciones`) REFERENCES `tipo_opciones` (`id_tipo_opciones`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categorias`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preguntas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas_gene`
--
ALTER TABLE `respuestas_gene`
  ADD CONSTRAINT `respuesta_encuesta` FOREIGN KEY (`id_encuesta`) REFERENCES `encuesta` (`id_encuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `respuesta_opciones` FOREIGN KEY (`id_opcion`) REFERENCES `opciones` (`id_opcion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `respuesta_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `respuestas_preguntas` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta_prof`
--
ALTER TABLE `respuesta_prof`
  ADD CONSTRAINT `respuesta_prof_encuesta` FOREIGN KEY (`id_encuesta`) REFERENCES `encuesta` (`id_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_prof_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_prof_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_ociones`
--
ALTER TABLE `sub_ociones`
  ADD CONSTRAINT `sub_opcines_opciones` FOREIGN KEY (`id_opcion`) REFERENCES `opciones` (`id_opcion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_opciones_preguntas` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_opciones_tipo_opciones` FOREIGN KEY (`id_tipo_opciones`) REFERENCES `tipo_opciones` (`id_tipo_opciones`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usario_tipo_usaurio` FOREIGN KEY (`id_tipousuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_resp`
--
ALTER TABLE `usuario_resp`
  ADD CONSTRAINT `usuario_resp_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
