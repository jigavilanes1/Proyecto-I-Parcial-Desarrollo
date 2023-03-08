-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2022 a las 00:53:25
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `comp_id` int(5) NOT NULL,
  `sala_id` int(5) NOT NULL,
  `comp_horario` varchar(20) NOT NULL,
  `comp_cantidad` int(5) NOT NULL,
  `comp_total` float NOT NULL,
  `pel_id` int(5) NOT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`comp_id`, `sala_id`, `comp_horario`, `comp_cantidad`, `comp_total`, `pel_id`, `usu_id`) VALUES
(1, 2, '18:00', 1, 6.6, 7, 2),
(2, 3, '21:30', 4, 28, 8, 3),
(3, 2, '19:00', 2, 13.2, 11, 3),
(4, 1, '19:00', 1, 5.2, 12, 3),
(5, 3, '19:00', 1, 7, 3, 2),
(6, 3, '19:00', 2, 14, 1, 2),
(7, 1, '18:00', 1, 5.2, 12, 2),
(8, 1, '18:00', 3, 15.6, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `gen_id` int(5) NOT NULL,
  `gen_nombre` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`gen_id`, `gen_nombre`) VALUES
(1, 'Accion'),
(2, 'Terror'),
(3, 'Drama'),
(4, 'Comedia'),
(5, 'Romance'),
(6, 'Animada'),
(7, 'Ciencia Ficcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `pel_id` int(5) NOT NULL,
  `pel_nombre` varchar(100) NOT NULL,
  `gen_id` int(5) NOT NULL,
  `pel_duracion` int(3) NOT NULL,
  `pel_sinopsis` varchar(1000) NOT NULL,
  `pel_trailer` varchar(50) NOT NULL,
  `pel_foto` varchar(200) NOT NULL,
  `pel_estado` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`pel_id`, `pel_nombre`, `gen_id`, `pel_duracion`, `pel_sinopsis`, `pel_trailer`, `pel_foto`, `pel_estado`) VALUES
(1, 'Avatar: El Camino del Agua', 1, 192, 'Ambientada mÃ¡s de una dÃ©cada despuÃ©s de los sucesos que tuvieron lugar en la primera pelÃ­cula, AVATAR: EL CAMINO DEL AGUA narra la historia de la familia Sully (Jake, Neytiri y sus hijos), el peligro que los persigue, los esfuerzos que hacen para mantenerse a salvo, las batallas que libran para seguir con vida, y las tragedias que sobrellevan. Dirigida por James Cameron y producida por Cameron y Jon Landau, la producciÃ³n de Lightstorm Entertainment estÃ¡ protagonizada por Sam Worthington, Zoe SaldaÃ±a, Sigourney Weaver, Stephen Lang y Kate Winslet. El guion es de James Cameron, Rick Jaffa y Amanda Silver. La historia es de James Cameron, Rick Jaffa, Amanda Silver, Josh Friedman y Shane Salerno. David Valdes y Richard Baneham son los productores ejecutivos de la pelÃ­cula.', 'https://www.youtube.com/embed/ill9f5ENuF8', '1.png', 'Activo'),
(2, 'La Emboscada', 1, 81, 'Nadine le renta a Frank espacios de su edificio para que cometa sus actos criminales. En el mÃ¡s reciente, las cosas empiezan mal, ya que el muerto que habÃ­a llevado momentos antes para que le sacaran algo muy valioso del cuerpo, ha desaparecido. Junto con sus secuaces y Nadine a rastras, Frank buscarÃ¡ al muerto por todo el lugar y entre los departamentos de sus inquilinos. El problema es que, despuÃ©s de verlos, comienzan a aparecer mÃ¡s cuerpos.', 'https://www.youtube.com/embed/KETQ_v82Z-Q', '2.png', 'Activo'),
(3, 'La Maldicion: Despertar de los muertos', 2, 109, 'El cuerpo de un sospechoso asesinato se descubre junto al de la vÃ­ctima en la escena del crimen. Sin embargo, resulta ser el cadÃ¡ver de una persona que muriÃ³ tres meses atrÃ¡s, por lo que desbarata la investigaciÃ³n policial. Mientras tanto, una periodista de investigaciÃ³n, Lim Jin Hee, recibe la llamada de un oyente al tiempo que aparece en un programa de radio. La persona que lo llama afirma ser el culpable del misterioso asesinato y le pide a Jin Hee que lo entreviste en cÃ¡mara en vivo. Con la policÃ­a en estado de alerta y la presencia de un pÃºblico entusiasta, el hombre concurre la entrevista, como le prometieron. Advierte que habrÃ¡ tres asesinatos mÃ¡s, que serÃ¡n cometidos por... cadÃ¡veres resucitados.', 'https://www.youtube.com/embed/pQ8XpBLv0Ts', '3.png', 'Activo'),
(4, 'Noche Sin Paz', 1, 112, 'Cuando un equipo de mercenarios irrumpe en un complejo familiar adinerado en Nochebuena y toma como rehenes a todos los que estÃ¡n dentro, el equipo no estÃ¡ preparado para una combatiente sorpresa: Santa ClausestÃ¡ en el terreno, y estÃ¡ a punto de demostrar por quÃ© este Nick no es un santo.', 'https://www.youtube.com/embed/-fm77Lzcgxg', '4.png', 'Activo'),
(5, 'Jeepers Creepers', 2, 95, 'Durante la celebraciÃ³n del primer Horror Hound Festival, donde han acudido fanÃ¡ticos del terror de todas partes, entre ellos Chase y su novia Laine, quien se ha visto "obligada" a participar y a medida que se acerca el evento, Laine comienza a experimentar premoniciones inexplicables y visiones inquietantes relacionadas con el mito urbano del "Creeper". A medida que se desarrolla el festival y el frenesÃ­ se empapa de sangre, Laine cree que algo sobrenatural ha sido convocado y que ella estÃ¡ en medio de todo ello.', 'https://www.youtube.com/embed/-Me5K-qJO0k', '5.png', 'Activo'),
(6, 'El Menu', 1, 107, 'Una joven pareja viaja a uno de los destinos mÃ¡s exclusivos del mundo para cenar en un restaurante que ofrece una experiencia culinaria Ãºnica. Sin embargo, el chef (Fiennes) ha preparado un ingrediente secreto que tendrÃ¡ un resultado sorprendente en los dos enamorados.', 'https://www.youtube.com/embed/SIwuppdxHjk', '6.png', 'Activo'),
(7, 'Pantera Negra: Wakanda', 1, 161, 'La reina Ramonda, Shuri, M\'Baku, Okoye y las Dora Milaje luchan por proteger a su naciÃ³n de las potencias mundiales que intervienen tras la muerte del Rey T\'Challa. Mientras los habitantes de Wakanda se esfuerzan embarcarse en un nuevo capÃ­tulo, los hÃ©roes deben unirse con la ayuda de War Dog Nakia y Everett Ross y forjar un nuevo camino para el reino de Wakanda. El film que cuenta con Tenoch Huerta como Namor, rey de una naciÃ³n submarina oculta, tambiÃ©n estÃ¡ protagonizada por Dominique Thorne, Michaela Coel, Mabel Cadena y Alex Livanalli.', 'https://www.youtube.com/embed/QROhcz3aYrM', '7.png', 'Activo'),
(8, 'Lilo, Lilo, Cocodrilo', 4, 106, 'Cuando la familia Primm (Constance Wu, Scoot McNairy, Winslow Fegley) se muda a la ciudad de Nueva York, su hijo Josh lucha por adaptarse a su nueva escuela y hacer nuevos amigos. Todo cambia cuando descubre a Lilo â€“ un cocodrilo que canta (Shawn Mendes), quien ama los baÃ±os en tina, el caviar y una gran vida musical en el Ã¡tico de su casa. Los dos se vuelven rÃ¡pidamente amigos. Pero cuando la existencia de Lilo es amenazada por un malvado vecino Mr. Grumps (Brett Gelman), los Primms deben unirse con el carismÃ¡tico dueÃ±o de Lilo, Hector P. Valenti (Javier Bardem), para enseÃ±arle al mundo que la familia puede venir de los lugares mÃ¡s inesperados y no hay nada malo en un gran cocodrilo que canta y con una personalidad aÃºn mÃ¡s grande.', 'https://www.youtube.com/embed/KDSZLBZhXiA', '8.png', 'Activo'),
(9, 'Hasta Los Huesos', 3, 107, 'Una historia del primer amor entre Maren, una joven que aprende a sobrevivir en los mÃ¡rgenes de la sociedad, y Lee, un vagabundo intenso y privado de sus derechos, que se encuentran y unen para emprender una odisea de mil millas. Pero a pesar de sus mejores esfuerzos, todos los caminos conducen de regreso a sus aterradores pasados y a un quiebre final que determinarÃ¡ si su amor puede sobrevivir.', 'https://www.youtube.com/embed/GLxOzjaImAo', '9.png', 'Activo'),
(10, 'Un Mundo ExtraÃ±o', 1, 102, 'PelÃ­cula animada de acciÃ³n y aventuras que nos traslada a un mundo inexplorado y peligroso donde increÃ­bles seres aguardan a los mÃ­ticos Clades: una familia de exploradores cuyas rencillas personales amenazan con echar por tierra su Ãºltima misiÃ³n y la mÃ¡s importante con mucha diferencia.', 'https://www.youtube.com/embed/teABHwf8ZP4', '10.png', 'Activo'),
(11, 'Black Adam', 1, 125, 'Casi 5.000 aÃ±os despuÃ©s de haber sido dotado de los poderes omnipotentes de los antiguos dioses -y encarcelado con la misma rapidez-, Black Adam (Johnson) es liberado de su tumba terrenal, listo para desatar su forma Ãºnica de justicia en el mundo moderno.', 'https://www.youtube.com/embed/a1mcS4tKGNg', '11.png', 'Activo'),
(12, 'Top Gun: Maverick', 1, 131, 'Segunda entrega de Top Gun (1986). De nuevo, veremos al aviador de Ã©lite de la Marina de los Estados Unidos mÃ¡s de 30 aÃ±os despuÃ©s de haberse convertido en uno de los mejores pilotos de la escuela de vuelo. SALA 4D: No aplica el uso de gafas.', 'https://www.youtube.com/embed/BoOFW_ByLhc', '12.png', 'Activo'),
(14, 'Spiderman', 1, 120, 'asdsasdasd', 'https://www.youtube.com/embed/ill9f5ENuF8', 'images.png', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `sala_id` int(5) NOT NULL,
  `sala_descripcion` varchar(20) NOT NULL,
  `sala_precio` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`sala_id`, `sala_descripcion`, `sala_precio`) VALUES
(1, '2D SUB', 5.2),
(2, '2D ESP', 6.6),
(3, '3D ESP', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(5) NOT NULL,
  `usu_nombre` varchar(100) NOT NULL,
  `usu_user` varchar(50) NOT NULL,
  `usu_password` varchar(255) NOT NULL,
  `usu_cedula` varchar(10) NOT NULL,
  `usu_email` varchar(50) NOT NULL,
  `usu_genero` varchar(10) NOT NULL,
  `usu_tipo` int(1) NOT NULL,
  `usu_estado` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_user`, `usu_password`, `usu_cedula`, `usu_email`, `usu_genero`, `usu_tipo`, `usu_estado`) VALUES
(1, 'admin', 'admin', '465c194afb65670f38322df087f0a9bb225cc257e43eb4ac5a0c98ef5b3173ac', '1231231231', 'admin@gmail.com', 'Masculino', 1, 'Activo'),
(2, 'Sebastian', 'sebas', '465c194afb65670f38322df087f0a9bb225cc257e43eb4ac5a0c98ef5b3173ac', '123', 'sebas@gmail.com', 'Masculino', 2, 'Activo'),
(3, 'Henry', 'henry', '30fdf15fd513fd69085f9344ff2d5d716254aa367bcac88e78ee60ad0298d606', '100132', 'adas@dsfds', 'Masculino', 2, 'Activo'),
(7, 'Gabriela', 'gabriela1', '30fdf15fd513fd69085f9344ff2d5d716254aa367bcac88e78ee60ad0298d606', '1023912332', 'gabriela@espe.edu.ec', 'Femenino', 2, 'Activo'),
(8, 'Jacqueline Gavilanes', 'jacque1', '3ba046827980c684c9ce72a3c2aff80cc5e88b0fe89e11c6d707feb1f7c4a00e', '1726596602', 'jacque@gmail.com', 'Femenino', 1, 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`pel_id`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`sala_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `comp_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `gen_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `pel_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `sala_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
