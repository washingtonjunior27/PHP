<?php


if(!$_GET){
    $sql = "SELECT * FROM cursos";
    $con = mysqli_query($connect, $sql);
}else{
    $pesq = $_GET['pesq'];
    $sql = "SELECT * FROM cursos WHERE nome LIKE '%$pesq%' or id LIKE '%$pesq%'";
    $con = mysqli_query($connect, $sql);
}