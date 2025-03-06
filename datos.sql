-- Insertar datos en la tabla Desarrolladores
INSERT INTO Desarrolladores (nombre, pais) VALUES
('Nintendo', 'Japón'),
('Ubisoft', 'Francia'),
('Bethesda', 'Estados Unidos'),
('Square Enix', 'Japón'),
('Rockstar Games', 'Estados Unidos');

-- Insertar datos en la tabla Juegos
INSERT INTO Juegos (nombre, genero, fecha_lanzamiento, id_desarrollador) VALUES
('The Legend of Zelda', 'Aventura', '2017-03-03', 1),
('Assassin\'s Creed', 'Acción', '2020-11-10', 2),
('Skyrim', 'RPG', '2011-11-11', 3),
('Final Fantasy XV', 'RPG', '2016-11-29', 4),
('Red Dead Redemption 2', 'Acción', '2018-10-26', 5);

-- Insertar datos en la tabla Reseñas
INSERT INTO Resenias (id_juego, puntuación, comentario, fecha) VALUES
(1, 95, 'Increíble aventura épica', '2023-03-15'),
(2, 85, 'Gran jugabilidad y gráficos', '2023-03-16'),
(3, 90, 'Un clásico atemporal', '2023-03-17'),
(4, 80, 'Historia envolvente y combates dinámicos', '2023-03-18'),
(5, 98, 'Narrativa y mundo abierto impecables', '2023-03-19');