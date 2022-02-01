<?php
require_once "../config.php";

if (isset($_POST['edit-submit'])) {
    $id = mysqli_escape_string($connect, $_POST['id']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $descricao = mysqli_escape_string($connect, $_POST['descricao']);

    $sql = "UPDATE cursos SET nome = '$nome', descricao = '$descricao' 
        WHERE id = '$id'";
    $con = mysqli_query($connect, $sql);

    if ($con) {
        header("location: ../index.php");
    }
}
?>