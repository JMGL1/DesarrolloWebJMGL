-- ============================================================
--  Base de datos: bd_biblioteca
--  Materia: Tecnología y Desarrollo Web – SIS 256
--  Semestre 1-2026
-- ============================================================

-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS bd_biblioteca
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE bd_biblioteca;

-- ============================================================
--  Tabla: libros
-- ============================================================
DROP TABLE IF EXISTS libros;

CREATE TABLE libros (
  id        INT          NOT NULL AUTO_INCREMENT,
  titulo    VARCHAR(255) NOT NULL,
  autor     VARCHAR(150) NOT NULL,
  anio      YEAR         NOT NULL,
  editorial VARCHAR(150) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
--  Datos de ejemplo
-- ============================================================
INSERT INTO libros (titulo, autor, anio, editorial) VALUES
  ('Introducción a la Informática',      'Michael Miller',    2015, 'Pearson'),
  ('Arquitectura de Computadoras',       'Patricio Quiroga',  2010, 'Alfaomega'),
  ('Programación en PHP',                'Luke Welling',      2018, 'Anaya'),
  ('Diseño Web con HTML5 y CSS3',        'Jon Duckett',       2019, 'Wiley'),
  ('Base de Datos con MySQL',            'Paul DuBois',       2016, 'Pearson'),
  ('JavaScript: The Good Parts',        'Douglas Crockford', 2008, "O'Reilly"),
  ('El Arte de Programar Computadoras', 'Donald Knuth',      2011, 'Addison-Wesley');
