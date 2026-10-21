CREATE DATABASE IF NOT EXISTS cineflix CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cineflix;

CREATE TABLE IF NOT EXISTS filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    ano INT NOT NULL,
    genero VARCHAR(80) NOT NULL,
    nota DECIMAL(3,1) NOT NULL,
    sinopse TEXT
);

INSERT INTO filmes (titulo, ano, genero, nota, sinopse) VALUES
('Interestelar', 2014, 'Ficção científica', 8.7, 'Uma equipe viaja pelo espaço em busca de um novo lar para a humanidade.'),
('Titanic', 1997, 'Romance', 8.0, 'Uma história de amor durante a viagem do famoso navio.'),
('Vingadores: Ultimato', 2019, 'Ação', 8.4, 'Os heróis enfrentam as consequências de uma grande batalha.'),
('Harry Potter e a Pedra Filosofal', 2001, 'Fantasia', 7.6, 'Um jovem descobre que pertence ao mundo da magia.');