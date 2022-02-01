<?php
require_once "config.php";

if (isset($_POST['submit'])) {
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $descricao = mysqli_escape_string($connect, $_POST['descricao']);

    $sql = "INSERT INTO cursos (nome, descricao) VALUES ('$nome', '$descricao')";
    $con = mysqli_query($connect, $sql);

    if ($con) {
        header("location: index.php");
    }
}
?>

<!-- CREATE Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" autocomplete="off" class="form-control" id="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" style="height: 150px"></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Cadastrar">
                    <button type="button" class="btn btn-secondary my-3" data-bs-dismiss="modal">Fechar</button>
                </form>
            </div>
        </div>
    </div>
</div>