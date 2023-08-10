CREATE DATABASE login_modular;
USE login_modular;
CREATE TABLE usuarios(
    id int primary key auto_increment,
    email varchar(100),
    senha varchar(32),
    nivel int
)