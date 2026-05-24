-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2026 a las 21:08:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mi_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escritores`
--

CREATE TABLE `escritores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_nac` date NOT NULL,
  `origen` varchar(50) NOT NULL,
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `escritores`
--

INSERT INTO `escritores` (`id`, `nombre`, `descripcion`, `fecha_nac`, `origen`, `img`) VALUES
(1, 'Gabriel García Márquez', 'Escritor y periodista colombiano. Premio Nobel de Literatura 1982.Y TENIA BIGOTE', '1927-03-06', 'Colombia', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRS0QFwDEI1434u17oS33UAs2IiUkqEktri8g&s'),
(2, 'Jorge Luis Borges', 'Escritor, ensayista y poeta argentino.', '1899-08-24', 'Argentina', 'https://cleaver.cue.rsi.ch/public/rete-due/programmi/cultura/blu-come-unarancia/123567-a4kue3-Jorge-Luis-Borges-Keystone.JPG/alternates/r16x9/123567-a4kue3-Jorge-Luis-Borges-Keystone.JPG'),
(3, 'Isabel Allende', 'Escritora chilena, una de las autoras más leídas del mundo.', '1942-08-02', 'Chile', 'https://m.media-amazon.com/images/M/MV5BMjA0MjEyYTUtNDAxNi00YjY1LWI5NWItMWFhNmNmOGNkZjRmXkEyXkFqcGc@._V1_.jpg'),
(4, 'Adolfo Bioy Casares', 'Escritor argentino, autor de \"La invención de Morel\" y ganador del Premio Cervantes en 1990. Fue amigo y colaborador de Jorge Luis Borges.', '1914-09-15', 'Argentina', 'https://www.fcedu.uner.edu.ar/wp-content/uploads/2025/11/criticadestacado.webp'),
(5, 'Alejandra Pizarnik', 'Poetisa y traductora argentina, conocida por su obra poética intensa y de gran calidad lírica, influenciada por el surrealismo.', '1936-04-29', 'Argentina', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRX9lT-GorzzSH1966Zi2UHT5sZ6vzg_QysHw&s'),
(6, 'Alejo Carpentier', 'Novelista, ensayista y musicólogo cubano. Considerado uno de los fundadores del realismo mágico. Autor de \"El reino de este mundo\".', '1904-12-26', 'Cuba', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKYryNGLF0CzTfrrbb5Mh8WrkScVOCD3GFgA&s'),
(7, 'Alfonso Reyes', 'Escritor, poeta, ensayista y diplomático mexicano. Una de las figuras intelectuales más importantes de México en el siglo XX.', '1889-05-17', 'México', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSuJ8dn7XzzplvS1R9N1ofAxljGMRB9_pFZQ&s'),
(8, 'Alfredo Bryce Echenique', 'Novelista peruano, famoso por su estilo narrativo lleno de humor y por su novela \"Un mundo para Julius\".', '1939-02-19', 'Perú', NULL),
(9, 'Álvaro Mutis', 'Poeta y novelista colombiano, autor de la serie de novelas sobre el personaje Maqroll el Gaviero. Ganador del Premio Cervantes (2001).', '1923-08-25', 'Colombia', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQj8GcRbV0YiUrDnCg6XMDvVJk11xLFv9TvPA&s'),
(10, 'Amado Nervo', 'Poeta y escritor mexicano, perteneciente al movimiento modernista. Es uno de los poetas mexicanos más queridos por el público.', '1870-08-27', 'México', 'https://periodicodepoesia.unam.mx/wp-content/uploads/2025/09/Amado-Nervo.jpeg'),
(11, 'Andrés Caicedo', 'Escritor colombiano, autor de \"¡Que viva la música!\". Figura clave del contracultura en Cali, su obra refleja la vida urbana y juvenil.', '1951-09-29', 'Colombia', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRE1Uo_SR7u9J_jofkV67KIb2RC7PbCSBDoTA&s'),
(12, 'Arturo Uslar Pietri', 'Escritor, periodista, abogado y político venezolano. Figura fundamental de la literatura venezolana, autor de \"Las lanzas coloradas\".', '1906-05-16', 'Venezuela', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDL_3FGbuDtqgGlxBeYsy87Ruj8tpwtbgyBg&s'),
(13, 'Augusto Monterroso', 'Escritor guatemalteco, famoso por su cuento \"El dinosaurio\", considerado uno de los más breves de la literatura universal.', '1921-12-21', 'Guatemala', 'https://elintruso.com/img/articles/Monterroso.jpg'),
(14, 'Augusto Roa Bastos', 'Escritor, periodista y guionista paraguayo. Autor de \"Yo el Supremo\", una de las novelas más importantes del siglo XX.', '1917-06-13', 'Paraguay', 'https://www.lanacion.com.py/resizer/v2/https%3A%2F%2Fcloudfront-us-east-1.images.arcpublishing.com%2Flanacionpy%2FCVXJQS3Y2ZFIHB5TSCLRYMZP5Y.jpg?auth=c7cd42b9321a8fe70bf1131d0f0791650b6b0e7745d7cb578f9621132e3cfd9a&width=651&smart=true'),
(15, 'Carlos Drummond de Andrade', 'Poeta, escritor y farmacéutico brasileño. Considerado uno de los más grandes poetas de la literatura brasileña del siglo XX.', '1902-10-31', 'Brasil', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRih4WpoBm092vkBil02USNA8XKxoO0Tj598A&s'),
(16, 'Carlos Fuentes', 'Escritor, ensayista y diplomático mexicano. Autor de \"La región más transparente\" y \"La muerte de Artemio Cruz\".', '1928-11-11', 'México', NULL),
(17, 'César Vallejo', 'Poeta y escritor peruano. Es considerado uno de los grandes innovadores de la poesía del siglo XX.', '1892-03-16', 'Perú', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRldfqwpTUlETlaoc0dQDt9hNFilKxklTZEpw&s'),
(18, 'Ciro Alegría', 'Escritor, periodista y político peruano. Autor de \"El mundo es ancho y ajeno\", obra fundamental de la literatura indigenista.', '1909-11-04', 'Perú', NULL),
(19, 'Clarice Lispector', 'Escritora y periodista brasileña, autora de \"La hora de la estrella\". Su obra, de profunda introspección, es una de las más singulares.', '1920-12-10', 'Brasil', NULL),
(20, 'Dulce María Loynaz', 'Poeta y escritora cubana. Autora de \"Jardín\", obra poética de gran sensibilidad. Ganadora del Premio Cervantes en 1992.', '1902-12-10', 'Cuba', 'https://cdn.zendalibros.com/wp-content/uploads/2018/05/5-poemas-de-dulce-maria-loynaz.jpg'),
(21, 'Eduardo Galeano', 'Periodista y escritor uruguayo, autor de \"Las venas abiertas de América Latina\" y la trilogía \"Memoria del fuego\".', '1940-09-03', 'Uruguay', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShYkxbK1Mg76RCAZub3UmwA7W5zVIGVIoA2g&s'),
(22, 'Elena Garro', 'Escritora, guionista y periodista mexicana. Figura clave del realismo mágico, autora de \"Los recuerdos del porvenir\".', '1916-12-11', 'México', NULL),
(23, 'Ernesto Sábato', 'Escritor y físico argentino, autor de \"El túnel\" y \"Sobre héroes y tumbas\". Recibió el Premio Cervantes en 1984.', '1911-06-24', 'Argentina', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWnh1-rZkL57p_JwS4ixs26yHdNYhh11_dDQ&s'),
(24, 'Euclides de Cunha', 'Escritor, ingeniero, sociólogo y militar brasileño, autor de \"Los sertones\", obra fundamental del pensamiento brasileño.', '1866-01-20', 'Brasil', 'https://estaticos.opara.me/outraspalavras/uploads/2023/05/31213751/euclydes_da_cunha_1901213868-1024x613.jpg'),
(25, 'Felisberto Hernández', 'Escritor, periodista y pianista uruguayo. Autor de una obra narrativa inclasificable, de gran originalidad y sutileza.', '1902-10-20', 'Uruguay', 'https://letras-uruguay.espaciolatino.com/miras_sebastian/Felisberto%20Hernandez.jpg'),
(26, 'Fernando Ampuero', 'Escritor, periodista y dramaturgo peruano. Conocido por su estilo directo e irónico, fue un exponente del realismo sucio en Perú.', '1949-07-13', 'Perú', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7e7prLn2t37BXoGmlTno35LEn0KrGZHGjDA&s'),
(27, 'Fernando del Paso', 'Escritor, pintor y diplomático mexicano. Autor de la monumental novela \"Noticias del Imperio\".', '1935-04-01', 'México', NULL),
(28, 'Fernando Vallejo', 'Escritor, director de cine y biólogo colombiano. Autor de \"La virgen de los sicarios\" y ganador del Premio Cervantes 2023.', '1942-10-24', 'Colombia', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlZLoZNJdGk9q3UHjtg4zf8_rGhXw05J2uCA&s'),
(29, 'Francisco Coloane', 'Escritor chileno, autor de \"Tierra del Fuego\". Su obra narrativa está ambientada en los paisajes agrestes del sur de Chile.', '1910-07-19', 'Chile', NULL),
(30, 'Gabriela Mistral', 'Poetisa, diplomática y pedagoga chilena. Primera escritora latinoamericana en recibir el Premio Nobel de Literatura (1945).', '1889-04-07', 'Chile', 'https://cdnx.jumpseller.com/familias-y-apellidos/image/62421104/descarga__29_.jpg?1744476258'),
(31, 'Gonzalo Arango', 'Escritor, poeta y periodista colombiano. Fundador del movimiento nadaísta, una vanguardia artística y contracultural.', '1931-01-18', 'Colombia', NULL),
(32, 'Guillermo Cabrera Infante', 'Escritor, guionista y crítico de cine cubano. Autor de \"Tres tristes tigres\", una obra maestra del lenguaje y el humor.', '1929-04-22', 'Cuba', NULL),
(33, 'Horacio Quiroga', 'Cuentista, dramaturgo y poeta uruguayo. Maestro del cuento latinoamericano, sus relatos están marcados por la tragedia y la locura.', '1878-12-31', 'Uruguay', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjnUij5AFT6rnv4Nvd-y-_ybHni_Sord9wNuIYHt2UAfdVS2YuHI4AGdNIDcImIVxKnb0XxbBlbg2VubLsCvmYxYD6w2O64V6k5lG0zFPg2uaKpefH4g2Sr55ffqGlU-RHyTaZjxVC3RSzj/s1600/Horacio+Quiroga+7.jpg'),
(35, 'Jaime Sabines', 'Poeta y político mexicano. Es uno de los poetas mexicanos más leídos del siglo XX, conocido por su poesía sencilla y profunda.', '1926-03-25', 'México', NULL),
(36, 'Jaime Sáenz', 'Poeta, novelista y cronista boliviano. Figura central de la literatura boliviana del siglo XX, su obra explora el dolor y la experiencia límite.', '1921-10-08', 'Bolivia', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPb6lDldVryYxNbKnlccet73D6CeQ2cncgRg&s'),
(37, 'J.M. Machado de Assis', 'Escritor, poeta, dramaturgo y crítico brasileño. Fundador de la Academia Brasileña de Letras, autor de \"Memorias póstumas de Blas Cubas\".', '1839-06-21', 'Brasil', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Machado_de_Assis_aos_57_anos.jpg/960px-Machado_de_Assis_aos_57_anos.jpg'),
(38, 'Joao Guimaraes Rosa', 'Escritor, médico y diplomático brasileño. Autor de \"Grande Sertón: Veredas\", una de las obras cumbre de la literatura universal.', '1908-06-27', 'Brasil', NULL),
(39, 'Joaquín García Monge', 'Escritor, crítico literario y editor costarricense. Figura central de la cultura costarricense del siglo XX.', '1881-01-20', 'Costa Rica', 'https://assets.isu.pub/document-structure/230119163853-0fa079ec1c87a0d5a3eb63c9d1bec20e/v1/e006ced5353c4e8f0124c91da5ee4707.jpeg'),
(40, 'Jorge Amado', 'Escritor, periodista y político brasileño. Autor de \"Capitanes de la arena\" y \"Doña Flor y sus dos maridos\".', '1912-08-10', 'Brasil', NULL),
(41, 'Jorge Icaza', 'Jorge Icaza Coronel fue un novelista ecuatoriano. Se graduó en la Universidad Central del Ecuador y luego trabajó en Colombia como escritor y director teatral.', '1906-07-10', 'Ecuador', 'https://www.biografiasyvidas.com/biografia/i/fotos/icaza_jorge.jpg'),
(42, 'José Asunción Silva', 'Poeta colombiano, precursor del modernismo en América Latina. Su poesía es reconocida por su musicalidad y melancolía.', '1865-11-27', 'Colombia', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEx9ROPnEavE-gy4zi5fsQiLFcNbMedHxciA&s'),
(43, 'José Donoso', 'Escritor y periodista chileno, autor de \"El obsceno pájaro de la noche\". Figura clave del Boom latinoamericano.', '1924-10-05', 'Chile', NULL),
(44, 'José Emilio Pacheco', 'Poeta, ensayista y traductor mexicano. Autor de \"Las batallas en el desierto\" y ganador del Premio Cervantes en 2009.', '1939-06-30', 'México', NULL),
(45, 'José Hernández', 'Poeta, periodista y político argentino. Autor del poema narrativo \"Martín Fierro\", obra cumbre de la literatura gauchesca. y mucho mas', '1834-11-10', 'Argentina', 'https://www.revisionistas.com.ar/wp-content/uploads/2008/09/Jos%C3%A9-Hern%C3%A1ndez.jpg'),
(46, 'José Lezama Lima', 'Escritor, poeta y ensayista cubano. Autor de la novela \"Paradiso\", una de las más complejas y originales de la lengua española.', '1910-12-19', 'Cuba', NULL),
(47, 'José María Arguedas', 'Escritor, poeta, antropólogo y etnólogo peruano. Figura central de la literatura indigenista, autor de \"Los ríos profundos\".', '1911-01-18', 'Perú', NULL),
(48, 'José María Vargas Vila', 'Escritor, periodista y político colombiano. Su obra, polémica y anticlerical, tuvo gran influencia en la América de su tiempo.', '1860-06-23', 'Colombia', 'https://www.biografiasyvidas.com/biografia/v/fotos/vargas_vila.jpg'),
(49, 'José Martí', 'Poeta, escritor, periodista, filósofo y político cubano. Héroe nacional de Cuba y figura clave de la independencia hispanoamericana.', '1853-01-28', 'Cuba', 'https://archivo.prensa-latina.cu/wp-content/uploads/2023/01/Jose-Marti-3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `anio` year(4) DEFAULT NULL,
  `autor` int(11) DEFAULT NULL,
  `genero` varchar(50) NOT NULL,
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `sinopsis`, `anio`, `autor`, `genero`, `img`) VALUES
(4, 'El Aleph', 'Relatos donde Borges explora el infinito, la memoria y la eternidad. El cuento que da título al libro describe un punto que contiene todos los puntos del universo.', '1949', 2, 'Cuento Fantastico', 'https://auladefilosofia.net/wp-content/uploads/2008/10/81heutjzxnl.jpg'),
(6, 'Crónica de una muerte anunciada', 'Relato sobre el asesinato de Santiago Nasar en un pueblo caribeño.', '1981', 1, 'narrativo', 'https://cortazar.com.ar/wp-content/uploads/2024/08/xIeZbhiMpS1N258a6ucB9fYw8Kk3o67yClrFxl0q.webp'),
(7, 'El coronel no tiene quien le escriba', 'La espera de un viejo coronel por una pensión que nunca llega.', '1961', 1, 'Novela breve', 'https://images.cdn2.buscalibre.com/fit-in/360x360/3c/f4/3cf4507c29fc31bf38347cb469e6f32a.jpg'),
(8, 'El informe de Brodie', 'Colección de cuentos con un estilo más directo y realista.', '1970', 2, 'Cuentos', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTx1FIaWKp-G2k0LO9tolsNoMatF4846pdqKQ&s'),
(11, 'Paula', 'Relato autobiográfico dedicado a su hija enferma.', '1994', 3, '', NULL),
(12, 'La Casa De Asterion', 'libro sobre la historia mitica de un ser', '1947', 2, 'Ficcion', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOWfGMeLY30h51PpW2hBsN3Fd5rbMidjjU0Q&s'),
(13, 'Cien años de soledad', 'Historia de la    familia Buendía a lo largo de siete generaciones en el pueblo ficticio de Macondo. Una obra maestra del realismo mágico que narra el destino marcado por la soledad y los amores prohibidos.', '1967', 1, 'Realismo mágico', 'https://www.edicontinente.com.ar/image/titulos/9788466379717.jpg'),
(14, 'El amor en los tiempos del cólera', 'Florentino Ariza espera más de medio siglo a su amada Fermina Daza. Una historia de amor eterno que desafía el paso del tiempo, la vejez y las convenciones sociales.', '1985', 1, 'Novela romántica', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT50aEa2kZwqkBNe1bWs48rUpB-V-QbJBZOtw&s'),
(16, 'Ficciones', 'Colección de cuentos que exploran laberintos, bibliotecas infinitas, realidades alternativas y paradojas temporales. Una obra fundamental de la literatura fantástica universal.', '1944', 2, 'Cuento fantástico', NULL),
(18, 'El libro de arena', 'Cuentos sobre objetos infinitos y paradojas matemáticas. El libro de arena es un volumen de páginas infinitas que nadie puede terminar de leer.', '1975', 2, 'Cuento fantástico', 'https://ecx.images-amazon.com/images/I/41XuF17Y93L.jpg'),
(19, 'La casa de los espíritus', 'narra la épica saga de cuatro generaciones de la poderosa familia Trueba. La historia mezcla el realismo mágico con el convulso contexto político y social de un país latinoamericano (claramente inspirado en Chile) durante el siglo XX.', '1982', 3, 'Realismo mágico', 'https://images.cdn1.buscalibre.com/fit-in/360x360/15/ee/15ee29bdb3c45283fd7cb3cd347b75d4.jpg'),
(20, 'Eva Luna', ', publicada por Isabel Allende en 1987, es una novela de realismo mágico y formación que narra la vida de una joven huérfana latinoamericana. Dotada de una imaginación desbordante y un don natural para contar historias, se convierte en una \"ladrona de historias\" que utiliza la narrativa para sobrevivir y forjar su propio destino en un continente marcado por la agitación política y social.', '1987', 3, 'Novela', 'https://images.cdn3.buscalibre.com/fit-in/360x360/53/d0/53d06f5ec482754a7913510100051684.jpg'),
(21, 'Paula', 'Carta autobiográfica escrita por Allende para su hija enferma. Un testimonio desgarrador sobre el dolor, la memoria y el amor maternal ante la pérdida.', '1994', 3, 'Autobiografía', NULL),
(22, 'La invención de Morel', 'Un fugitivo en una isla desierta descubre una máquina que reproduce la realidad. Una novela breve sobre la soledad, el amor y la eternidad que fascinó a Borges.', '1940', 4, 'Ciencia ficción', 'https://http2.mlstatic.com/D_NQ_NP_738729-MLA89288921179_082025-O.webp'),
(23, 'El sueño de los héroes', 'Un joven en Buenos Aires revive una noche de carnaval que cambió su vida. Realidad y ficción se mezclan en esta exploración del tiempo y la identidad.', '1954', 4, 'Novela fantástica', 'https://upload.wikimedia.org/wikipedia/commons/6/6e/El_sue%C3%B1o_de_los_h%C3%A9roes.jpg'),
(24, 'La condesa sangrienta', 'Relato inspirado en Erzsébet Báthory, la condesa que asesinaba vírgenes. Una prosa poética que explora la violencia, la locura y la obsesión desde la belleza.', '1971', 5, 'Narrativa poética', 'https://libroschorcha.wordpress.com/wp-content/uploads/2018/04/la-condesa-sangrienta-alejandra-pizarnik.jpg?w=640'),
(25, 'Árbol de Diana', 'Colección de poemas donde la autora explora la soledad, el silencio y la muerte. Una poesía intensa y profunda marcada por la búsqueda de identidad.', '1962', 5, 'Poesía', 'https://m.media-amazon.com/images/S/compressed.photo.goodreads.com/books/1343735887i/15779049.jpg'),
(26, 'El reino de este mundo', 'Historia de la independencia de Haití vista desde la cosmovisión mágica de sus protagonistas. Obra fundacional del realismo mágico y lo real maravilloso.', '1949', 6, 'Realismo mágico', 'https://m.media-amazon.com/images/I/51JNTzSbkbL._AC_UF1000,1000_QL80_.jpg'),
(27, 'Los pasos perdidos', 'Un músico viaja a la selva sudamericana en busca de instrumentos primitivos. Una reflexión sobre el tiempo, la civilización y el paraíso perdido.', '1953', 6, 'Novela filosófica', 'https://image.cdn1.buscalibre.com/5b579c97f4df73723e8b4567.RS500x500.jpg'),
(28, 'Visión de Anáhuac', 'Ensayo poético sobre el pasado prehispánico de México. Una elegía al valle de México y sus lagunas, considerada una de las cimas de la prosa mexicana.', '1917', 7, 'Ensayo lírico', 'https://assets.lectulandia.com/b/ab/Alfonso%20Reyes/Vision%20de%20Anahuac%20y%20otros%20ensayos%20(1)/big.jpg'),
(29, 'Un mundo para Julius', 'La infancia de un niño de clase alta en la Lima de los años cincuenta. Una crítica a la aristocracia peruana desde la mirada inocente y triste del pequeño Julius.', '1970', 8, 'Novela social', NULL),
(30, 'La nieve del almirante', 'La historia gira en torno a Maqroll el Gaviero (personaje central), quien debe decidir entre dos destinos irreconciliables: permanecer junto a Flor Estévez (su amor ideal e idealizado) o partir en pos de los aserraderos.', '1986', 9, 'Novela de aventuras', 'https://elemblob.blob.core.windows.net/media/p20131222-152726536a469c1249a_300h.jpg'),
(31, 'Plenitud', 'Colección de prosas poéticas que ofrecen una filosofía de vida serena y optimista. Un libro de sabiduría espiritual que reflexiona sobre el amor y la felicidad.', '1918', 10, 'Prosa poética', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEuWs6SZBtAb6lIIj4xCrFNMUiYgHhBhqSEw&s'),
(32, '¡Que viva la música!', 'Una joven caleña se sumerge en la noche de salsa, drogas y sexo. Retrato vibrante y trágico de la juventud de los setenta en Cali.', '1977', 11, 'Novela urbana', 'https://http2.mlstatic.com/D_NQ_NP_821033-MLC49344905238_032022-O.webp'),
(33, 'Las lanzas coloradas', 'Novela histórica sobre la independencia de Venezuela. El personaje de un esclavo fiel a su amo español representa el drama de la guerra emancipadora.', '1931', 12, 'Novela histórica', 'https://revistamaquinacombinatoria.wordpress.com/wp-content/uploads/2021/02/lanzascoloradas.jpg?w=720'),
(34, 'La oveja negra y demás fábulas', 'Colección de fábulas breves y sorprendentes. Incluye el famoso cuento \"El dinosaurio\": \"Cuando despertó, el dinosaurio todavía estaba allí\".', '1969', 13, 'Fábula', 'https://m.media-amazon.com/images/I/81h2yoIcGzL._UF1000,1000_QL80_.jpg'),
(35, 'Yo el Supremo', 'Monólogo del dictador perpetuo del Paraguay, el Dr. Francia. Una obra maestra sobre el poder absoluto y la soledad del tirano en América Latina.', '1974', 14, 'Novela dictatorial', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2TQASeK0cTaeM1uoss2_KZfXa9NsnNsJfeA&s'),
(36, 'Alguna poesía', 'Primer libro del poeta brasileño. Presenta su voz única que mezcla lo cotidiano con lo universal, la ironía con la ternura y lo local con lo eterno.', '1930', 15, 'Poesía', 'https://http2.mlstatic.com/D_NQ_NP_942875-MLU69392643121_052023-O.webp'),
(37, 'La región más transparente', 'Novela fundacional del Boom latinoamericano. Un retrato de la Ciudad de México a través de múltiples voces que buscan su identidad en el caos urbano.', '1958', 16, 'Novela urbana', NULL),
(38, 'La muerte de Artemio Cruz', 'Un poderoso político mexicano repasa su vida en su lecho de muerte. Memoria, traición y corrupción en el México posrevolucionario narrado con técnica innovadora.', '1962', 16, 'Novela política', NULL),
(39, 'Los heraldos negros', 'Primer poemario de Vallejo donde ya aparece su voz única. Poemas que exploran el dolor existencial, la muerte y la angustia con un lenguaje revolucionario.', '1919', 17, 'Poesía', 'https://images.cdn1.buscalibre.com/fit-in/360x360/f1/10/f11012fe81893b0b94372ae7330e9d9e.jpg'),
(40, 'Trilce', 'Obra cumbre de la poesía vanguardista en español. Lenguaje roto, sintaxis alterada y temas universales convierten este libro en un desafío perpetuo.', '1922', 17, 'Poesía vanguardista', 'https://www.cervantesvirtual.com/portadas/123/1233964/Cover.jpg'),
(41, 'El mundo es ancho y ajeno', 'Novela indigenista que narra la lucha de una comunidad indígena por su tierra. Obra fundamental sobre la explotación y resistencia en los Andes peruanos.', '1941', 18, 'Novela indigenista', NULL),
(42, 'La hora de la estrella', 'Última novela de la autora. Una joven nordestina en Río de Janeiro es narrada por un escritor. Pobreza, soledad y el instante de la muerte como revelación.', '1977', 19, 'Novela filosófica', NULL),
(43, 'Jardín', 'Novela lírica donde una mujer pasea por su jardín y recuerda su vida. Amor, muerte y naturaleza se funden en una prosa poética de gran sensibilidad.', '1951', 20, 'Novela lírica', 'https://m.media-amazon.com/images/S/compressed.photo.goodreads.com/books/1357611219i/17226378.jpg'),
(44, 'Las venas abiertas de América Latina', 'Crónica de la explotación de América Latina desde la conquista hasta hoy. Un ensayo polémico y apasionado sobre el saqueo de los recursos del continente.', '1971', 21, 'Ensayo histórico', 'https://http2.mlstatic.com/D_NQ_NP_954182-MLA81984440191_012025-O.webp'),
(45, 'Memoria del fuego (Trilogía)', 'Historia de América Latina contada a través de viñetas breves. Una obra monumental que mezcla crónica, mito y poesía en un mosaico fascinante.', '1982', 21, 'Crónica histórica', 'https://http2.mlstatic.com/D_NQ_NP_995839-MLA31295611983_072019-O.webp'),
(46, 'Los recuerdos del porvenir', 'Un pueblo mexicano narra su historia mientras los recuerdos se mezclan con el presente. Realismo mágico y denuncia política en la Guerra Cristera.', '1963', 22, 'Realismo mágico', NULL),
(47, 'El túnel', 'Un pintor asesina a su amante y narra los motivos. Novela existencial sobre la incomunicación, los celos y la imposibilidad del amor verdadero.', '1948', 23, 'Novela psicológica', 'https://m.media-amazon.com/images/I/71I6svTmnpL._AC_UF1000,1000_QL80_.jpg'),
(48, 'Sobre héroes y tumbas', 'Obra cumbre de Sábato donde se entremezclan historia, locura y mística. Incluye el célebre \"Informe sobre ciegos\", un descenso a la locura.', '1961', 23, 'Novela existencial', 'https://m.media-amazon.com/images/S/compressed.photo.goodreads.com/books/1322161433i/1677.jpg'),
(49, 'Los sertones', 'Crónica de la Guerra de Canudos en el interior de Brasil. Una obra fundamental que mezcla periodismo, geografía, sociología y literatura sobre el Brasil profundo.', '1902', 24, 'Crónica periodística', 'https://libreria.clacso.org/images/books/1781_Tapa.gif'),
(50, 'Nadie encendía las lámparas', 'Cuentos donde objetos cotidianos adquieren vida propia. Un mundo onírico y sutil donde el recuerdo, la música y los sueños se confunden con la realidad.', '1947', 25, 'Cuento fantástico', 'https://pictures.abebooks.com/inventory/14622208001_2.jpg'),
(51, 'Nuestra América', 'Un ensayo  político fundamental que analiza la identidad, la cultura y la independencia de los pueblos latinoamericanos frente al imperialismo.', '1981', 49, 'Ensayo Filosófico', 'https://i.calameoassets.com/110526224615-3cc1e36561a9e2f98abd89db18155124/large.jpg'),
(52, 'Huasipungo', 'refleja el sufrimiento de los indígenas huasipungueros ante los maltratos de los mestizos, los latifundistas, la Iglesia y el poder político', '1934', 41, 'Novela Indigenista', 'https://images.cdn1.buscalibre.com/fit-in/360x360/07/7e/077e170bf8307c5a69cade63edbc4ce7.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','user') DEFAULT 'user',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `rol`, `email`) VALUES
(8, 'webadmin', '$2y$10$tyjxld31pH49us/2x4iy9usYgEiFR/396T6aOUB.5aCaqG9XFd042', 'admin', 'admin@test0.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `escritores`
--
ALTER TABLE `escritores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `escritores`
--
ALTER TABLE `escritores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `escritores` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
