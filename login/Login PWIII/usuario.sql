Create database usuario;
use usuario;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment primary key,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
