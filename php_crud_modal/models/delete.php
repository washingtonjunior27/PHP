<?php
    require_once "../config.php";

    if(isset($_POST['delete-submit'])){
        $id = mysqli_escape_string($connect, $_POST['id']);~

        $sql = "DELETE FROM cursos WHERE id = '$id'";
        $con = mysqli_query($connect, $sql);

        if($con){
            header("location: ../index.php");
        }
    }
?>