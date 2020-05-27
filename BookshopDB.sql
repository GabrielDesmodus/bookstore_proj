CREATE DATABASE IF NOT EXISTS `bookshop_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bookshop_db`;

CREATE TABLE IF NOT EXISTS `livros_tb`(
    `CODIGO` int NOT NULL AUTO_INCREMENT,
    `NOME` varchar(40) NOT NULL,
    `GENERO` varchar(25) NOT NULL,
    `DATA` date NOT NULL,
    `IDIOMA` varchar(25) NOT NULL,    
    `FOTO` varchar(50) NOT NULL,
    `PRECO` float NOT NULL,
    PRIMARY KEY (`CODIGO`)
)DEFAULT CHARSET=utf8;

INSERT INTO `livros_tb` (`CODIGO`, `NOME`, `GENERO`, `DATA`, `IDIOMA`, `FOTO`, `PRECO`) VALUES
(1, 'Bushido The Soul of Japan', 'Filosofia', '1899-01-01', 'Japonês', 'Imagens/Fotos/bushido.jpg', 50),
(2, 'Der Zauberberg', 'Suspense', '1924-01-01', 'Alemão', 'Imagens/Fotos/der.jpg', 40),
(3, 'Distancia de Rescate', 'Terror', '2014-01-01', 'Espanhol', 'Imagens/Fotos/distancia.jpg', 60),
(4, 'Dom Quixote', 'Romance', '1605-01-16', 'Espanhol', 'Imagens/Fotos/dom.jpg', 30),
(5, 'Dracula', 'Suspense', '1897-05-26', 'Inglês', 'Imagens/Fotos/dracula.jpg', 70),
(6, 'Ich werde dein Herz essen', 'Terror', '1990-01-01', 'Alemão', 'Imagens/Fotos/ichwerde.jpg', 35),
(7, 'All you need is Kill', 'Romance', '2004-12-18', 'Japonês', 'Imagens/Fotos/kill.png', 25),
(8, 'Lord of the Rings', 'Romance', '1954-06-29', 'Inglês', 'Imagens/Fotos/lord.jpg', 100),
(9, 'Pet Semetary', 'Terror', '1983-11-14', 'Inglês', 'Imagens/Fotos/pet.jpg', 60),
(10, 'Ringu', 'Terror', '1991-05-01', 'Japonês', 'Imagens/Fotos/ringu.jpg', 75),
(11, 'Sherlock Holmes', 'Suspense', '1902-01-01', 'Inglês', 'Imagens/Fotos/sherlock.jpg', 50),
(12, 'The Writing of Thomas Jefferson', 'Filosofia', '1805-01-01', 'Inglês', 'Imagens/Fotos/Thomas.jpg', 25),
(13, 'Thus Spoke Zarathustra', 'Filosofia', '1883-01-01', 'Alemão', 'Imagens/Fotos/thus.jpg', 125);

CREATE USER IF NOT EXISTS 'aluno'@'localhost' IDENTIFIED BY 'aluno';

GRANT ALL PRIVILEGES ON `bookshop_db` . * TO 'aluno'@'localhost';