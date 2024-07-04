<?php 
session_start();

if(isset($_POST["cpf"]) && isset($_POST["senha"])){
    $login_user = $_POST["cpf"];
    $senha_user = $_POST["senha"];
    
     //!(nega)Verifica se os campos estão vazios
    if(!(empty($login_user) || empty($senha_user))) {
        require_once("../Data/conexao.php");

        // Evitar SQL Injection utilizando prepared statements
        $sql = "SELECT * FROM cadastrocandidato WHERE cpf = ? AND senha = ?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $login_user, $senha_user);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($res) == 0) {
            session_destroy();
            echo "<script>alert('Login incorreto!'); window.location='./login.php';</script>";
            exit;
        } else {
            // Iniciar sessão e redirecionar para a página restrita
            $_SESSION["login_user"] = $login_user; // Armazenar apenas o login na sessão
            header("Location: ./user.php");
            exit;
        }
    } else { 
        session_destroy();
        echo "Você não efetuou o login!";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loggin- Tema Azul</title>
    <link rel="stylesheet" href="../Data/CascadingLogCad.css">
    <script src="../Data/Validate.js"></script>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>

                <input type="password" id="senhasenha" name="senha" onkeyup="verify" required>
                <div id="incSenha" class="error-message"></div>
            </div>

            <div class="form-group">
                <button type="submit" value="Entrar">Login</button>
            </div>

            <a href="./cadastro.php">Ainda não tem um cadastro? cadastre-se</a>
        </form>
    </div>
</body>

</html>