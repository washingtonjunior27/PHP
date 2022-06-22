# SISTEMA DE LOGIN PHP

Cadastro e Login em PHP utilizando PDO.

# TELA DE LOGIN
![Screenshot](readme-imgs/login.png)

# TELA DE CADASTRO
![Screenshot](readme-imgs/register.png)

# HOME PAGE
![Screenshot](readme-imgs/home.png)

# TABELA UTILIZADA MYSQL
create database usuario;

create table usuarios(
    id integer primary key AUTO_INCREMENT,
    nome varchar(255) not null,
    email varchar(255) not null,
    senha varchar(225) not null
);
