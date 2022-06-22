<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'usuario';

try{
    $pdo = new PDO("mysql: host=$host; dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Erro ao acessar PDO - ".$e->getMessage();
}catch(Exception $e){
    echo "Erro no banco de dados - ".$e->getMessage();
}