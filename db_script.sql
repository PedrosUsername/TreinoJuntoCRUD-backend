CREATE DATABASE tjdb2;

USE tjdb2;

CREATE TABLE clientes (
 	id int not null auto_increment,
 	usuario varchar(255),
 	senha varchar(255),
 	cep varchar(255),
 	cidade varchar(255),
 	primary key(id)
);

