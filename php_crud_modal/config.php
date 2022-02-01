<?php

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'cursos';

$connect = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if(!$connect){
    echo "Erro ao acessar banco de dados";
}