<?php
    require_once 'config.php';

    if (isset($_POST['login'])) {
        $email = htmlentities(addslashes($_POST['email']));
        $senha = htmlentities(addslashes($_POST['senha']));
        if(!empty($email) && !empty($senha)){
            $cmd = "SELECT * FROM usuarios WHERE email = :e AND senha = :s";
            $stmt = $pdo->prepare($cmd);
            $stmt->bindValue(":e", $email);
            $stmt->bindValue(":s", $senha);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $dados = $stmt->fetch();
                session_start();
                $_SESSION['id_user'] = $dados['id'];
                header("location: home.php");
            }else{
                $erro[] = "Email e/ou senha incorretos!";
            }
        }else{
            $erro[] = "Preencha os campos vazios!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-auto bg-dark text-light p-4 rounded">
                <form method="POST">
                    <div class="text-center mb-3">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <?php
                    if (!empty($erro)) {
                        foreach ($erro as $erros) {
                            echo "<div class='container alert alert-danger alert-dismissible fade show'>
                                            $erros
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                        }
                    }
                    ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="login" id="btn-login" class="btn btn-primary mb-3">Entrar</button>
                    <div class="form-group text-center">
                        <a class="text-center text-light text-decoration-none" href="register.php"> Não possui uma conta? <strong class="text-primary">Cadastre-se</strong></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>