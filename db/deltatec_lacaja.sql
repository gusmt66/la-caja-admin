-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2017 at 12:26 PM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deltatec_lacaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL,
  `title` varchar(250) CHARACTER SET latin1 NOT NULL,
  `description` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `filename` varchar(250) CHARACTER SET latin1 NOT NULL,
  `order` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `area` varchar(3) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `filename`, `order`, `active`, `area`) VALUES
(5, 'Gcia. Atención Individuos', NULL, 'http://appevento.lacajaonline.com.ar/books/GCIA_ATENCION_INDIVIDUOS_MARCELO_GRECO.pdf', 1, 1, 'DC'),
(6, 'Gcia. Atención Socios y Empresas', NULL, 'http://appevento.lacajaonline.com.ar/books/GCIA_ATENCION_SOCIOS_Y_EMPRESAS_MARCELO_RUIZ.pdf', 2, 1, 'DC'),
(7, 'Gcia. Canal Directo', NULL, 'http://appevento.lacajaonline.com.ar/books/GCIA_CANAL_DIRECTO_FERNANDO_IRURZUN.pdf', 3, 1, 'DC'),
(8, 'Gcia. Canales Indirectos', NULL, 'http://appevento.lacajaonline.com.ar/books/GCIA_CANALES_INDIRECTOS_GASTON_HANI.pdf', 4, 1, 'DC'),
(9, 'Gcia. Empresas y Affinity', NULL, 'http://appevento.lacajaonline.com.ar/books/GCIA_DE_EMPRESAS_Y_AFFINITY_MATIAS_LACOSTE.pdf', 5, 1, 'DC'),
(10, 'Gcia. Gestión y Administración', NULL, 'http://appevento.lacajaonline.com.ar/books/GCIA_GESTION_Y_ADMINISTRACION_ROXANA_DZIOB.pdf', 6, 1, 'DC'),
(11, 'Gcia. Red Sucursales', NULL, 'http://appevento.lacajaonline.com.ar/books/GCIA_RED_SUCURSALES_MARTIN_PAIVA.pdf', 7, 1, 'DC'),
(12, 'Comunicación Digital & Web', NULL, 'http://appevento.lacajaonline.com.ar/books/MKT_COMUNICACION_DIGITAL.pdf', 8, 1, 'MKT'),
(13, 'Simplificación de la Comunicación', NULL, 'http://appevento.lacajaonline.com.ar/books/MKT_COMUNICACION_SIMPLIFICACION.pdf', 9, 1, 'MKT'),
(14, 'Investigación de Mercado', NULL, 'http://appevento.lacajaonline.com.ar/books/MKT_INVESTIGACION_DE_MERCADO.pdf', 10, 1, 'MKT'),
(15, 'Diagnostico de Marca', NULL, 'http://appevento.lacajaonline.com.ar/books/MKT_MARCA.pdf', 11, 1, 'MKT'),
(16, 'NPS', NULL, 'http://appevento.lacajaonline.com.ar/books/MKT_NPS.pdf', 12, 1, 'MKT'),
(17, 'Prensa y Mkt Interno', NULL, 'http://appevento.lacajaonline.com.ar/books/MKT_PRENSA_Y_MKT_INTERNO.pdf', 13, 1, 'MKT'),
(18, 'Sponsoreo', NULL, 'http://appevento.lacajaonline.com.ar/books/MKT_SPONSOREO.pdf', 14, 1, 'MKT');

-- --------------------------------------------------------

--
-- Table structure for table `clues_assigned`
--

CREATE TABLE IF NOT EXISTS `clues_assigned` (
  `id` int(11) NOT NULL,
  `clue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clues_treasure`
--

CREATE TABLE IF NOT EXISTS `clues_treasure` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clues_treasure`
--

INSERT INTO `clues_treasure` (`id`, `description`, `order`) VALUES
(1, 'Busca en el lobby, debe estar muy cerca de los muebles de espera', 1),
(2, 'Ahora te toca buscar en el baño del piso 2, puede estar en el techo? o será en el piso?', 2),
(3, 'Vas bien, pero aun no has buscado en el ascensor de servicio. Que esperas?', 3),
(4, 'Estas cerca de la ultima pista. Busca dentro del baul en uno de los pasillos del piso 5', 4),
(5, 'Todavia no es la ultima! Ya deja de dar vueltas y camina en linea recta por el pasillo del piso 10, frente al ascensor público', 5),
(6, 'Aún no te has dado una vuelta por el PH del hotel? Deberías hacerlo.', 6),
(7, 'Has pensado en pasearte por la entrada principal? Si hablas con un botones puede que te ayude. Piénsalo.', 7),
(8, 'Siempre miramos hacia el frente pero nunca estamos pendientes del techo. Qué tal si ahora lo hacemos?', 8),
(9, 'Busca la mesera más alta del restaurant, puede que hablando con ella consigas esta pista.', 9),
(10, 'Conoces al gerente del hotel? Si no, deberías hacerlo porque puede darte esta pista.', 10),
(9999, 'pista para indicar que ya completo las pistas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `device_tokens`
--

CREATE TABLE IF NOT EXISTS `device_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(250) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `filename` varchar(250) NOT NULL,
  `order` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `description` varchar(4000) CHARACTER SET latin1 DEFAULT '',
  `room` varchar(250) CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `room`, `user_id`, `date_start`, `date_end`) VALUES
(1, 'Recepción equipaje - Desayuno foyer Salón Girasoles', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at leo felis. Praesent commodo, justo id sodales venenatis, metus neque convallis velit, id fringilla leo ligula vitae velit.', '', NULL, '2016-09-30 08:30:00', '2016-09-30 09:00:00'),
(2, 'Apertura Convención - Salón Girasoles', 'Proin vestibulum sed nisl id blandit. Suspendisse potenti. Vestibulum sit amet libero eget odio semper molestie vitae non leo.', '', NULL, '2016-09-30 09:00:00', '2016-09-30 09:15:00'),
(3, 'Presentación Dirección Comercial - Presentación Dirección de Marketing & CE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at leo felis. Praesent commodo, justo id sodales venenatis, metus neque convallis velit, id fringilla leo ligula vitae velit.', '', NULL, '2016-09-30 09:15:00', '2016-09-30 11:00:00'),
(4, 'Coffee Break', 'Phasellus quis iaculis nunc. Donec lobortis ac nisi vitae sollicitudin. Praesent facilisis dapibus dictum. Praesent egestas, nibh laoreet placerat rhoncus, ex magna mollis nibh, at blandit dui odio eu erat. Morbi eget auctor nulla.', '', NULL, '2016-09-30 11:00:00', '2016-09-30 11:15:00'),
(5, 'Workshop “Clientes “ - Salón Girasoles', 'Mauris quis tellus porttitor, accumsan ipsum nec, egestas ipsum. Nam quis varius massa, ac mollis sem. Fusce a sodales mi, non porta metus. Ut ut nulla eget velit aliquet imperdiet eu vel diam.', '', NULL, '2016-09-30 11:15:00', '2016-09-30 13:25:00'),
(6, 'Almuerzo - Restaurante “Las Vasijas”', 'Mauris quis tellus porttitor, accumsan ipsum nec, egestas ipsum. Nam quis varius massa, ac mollis sem. Fusce a sodales mi, non porta metus. Ut ut nulla eget velit aliquet imperdiet eu vel diam.', '', NULL, '2016-09-30 13:25:00', '2016-09-30 15:00:00'),
(7, 'Check in - Tiempo Libre (*)', '(*) Por la tarde del primer día podremos hacer uso de las instalaciones del hotel, pileta exterior con solarium, piscina cubierta climatizada, jacuzzi, sauna húmedo, sauna seco, beach volley , cancha de tenis y gimnasio. También habrá micros disponibles para ir a las canchas del Club Mapuche para jugar al fútbol para quien lo desee.', '', NULL, '2016-09-30 15:00:00', '2016-09-30 21:00:00'),
(8, 'Recepción en el jardín y cena show ', 'Mauris quis tellus porttitor, accumsan ipsum nec, egestas ipsum. Nam quis varius massa, ac mollis sem. Fusce a sodales mi, non porta metus. Ut ut nulla eget velit aliquet imperdiet eu vel diam.', '', NULL, '2016-09-30 21:00:00', '2016-10-01 00:00:00'),
(9, 'Desayuno Restaurante “Las Vasijas” - Check Out', 'Phasellus quis iaculis nunc. Donec lobortis ac nisi vitae sollicitudin. Praesent facilisis dapibus dictum. Praesent egestas, nibh laoreet placerat rhoncus, ex magna mollis nibh, at blandit dui odio eu erat. Morbi eget auctor nulla.', '', NULL, '2016-10-01 08:30:00', '2016-10-01 09:00:00'),
(10, 'Presentación Dirección Recursos Humanos - Salón  Girasoles', 'Proin vestibulum sed nisl id blandit. Suspendisse potenti. Vestibulum sit amet libero eget odio semper molestie vitae non leo.', '', NULL, '2016-10-01 09:00:00', '2016-10-01 10:15:00'),
(11, 'Workshop “Foco en el Cliente I ” - Salón Girasoles', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at leo felis. Praesent commodo, justo id sodales venenatis, metus neque convallis velit, id fringilla leo ligula vitae velit.', '', NULL, '2016-10-01 10:15:00', '2016-10-01 12:00:00'),
(12, 'Coffee Break', 'Proin vestibulum sed nisl id blandit. Suspendisse potenti. Vestibulum sit amet libero eget odio semper molestie vitae non leo.', '', NULL, '2016-10-01 12:00:00', '2016-10-01 12:15:00'),
(13, 'Workshop “Foco en el Cliente II” - Salón Girasoles', 'Phasellus quis iaculis nunc. Donec lobortis ac nisi vitae sollicitudin. Praesent facilisis dapibus dictum. Praesent egestas, nibh laoreet placerat rhoncus, ex magna mollis nibh, at blandit dui odio eu erat. Morbi eget auctor nulla.', '', NULL, '2016-01-10 12:15:00', '2016-10-01 13:15:00'),
(14, 'Almuerzo - Restaurante “Las Vasijas”', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at leo felis. Praesent commodo, justo id sodales venenatis, metus neque convallis velit, id fringilla leo ligula vitae velit.', '', NULL, '2016-10-01 13:15:00', '2016-10-01 14:30:00'),
(15, 'Panel de Preguntas Directores - Salón Girasoles', 'Phasellus quis iaculis nunc. Donec lobortis ac nisi vitae sollicitudin. Praesent facilisis dapibus dictum. Praesent egestas, nibh laoreet placerat rhoncus, ex magna mollis nibh, at blandit dui odio eu erat. Morbi eget auctor nulla.', '', NULL, '2016-10-01 14:30:00', '2016-10-01 16:15:00'),
(16, 'Coffee Break', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at leo felis. Praesent commodo, justo id sodales venenatis, metus neque convallis velit, id fringilla leo ligula vitae velit.', '', NULL, '2016-10-01 16:15:00', '2016-10-01 16:30:00'),
(17, 'Cierre de la Convención - Salón Girasoles', 'Proin vestibulum sed nisl id blandit. Suspendisse potenti. Vestibulum sit amet libero eget odio semper molestie vitae non leo.', '', NULL, '2016-10-01 16:30:00', '2016-10-01 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `general_information`
--

CREATE TABLE IF NOT EXISTS `general_information` (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET latin1 NOT NULL,
  `description` varchar(3000) NOT NULL,
  `link` varchar(250) DEFAULT NULL,
  `icon_name` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_information`
--

INSERT INTO `general_information` (`id`, `title`, `description`, `link`, `icon_name`, `order`, `active`) VALUES
(1, 'Indicaciones para llegar', 'Desde General Rodríguez\nSiga por la ruta provincial 28 hasta Pilar.\nLuego gire a la derecha en la autopista Panamericana hasta el km 49,5. \n\nDesde Luján\nSiga por la ruta provincial 34 hasta Pilar.\nGire a la derecha y siga por la ruta 9 hasta el km 49,5. \n\nDesde Buenos Aires\nSiga por la autopista Panamericana hasta el km 32 donde la autopista se divide en dos.\nTome el acceso a Pilar hasta el kilómetro km 49,5. \n', NULL, 'ion-ios-information-outline', NULL, 1),
(2, '22 y 23 de Noviembre', '', NULL, 'ion-ios-calendar-outline', NULL, 1),
(3, 'Hotel Sheraton Pilar', 'Km. 49.5, Colectora Este Panamericana 1629, 1629 Pilar, Buenos Aires', 'https://goo.gl/maps/5xpJTKL5qF42', 'ion-ios-location-outline', NULL, 1),
(4, '', '0230 430-5000', NULL, 'ion-ios-telephone-outline', NULL, 1),
(5, 'Servicios no incluidos', '*Room Service\n*Bebidas extras que soliciten por fuera del régimen de comidas. \nA excepción de las aguas del frigo bar que están incluidas.\n*Servicios de lavandería.\n*Tratamientos de Spa.\n*Llamadas telefónicas. ', NULL, 'ion-ios-clock-outline', NULL, 1),
(6, 'Código de vestimenta', 'Hombre: camisa y pantalón formales Mujer: vestido o pantalón formal', NULL, 'ion-bowtie', NULL, 1),
(7, 'Wifi: lacaja216evento', 'Pass: lacaja216evento', NULL, 'ion-wifi', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `global_parameters`
--

CREATE TABLE IF NOT EXISTS `global_parameters` (
  `id` int(11) NOT NULL,
  `code` varchar(250) CHARACTER SET latin1 NOT NULL,
  `description` varchar(500) CHARACTER SET latin1 NOT NULL,
  `value` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `global_parameters`
--

INSERT INTO `global_parameters` (`id`, `code`, `description`, `value`) VALUES
(1, 'TRIVIA_HABILITADO', 'Parámetro general que se utiliza para habilitar la funcionalidad de la trivia', 'si'),
(2, 'BTESORO_MSG_INHABILITADO', 'Mensaje a mostrar en caso de que no este habilitado el parámetro de búsqueda de tesoro', 'Esta funcionalidad aún no se encuentra habilitada. Intente más tarde'),
(3, 'BTESORO_MSG_SECUENCIAL', 'Mensaje para mostrar en pantalla si el usuario quiere scanear un código QR el cual no es secuencial a la anterior pista', 'Código de pista QR incorrecto. Le falta una pista anterior.'),
(4, 'BTRIVIA_MSG_INHABILITADO', 'Mensaje a mostrar en caso de que no este habilitado el parámetro de Trivia', 'Esta funcionalidad aún no se encuentra habilitada. Intente más tarde'),
(5, 'GALERIA_HABILITADO', 'Parámetro general que se utiliza para habilitar la funcionalidad de la galeria', 'si'),
(6, 'ENCUESTA_HABILITADO', 'Parámetro general que se utiliza para habilitar la funcionalidad de la encuesta', 'si');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `message` varchar(500) CHARACTER SET latin1 NOT NULL,
  `link` varchar(250) CHARACTER SET latin1 NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `link`, `date`) VALUES
(34, 'prueba de notificacion en este video', 'events', '2016-11-15 20:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL,
  `title` varchar(250) CHARACTER SET latin1 NOT NULL,
  `description` varchar(500) CHARACTER SET latin1 NOT NULL,
  `pdf_url` varchar(250) CHARACTER SET latin1 NOT NULL,
  `src` varchar(250) CHARACTER SET latin1 NOT NULL,
  `order` int(11) DEFAULT NULL,
  `link_externo` varchar(255) DEFAULT NULL,
  `link_externo_descrip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `title`, `description`, `pdf_url`, `src`, `order`, `link_externo`, `link_externo_descrip`) VALUES
(1, 'The Panda lorem ipsum dolor sit amet, consectetur', 'ajshd sjad ajh jkhadhslkajdh lakjdhajkdshalj jhsdlakjhdl', 'https://www.recreoviral.com/wp-content/uploads/2015/03/animales-embarazados-1.jpg', 'https://www.recreoviral.com/wp-content/uploads/2015/03/animales-embarazados-1.jpg', 1, 'https://google.com.ar', 'Abrir Foto 360'),
(2, 'The Tiger lorem ipsum', '', 'http://www.pdfpdf.com/samples/Sample3.PDF', 'http://www.culturizate.com/wp-content/uploads/2016/05/30-hechos-que-no-sabias-de-los-animales-2.jpg', 2, NULL, NULL),
(3, 'The Dog lorem ipsum cras vulputate ut ipsum et sagittis', '', 'http://www.pdfpdf.com/samples/Sample4.PDF', 'https://images-na.ssl-images-amazon.com/images/G/01/img15/pet-products/small-tiles/23695_pets_vertical_store_dogs_small_tile_8._CB312176604_.jpg', 3, NULL, NULL),
(4, 'The Polar Bear Nullam nec ex sollicitudin, porttitor neque', '', 'http://www.pdfpdf.com/samples/Sample5.PDF', 'http://img.ecologiahoy.com/2016/08/Mamiferos_2.jpg', 4, 'https://gmail.com', 'Gmail'),
(5, 'The chicken lorem ipsum lorem ipsum lorem ipsum', '', 'http://www.pdf995.com/samples/pdf.pdf', 'http://www.planetacurioso.com/wp-content/uploads/2014/08/cuidado-animal1.jpg', 5, 'https://facebook.com', 'Facebook'),
(6, 'The dolphin lorem ipsum lorem lorem ipsum', '', 'http://www.pdfpdf.com/samples/Sample2.PDF', 'http://static2.animalesmascotas.com/wp-content/uploads/2015/09/ANIMALES-MARINOS-TODA-LA-INFORMACION-PARA-TUS-TRABAJO-O-TAREAS1-600x375.jpg', 6, NULL, NULL),
(7, 'The Lion lorem ipsum lorem pisum lorem ipsum lorem ipsum', '', 'http://www.pdfpdf.com/samples/Sample3.PDF', 'http://static3.animalesmascotas.com/wp-content/uploads/2013/01/animales-salvajes-leon.jpg', NULL, NULL, NULL),
(8, 'The Zebra lorem ipsum lorem ipsum lorem ipsum', '', 'http://www.pdfpdf.com/samples/Sample5.PDF', 'http://www.infoanimales.com/wp-content/uploads/2016/07/Animales-salvajes-1-e1468190663950.jpg', NULL, NULL, NULL),
(9, 'The Panda lorem ipsum dolor sit amet, consectetur', '', 'https://www.recreoviral.com/wp-content/uploads/2015/03/animales-embarazados-1.jpg', 'https://www.recreoviral.com/wp-content/uploads/2015/03/animales-embarazados-1.jpg', 1, NULL, NULL),
(10, 'The Tiger lorem ipsum', '', 'http://www.pdfpdf.com/samples/Sample3.PDF', 'http://www.culturizate.com/wp-content/uploads/2016/05/30-hechos-que-no-sabias-de-los-animales-2.jpg', 2, NULL, NULL),
(11, 'The Dog lorem ipsum cras vulputate ut ipsum et sagittis', '', 'http://www.pdfpdf.com/samples/Sample4.PDF', 'https://images-na.ssl-images-amazon.com/images/G/01/img15/pet-products/small-tiles/23695_pets_vertical_store_dogs_small_tile_8._CB312176604_.jpg', 3, NULL, NULL),
(12, 'The Polar Bear Nullam nec ex sollicitudin, porttitor neque', '', 'http://www.pdfpdf.com/samples/Sample5.PDF', 'http://img.ecologiahoy.com/2016/08/Mamiferos_2.jpg', 4, NULL, NULL),
(13, 'The chicken lorem ipsum lorem ipsum lorem ipsum', '', 'http://www.pdf995.com/samples/pdf.pdf', 'http://www.planetacurioso.com/wp-content/uploads/2014/08/cuidado-animal1.jpg', 5, NULL, NULL),
(14, 'The dolphin lorem ipsum lorem lorem ipsum', '', 'http://www.pdfpdf.com/samples/Sample2.PDF', 'http://static2.animalesmascotas.com/wp-content/uploads/2015/09/ANIMALES-MARINOS-TODA-LA-INFORMACION-PARA-TUS-TRABAJO-O-TAREAS1-600x375.jpg', 6, NULL, NULL),
(15, 'The Lion lorem ipsum lorem pisum lorem ipsum lorem ipsum', '', 'http://www.pdfpdf.com/samples/Sample3.PDF', 'http://static3.animalesmascotas.com/wp-content/uploads/2013/01/animales-salvajes-leon.jpg', NULL, NULL, NULL),
(16, 'The Zebra lorem ipsum lorem ipsum lorem ipsum', '', 'http://www.pdfpdf.com/samples/Sample5.PDF', 'http://www.infoanimales.com/wp-content/uploads/2016/07/Animales-salvajes-1-e1468190663950.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sections_visited`
--

CREATE TABLE IF NOT EXISTS `sections_visited` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `survey_answers`
--

CREATE TABLE IF NOT EXISTS `survey_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(250) CHARACTER SET latin1 NOT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey_answers`
--

INSERT INTO `survey_answers` (`id`, `question_id`, `answer`, `order`) VALUES
(14, 1, 'Excelente', 1),
(15, 1, 'Muy buena', 2),
(16, 1, 'Buena', 3),
(17, 1, 'Ni buena ni mala', 4),
(18, 1, 'Mala', 5),
(19, 1, 'NS/NC', 6),
(20, 2, 'Excelente', 1),
(21, 2, 'Muy buena', 2),
(22, 2, 'Buena', 3),
(23, 2, 'Ni buena ni mala', 4),
(24, 2, 'Mala', 5),
(25, 2, 'NS/NC', 6),
(26, 3, 'Excelente', 1),
(27, 3, 'Muy buena', 2),
(28, 3, 'Buena', 3),
(29, 3, 'Ni buena ni mala', 4),
(30, 3, 'Mala', 5),
(31, 3, 'NS/NC', 6),
(32, 4, 'Excelente', 1),
(33, 4, 'Muy buena', 2),
(34, 4, 'Buena', 3),
(35, 4, 'Ni buena ni mala', 4),
(36, 4, 'Mala', 5),
(37, 4, 'NS/NC', 6),
(38, 5, 'Excelente', 1),
(39, 5, 'Muy buena', 2),
(40, 5, 'Buena', 3),
(41, 5, 'Ni buena ni mala', 4),
(42, 5, 'Mala', 5),
(43, 5, 'NS/NC', 6),
(44, 6, 'Excelente', 1),
(45, 6, 'Muy buena', 2),
(46, 6, 'Buena', 3),
(47, 6, 'Ni buena ni mala', 4),
(48, 6, 'Mala', 5),
(49, 6, 'NS/NC', 6),
(50, 7, 'Excelente', 1),
(51, 7, 'Muy buena', 2),
(52, 7, 'Buena', 3),
(53, 7, 'Ni buena ni mala', 4),
(54, 7, 'Mala', 5),
(55, 7, 'NS/NC', 6),
(56, 8, 'Excelente', 1),
(57, 8, 'Muy buena', 2),
(58, 8, 'Buena', 3),
(59, 8, 'Ni buena ni mala', 4),
(60, 8, 'Mala', 5),
(61, 8, 'NS/NC', 6),
(62, 9, 'Excelente', 1),
(63, 9, 'Muy buena', 2),
(64, 9, 'Buena', 3),
(65, 9, 'Ni buena ni mala', 4),
(66, 9, 'Mala', 5),
(67, 9, 'NS/NC', 6),
(68, 10, 'Excelente', 1),
(69, 10, 'Muy buena', 2),
(70, 10, 'Buena', 3),
(71, 10, 'Ni buena ni mala', 4),
(72, 10, 'Mala', 5),
(73, 10, 'NS/NC', 6),
(74, 11, 'Excelente', 1),
(75, 11, 'Muy buena', 2),
(76, 11, 'Buena', 3),
(77, 11, 'Ni buena ni mala', 4),
(78, 11, 'Mala', 5),
(79, 11, 'NS/NC', 6),
(80, 12, 'Excelente', 1),
(81, 12, 'Muy buena', 2),
(82, 12, 'Buena', 3),
(83, 12, 'Ni buena ni mala', 4),
(84, 12, 'Mala', 5),
(85, 12, 'NS/NC', 6),
(86, 13, 'Excelente', 1),
(87, 13, 'Muy buena', 2),
(88, 13, 'Buena', 3),
(89, 13, 'Ni buena ni mala', 4),
(90, 13, 'Mala', 5),
(91, 13, 'NS/NC', 6),
(92, 14, 'Excelente', 1),
(93, 14, 'Muy buena', 2),
(94, 14, 'Buena', 3),
(95, 14, 'Ni buena ni mala', 4),
(96, 14, 'Mala', 5),
(97, 14, 'NS/NC', 6);

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE IF NOT EXISTS `survey_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(250) CHARACTER SET latin1 NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey_questions`
--

INSERT INTO `survey_questions` (`id`, `question`, `type`, `order`) VALUES
(1, 'Consideras que la comunicación previa al evento fue:', 'simple', 1),
(2, '¿Cuál es tu opinión sobre el lugar elegido para la Convención 2016?', 'simple', 1),
(3, 'El servicio del catering del Hotel Sheraton Pilar fue:', 'simple', 1),
(4, '¿Cuál es tu opinión sobre la relación de trabajo y tiempo libre asignado durante la convención?', 'simple', 1),
(5, '¿Qué te parecieron las propuestas de Show y entretenimiento durante la cena?', 'simple', 1),
(6, 'Consideras que los contenidos expuestos en la presentación de la Dirección Comercial fueron:', 'simple', 1),
(7, 'Consideras que los contenidos expuestos en la presentación de la Dirección de Marketing & CE fueron:', 'simple', 1),
(8, 'Consideras que los contenidos expuestos en la presentación de la Dirección de RRHH fueron:', 'simple', 1),
(9, 'Consideras que las presentaciones publicadas en la APP fueron:', 'simple', 1),
(10, 'Consideras que el workshop “Casos Cliente” (día 1) fue:', 'simple', 1),
(11, 'Consideras que el workshop “Concurso Foco en el Cliente” (día 2) fue:', 'simple', 1),
(12, 'Consideras que la actividad “Panel de Directores” fue:', 'simple', 1),
(13, 'En relación a la duración del evento (2 días y una noche) consideras que fue:', 'simple', 1),
(14, 'Evaluación general de la Convención 2016:', 'simple', 1),
(15, 'Para nosotros tu opinión es importante. Te invitamos a que nos dejes tus sugerencias y comentarios:', 'open', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_results`
--

CREATE TABLE IF NOT EXISTS `survey_results` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trivia_answers`
--

CREATE TABLE IF NOT EXISTS `trivia_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(250) CHARACTER SET latin1 NOT NULL,
  `is_correct` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trivia_answers`
--

INSERT INTO `trivia_answers` (`id`, `question_id`, `answer`, `is_correct`) VALUES
(130, 1, 'Volkswagen', 0),
(131, 1, 'GM Chevrolet', 1),
(132, 1, 'Ford', 0),
(133, 2, 'Ramo 8', 1),
(134, 2, 'Ramo 1', 0),
(135, 2, 'Ramo 9', 0),
(136, 3, 'Rendiciones de Gastos Fijos', 1),
(137, 3, 'Rendiciones KM', 0),
(138, 3, 'Ninguna de las anteriores', 0),
(139, 4, '911', 0),
(140, 4, '466', 0),
(141, 4, '392', 1),
(142, 5, '25.000', 0),
(143, 5, '85.000', 1),
(144, 5, '100.000', 0),
(145, 6, 'Publicidad', 1),
(146, 6, 'Respuesta', 0),
(147, 6, 'Cobertura', 0),
(148, 7, 'Norden', 0),
(149, 7, 'Alea', 0),
(150, 7, 'Bertolaccini', 1),
(151, 8, 'Un elefante', 1),
(152, 8, 'Un león', 0),
(153, 8, 'Un cocodrilo', 0),
(154, 9, '1000', 0),
(155, 9, '1200', 0),
(156, 9, '1600', 1),
(157, 10, 'Bajar el precio de las pólizas', 0),
(158, 10, 'Modelo Suc/Organizador', 1),
(159, 10, 'Sumar nuevos productores', 0),
(160, 11, 'CD Seguro del Hogar', 0),
(161, 11, 'CI PAS', 0),
(162, 11, 'Ambas', 1),
(163, 12, 'Prensa', 0),
(164, 12, 'Consumidor y Competencia', 1),
(165, 12, 'Proveedores', 0),
(166, 13, '65%', 1),
(167, 13, '85%', 0),
(168, 13, '95%', 0),
(169, 14, 'Saldo deudor en Garbarino', 1),
(170, 14, 'TRO TELECOM', 0),
(171, 14, 'Flota FEDEX', 0),
(172, 15, '2100 llamadas', 0),
(173, 15, '900 llamadas', 1),
(174, 15, '400 llamadas', 0),
(175, 16, 'POLARIS', 0),
(176, 16, 'I POLARIS', 0),
(177, 16, 'SISE', 1),
(178, 17, 'Acompañamos al básquet', 0),
(179, 17, 'Actualizá tu firma digital', 1),
(180, 17, 'NPS palabra de los Lideres', 0),
(181, 18, 'Resultado Financiero ', 0),
(182, 18, 'Adecuar proc. normativos', 0),
(183, 18, 'Cuadros de reemplazo', 1),
(184, 19, '10%', 0),
(185, 19, '25%', 1),
(186, 19, '50%', 0),
(187, 20, 'Ericsson', 0),
(188, 20, 'Telefónica', 1),
(189, 20, 'Bayer', 0),
(190, 21, '15%', 0),
(191, 21, '30%', 0),
(192, 21, '50%', 1),
(193, 22, 'Trelew', 0),
(194, 22, 'Salta', 1),
(195, 22, 'Mendoza', 0),
(196, 23, '71.000', 0),
(197, 23, '61.000', 1),
(198, 23, '51.000', 0),
(199, 24, 'Aumentar las consultas', 0),
(200, 24, 'Mejorar los procesos', 0),
(201, 24, 'Comunicaciones sencillas', 1),
(202, 25, '78%', 0),
(203, 25, '89%', 1),
(204, 25, '120%', 0),
(205, 26, 'Gestión de Desempeño', 0),
(206, 26, 'Dotaciones reducidas', 0),
(207, 26, 'Ambas son correctas', 1),
(208, 27, 'Mascotas y Desempleo', 0),
(209, 27, 'Llave y salud', 0),
(210, 27, 'Llave y unipase', 1),
(211, 28, 'AuxiCaja - ACA', 1),
(212, 28, 'Solicitud documentación', 0),
(213, 28, 'Quejas y Reclamos', 0),
(214, 29, 'FALABELLA', 0),
(215, 29, 'BBVA FRANCÉS', 1),
(216, 29, 'FORD', 0),
(217, 30, 'Infonet', 0),
(218, 30, 'Blog Interactivo', 0),
(219, 30, 'Desayunos c/ Director', 1),
(220, 31, 'Robo Celulares', 0),
(221, 31, 'Seguro del Hogar ', 1),
(222, 31, 'Autos', 0),
(223, 32, '15.000', 0),
(224, 32, '30.000', 0),
(225, 32, '55.000', 1),
(226, 33, '26%', 0),
(227, 33, '51%', 0),
(228, 33, '73%', 1),
(229, 34, 'Instagram y Facebook', 0),
(230, 34, 'Twitter y Facebook ', 1),
(231, 34, 'Twitter y Google+', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trivia_questions`
--

CREATE TABLE IF NOT EXISTS `trivia_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(250) CHARACTER SET latin1 NOT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trivia_questions`
--

INSERT INTO `trivia_questions` (`id`, `question`, `order`) VALUES
(1, '¿Con qué Terminal firmamos un nuevo acuerdo de Open Market?', 1),
(2, '¿Sobre qué ramo se puso foco en desarrollar soluciones?', 2),
(3, '¿Qué circuito se logró sistematizar en el Sector de Gastos?', 3),
(4, '¿Cuántos Concesionarios tienen acuerdo con Caja de las 9 Marcas Principales?', 4),
(5, '¿Cuántos llamados promedio por mes se gestionan en el Contact Center de Atención al Cliente?', 5),
(6, 'En el diagnóstico de Marca ¿Cuáles son los puntos destacados de La Caja?', 6),
(7, 'En corporativo Interior ¿Con qué Broker comenzamos a operar en Rosario?', 7),
(8, 'Según los empleados encuestados en el diagnóstico de Marca ¿Qué animal representa mejor a La Caja?', 8),
(9, 'A través del nuevo acuerdo con BBVA Banco Francés ¿Cuántas altas Open Market generamos en septiembre?', 9),
(10, '¿Cuál es el desafío más importante del Canal PAS con Sucursales Interior para el 2017?', 10),
(11, 'Señalar los principales focos comerciales que coinciden con la estrategia de cada canal', 11),
(12, '¿La voz de quién escuchamos en Investigación de Mercado?', 12),
(13, '¿Cuál es el porcentaje de cierre de círculo que tiene la compañía como objetivo durante el 2016?', 13),
(14, 'En empresas con Broker ¿Qué negocio nuevo ganamos?', 14),
(15, 'En el punto de contacto “Bajas” ¿Cuántas llamadas se lograron reducir por mes con la mejora realizada?', 15),
(16, '¿Cuál es el sistema operativo que utiliza La Caja para la administración del negocio proveniente de la Ex Generali?', 16),
(17, 'De las notas de intranet de la Dirección de Marketing & CE ¿Cuál fue la que más visitas recibió?', 17),
(18, '¿Cuál de los siguientes enunciados son parte de los desafíos para el 2017?', 18),
(19, '¿Cuál fue el porcentaje de crecimiento de leads (registros insertados) durante el mes de agosto generados por la Campaña de Performace web?', 19),
(20, 'En Empresas Directo ¿Qué Flota nueva ganamos?', 20),
(21, '¿Cuál es el porcentaje de aumento de la comunidad total en redes sociales 2016 vs 2015?', 21),
(22, '¿En qué ciudad del Interior se empezó a construir la nueva Sucursal?', 22),
(23, '¿Cuántas descargas del App hubo entre Diciembre 2015 y Agosto 2016?', 23),
(24, '¿Qué buscamos generar con el Proyecto “Simplificación de la Comunicación”? ', 24),
(25, '¿Cuál fue el % Cross Sell de productos de CM vs Autos en Agosto de  2016 para el Canal Directo?', 25),
(26, 'Enfocados en la tarea de gestionar equipos de trabajo ¿Cuáles son los principales desafíos que enfrentará la Red de Sucursales para el 2017?', 26),
(27, '¿Cuáles son los nuevos lanzamientos (2016) concretados e incorporados  de la Caja Assist?', 27),
(28, '¿Cuál ha sido el último Touch Point incorporado al programa NPS de la Dirección Comercial?', 28),
(29, '¿En la C.Central de qué SOCIO ubicamos un Ejecutivo de Atención?', 29),
(30, '¿Cuál de estas  acciones es emergentes de la Encuesta de Clima 2015?', 30),
(31, 'En Affinity ¿Qué producto lanzamos con Garbarino durante Octubre?', 31),
(32, '¿Cuántos espectadores asistieron en total a los partidos del Tres Naciones La Caja y Súper 4 La Caja?', 32),
(33, '¿Qué porcentaje promedio de clientes son atendidos dentro de los primeros 60 segundos en la línea exclusiva de retención (FROST)?', 33),
(34, '¿Cuáles son las Redes Sociales que mas actividad registran en la atención a Clientes de la Cia., (aprox. 500 contactos por mes)?', 34);

-- --------------------------------------------------------

--
-- Table structure for table `trivia_results`
--

CREATE TABLE IF NOT EXISTS `trivia_results` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `time_elapsed` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE IF NOT EXISTS `users_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) CHARACTER SET latin1 NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`id`, `username`, `password`, `active`) VALUES
(1, 'gmorantes', '$2y$10$7x6o3ADaHVqDbQNCXYduEONbTAnV5QKnOOLTtMKYFlchV6yFu/57W', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_app`
--

CREATE TABLE IF NOT EXISTS `users_app` (
  `id` int(11) NOT NULL,
  `username` varchar(250) CHARACTER SET latin1 NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 NOT NULL,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `linkedin` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(250) CHARACTER SET latin1 NOT NULL,
  `picture_url` varchar(250) DEFAULT NULL,
  `user_type` varchar(250) NOT NULL DEFAULT 'participante',
  `job_title` varchar(250) DEFAULT NULL,
  `company` varchar(250) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password_activation` varchar(250) CHARACTER SET latin1 NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_app`
--

INSERT INTO `users_app` (`id`, `username`, `password`, `name`, `linkedin`, `email`, `picture_url`, `user_type`, `job_title`, `company`, `phone`, `password_activation`, `active`, `created_date`) VALUES
(1, '123456789', 's7x6bPIjd', 'Pedro Perez', 'https://www.linkedin.com/', 'doval@lacaja.com.ar', 'http://deltatech.com.ve/demos/lacaja/img/users/vicente.jpg', 'Participante', 'Manager', 'La Caja', '123456789', '$2y$10$60oXa50F.XqxiC85kjXgEO7bnNHvdRFJ/4EabBwKfwGvyqZLBiwbm', 0, '2016-09-27 15:52:44'),
(2, 'lramirezf@gmail.com', '12345', 'Luis Ramirez', 'https://www.linkedin.com/', 'lramirezf@gmail.com', 'http://deltatech.com.ve/demos/lacaja/img/users/image.jpg', 'Orador', 'Gerente de Operaciones', 'Medinet Consultores', '123456789', '123456789', 1, '2016-09-27 18:44:07'),
(3, 'gmorantes', '123', 'Gustavo Morantes', 'https://ve.linkedin.com/in/gustavomorantes1', 'gusmt66@gmail.com', 'http://deltatech.com.ve/demos/lacaja/img/users/IMG_20161207_100517.jpg', 'participante', 'Director de Comercialización', 'La Caja', '0412-6367510', '', 1, '2016-10-09 00:59:49'),
(4, 'ryanes', 'f52333', 'Romina Yanes', 'https://www.linkedin.com/', 'Winograd@lacaja.com.ar_', 'http://deltatech.com.ve/demos/lacaja/img/users/6402847559image.jpg', 'Orador', 'Gerente de RRHH', 'La Caja', '123456789', '', 0, '2016-10-09 01:02:59'),
(8, 'mbujan', '1', 'María Eugenia Bujan', 'http://mbujan.linkedin.co', 'mbujan@gmail.com', 'http://deltatech.com.ve/demos/lacaja/img/users/14786031708.jpg', 'participante', 'Líder de Mercadeo', 'La Caja', '12345678', '', 1, '2016-10-10 01:53:46'),
(9, 'aisaac', '58af68', 'Agustina Isaac', 'http://agustina.linkedin.com', 'yamid.otero@gmail.com', 'http://deltatech.com.ve/demos/lacaja/img/users/3893944815image.jpg', 'participante', 'Diseñadora Gráfica', 'La Caja', '1234456789', '', 0, '2016-10-10 02:01:25'),
(10, 'raquelyanes', '1234', 'Raquel Yanes', 'https://www.linkedin.com/', 'carolinacalzacorta@gmail.com', 'http://deltatech.com.ve/demos/lacaja/img/users/147860962510.jpg', 'participante', 'Gerente de Proyecto', 'La Caja', '123456789', '', 1, '2016-10-12 02:21:10'),
(11, 'jmignone', '596043', 'Jorge Mignone', '', 'Mignone@lacaja.com.ar', NULL, 'participante', 'CEO', 'CEO', NULL, '', 0, '2016-11-01 13:47:54'),
(12, 'fsuffern', 'cd2a34', 'Fabian Suffern', 'https://ar.linkedin.com/in/fabian-suffern-9389a223', 'Suffern@lacaja.com.ar', 'http://deltatech.com.ve/demos/lacaja/img/users/FABIAN_SUFFERN.jpg', 'participante', 'Dirección Comercial', 'Dirección Comercial', NULL, '', 0, '2016-11-01 13:48:32'),
(13, 'dwinograd', '9f8038', 'Denise Winograd', 'www.lacaja.com.ar', 'Winograd@lacaja.com.ar', 'http://deltatech.com.ve/demos/lacaja/img/users/1602200649image.jpg', 'participante', 'Comunicación Digital & Web', 'Dirección de Marketing & CE', '111111', '', 0, '2016-11-01 13:48:46'),
(14, 'lnardi', '1d1a14', 'Lorena Nardi', 'https://ar.linkedin.com/in/lorena-nardi-89585a1/es', 'Nardi@lacaja.com.ar', 'http://deltatech.com.ve/demos/lacaja/img/users/LORENA_NARDI.jpg', 'participante', 'Capacitación y Desarrollo', 'Dirección de Recursos Humanos', NULL, '', 0, '2016-11-01 13:50:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clues_assigned`
--
ALTER TABLE `clues_assigned`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_clue_user_idx` (`user_id`), ADD KEY `fk_clue_treasure_idx` (`clue_id`);

--
-- Indexes for table `clues_treasure`
--
ALTER TABLE `clues_treasure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_tokens`
--
ALTER TABLE `device_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_doc_event_idx` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_information`
--
ALTER TABLE `general_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_parameters`
--
ALTER TABLE `global_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections_visited`
--
ALTER TABLE `sections_visited`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_sect_user_idx` (`user_id`), ADD KEY `fk_sect_sectid_idx` (`section_id`);

--
-- Indexes for table `survey_answers`
--
ALTER TABLE `survey_answers`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_surv_question_idx` (`question_id`);

--
-- Indexes for table `survey_questions`
--
ALTER TABLE `survey_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_results`
--
ALTER TABLE `survey_results`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_surve_user_idx` (`user_id`), ADD KEY `fk_surve_answer_idx` (`answer_id`), ADD KEY `fk_survey_question_idx` (`question_id`);

--
-- Indexes for table `trivia_answers`
--
ALTER TABLE `trivia_answers`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_triv_questions_idx` (`question_id`);

--
-- Indexes for table `trivia_questions`
--
ALTER TABLE `trivia_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trivia_results`
--
ALTER TABLE `trivia_results`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_triv_answer_idx` (`answer_id`), ADD KEY `fk_triv_user_idx` (`user_id`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_app`
--
ALTER TABLE `users_app`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `clues_assigned`
--
ALTER TABLE `clues_assigned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clues_treasure`
--
ALTER TABLE `clues_treasure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10000;
--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `general_information`
--
ALTER TABLE `general_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `global_parameters`
--
ALTER TABLE `global_parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sections_visited`
--
ALTER TABLE `sections_visited`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `survey_answers`
--
ALTER TABLE `survey_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `survey_results`
--
ALTER TABLE `survey_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trivia_answers`
--
ALTER TABLE `trivia_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=232;
--
-- AUTO_INCREMENT for table `trivia_results`
--
ALTER TABLE `trivia_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_app`
--
ALTER TABLE `users_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clues_assigned`
--
ALTER TABLE `clues_assigned`
ADD CONSTRAINT `fk_clue_treasure` FOREIGN KEY (`clue_id`) REFERENCES `clues_treasure` (`id`),
ADD CONSTRAINT `fk_clue_user` FOREIGN KEY (`user_id`) REFERENCES `users_app` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
ADD CONSTRAINT `fk_doc_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sections_visited`
--
ALTER TABLE `sections_visited`
ADD CONSTRAINT `fk_sect_sectid` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_sect_user` FOREIGN KEY (`user_id`) REFERENCES `users_app` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_answers`
--
ALTER TABLE `survey_answers`
ADD CONSTRAINT `fk_survey_question` FOREIGN KEY (`question_id`) REFERENCES `survey_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_results`
--
ALTER TABLE `survey_results`
ADD CONSTRAINT `fk_surve_answer` FOREIGN KEY (`answer_id`) REFERENCES `survey_answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_surve_user` FOREIGN KEY (`user_id`) REFERENCES `users_app` (`id`);

--
-- Constraints for table `trivia_answers`
--
ALTER TABLE `trivia_answers`
ADD CONSTRAINT `fk_triv_quest` FOREIGN KEY (`question_id`) REFERENCES `trivia_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trivia_results`
--
ALTER TABLE `trivia_results`
ADD CONSTRAINT `fk_triv_answer` FOREIGN KEY (`answer_id`) REFERENCES `trivia_answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_triv_user` FOREIGN KEY (`user_id`) REFERENCES `users_app` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
