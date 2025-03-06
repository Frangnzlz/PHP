-- Script para crear la base de datos y las tablas relacionales

CREATE DATABASE IF NOT EXISTS VideojuegosAPI;
USE VideojuegosAPI;

-- Tabla de Desarrolladores
CREATE TABLE Desarrolladores (
    id_desarrollador INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    pais VARCHAR(50) NOT NULL
);

-- Tabla de Juegos
CREATE TABLE Juegos (
    id_juego INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    fecha_lanzamiento DATE,
    id_desarrollador INT,
    FOREIGN KEY (id_desarrollador) REFERENCES Desarrolladores(id_desarrollador)
);

-- Tabla de Reseñas
CREATE TABLE Resenias (
    id_reseña INT AUTO_INCREMENT PRIMARY KEY,
    id_juego INT,
    puntuación INT,
    comentario VARCHAR(255),
    fecha DATE,
    FOREIGN KEY (id_juego) REFERENCES Juegos(id_juego)
);