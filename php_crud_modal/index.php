<?php
require_once "config.php";
require_once "includes/header.php";
require_once "models/create.php";
require_once "models/read.php";
?>

<div class="container">
    <table class="table my-5">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col" colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($con) > 0) {
                while ($result = mysqli_fetch_array($con)) {
            ?>
                    <tr>
                        <th scope="row"><?php echo $result['id']; ?></th>
                        <td><?php echo $result['nome']; ?></td>
                        <td>
                            <!-- BUTTONS DE MODAL -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#visuModal<?php echo $result['id']; ?>">
                                Visualizar
                            </button>

                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $result['id']; ?>">
                                Editar
                            </button>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $result['id']; ?>">
                                Excluir
                            </button>
                        </td>
                    </tr>

                    <!-- VIEW Modal -->
                    <div class="modal fade" id="visuModal<?php echo $result['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $result['nome']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><?php echo $result['id']; ?></p>
                                    <p><?php echo $result['nome']; ?></p>
                                    <p><?php echo $result['descricao']; ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- UPDATE Modal -->
                    <div class="modal fade" id="editModal<?php echo $result['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $result['nome']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="models/update.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" name="nome" autocomplete="off" class="form-control" id="nome" value="<?php echo $result['nome'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="descricao" class="form-label">Descrição</label>
                                            <textarea class="form-control" name="descricao" id="descricao" style="height: 150px"><?= $result['descricao'] ?></textarea>
                                        </div>
                                        <input type="submit" name="edit-submit" class="btn btn-primary" value="Atualizar">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DELETE Modal -->
                    <div class="modal fade" id="deleteModal<?php echo $result['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $result['nome']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem certeza que deseja excluir <?= $result['nome'] ?>?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="models/delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
                                        <input type="submit" name="delete-submit" class="btn btn-danger" value="Excluir">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>Nenhum curso cadastrado</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php require_once "includes/footer.php" ?>