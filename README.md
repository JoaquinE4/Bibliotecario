# Sistema de Gestión de Biblioteca

# Integrante

    jbackend0@gmail.com

## Descripción

Sistema web desarrollado en PHP con arquitectura MVC para la gestión de una biblioteca. Permite administrar escritores, libros y usuarios con un sistema de autenticación y roles diferenciados (administrador/usuario).

## Modelo de datos

### Diagrama Entidad-Relación (DER)

![Diagrama Entidad-Relación](Esquema_de_relacion.jpg)

### Relaciones

- Un **Escritor** puede tener **muchos Libros** (relación 1:N)
- Un **Libro** pertenece a un **Escritor** (relación N:1)
- **Usuarios** son independientes con roles para permisos

## URLs

### Públicas

- `/home` - Página principal
- `/escritores` - Ver todos los escritores
- `/escritor/:id` - Ver detalle del escritor
- `/libros` - Ver todos los libros
- `/libro/:id` - Ver detalle del libro
- `/login` - Iniciar sesión
- `/registro` - Registrarse
- `/logout` - Cerrar sesión

### Administrador

- `/escritor/nuevo` - Crear escritor
- `/escritor/editar/:id` - Editar escritor
- `/escritor/eliminar/:id` - Eliminar escritor
- `/libro/nuevo` - Crear libro
- `/libro/editar/:id` - Editar libro
- `/libro/eliminar/:id` - Eliminar libro
- `/usuarios` - Ver todos los usuarios
- `/usuario/nuevo` - Crear usuario
- `/usuario/eliminar/:id` - Eliminar usuario

### Script SQL

```sql
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2026 a las 00:30:59
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
  `origen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `escritores`
--

INSERT INTO `escritores` (`id`, `nombre`, `descripcion`, `fecha_nac`, `origen`) VALUES
(1, 'Gabriel García Márquez', 'Escritor y periodista colombiano. Premio Nobel de Literatura 1982.', '1927-03-06', 'Colombia'),
(2, 'Jorge Luis Borges', 'Escritor, ensayista y poeta argentino.', '1899-08-24', 'Argentina'),
(3, 'Isabel Allende', 'Escritora chilena, una de las autoras más leídas del mundo.', '1942-08-02', 'Chile');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `anio` year(4) DEFAULT NULL,
  `autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `sinopsis`, `anio`, `autor`) VALUES
(2, 'El amor en los tiempos del cólera', 'Historia de amor entre Florentino Ariza y Fermina Daza.', '1985', 1),
(3, 'Ficciones', 'Colección de cuentos fantásticos.', '1944', 2),
(4, 'El Aleph', 'Colección de cuentos breves.', '1949', 2),
(5, 'La casa de los espíritus', 'Novela que narra la historia de la familia Trueba.', '1982', 3),
(6, 'Crónica de una muerte anunciada', 'Relato sobre el asesinato de Santiago Nasar en un pueblo caribeño.', '1981', 1),
(7, 'El coronel no tiene quien le escriba', 'La espera de un viejo coronel por una pensión que nunca llega.', '1961', 1),
(8, 'El informe de Brodie', 'Colección de cuentos con un estilo más directo y realista.', '1970', 2),
(9, 'El libro de arena', 'Cuentos sobre objetos infinitos y paradojas matemáticas.', '1975', 2),
(10, 'Eva Luna', 'La historia de una mujer que se gana la vida contando cuentos.', '1987', 3),
(11, 'Paula', 'Relato autobiográfico dedicado a su hija enferma.', '1994', 3);

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
(2, 'admin', '$2y$10$Vllsz.oIdJ88DLYKlOUcXObxdHNIzBRG2uSmqDL1VzQ2Nueaqcpm6', 'admin', 'admin@test.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
```
