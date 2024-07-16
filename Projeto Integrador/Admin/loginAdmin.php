<?php
session_start();

if (isset($_POST["usuario"]) && isset($_POST["senha"])) {
    $login_user = $_POST["usuario"];
    $senha_user = $_POST["senha"];

    // Verifica se os campos estão vazios
    if (!(empty($login_user) || empty($senha_user))) {
        require_once("../Data/conexao.php");

        // Evitar SQL Injection utilizando prepared statements
        $sql = "SELECT * FROM loginadmin WHERE user = ? AND pass = ?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $login_user, $senha_user);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) == 0) {
            session_destroy();
            echo "<script>alert('Login incorreto!'); window.location='./loginAdmin.php';</script>";
            exit;
        } else {
            // Obtém o ID do administrador
            $row = mysqli_fetch_assoc($res);
            $id_admin = $row['id']; // Supondo que o campo no banco de dados seja 'id'

            // Iniciar sessão e redirecionar para a página restrita
            $_SESSION["login_user"] = $login_user; // Armazenar apenas o login na sessão
            $_SESSION["id_admin"] = $id_admin; // Armazenar o ID do administrador na sessão
            header("Location: adminLogged.php");
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #57AEC1;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #eaeff3;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            max-width: 100%;
            text-align: center;
            color: rgb(29, 15, 15);
        }

        .container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: calc(100% - 12px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            border-color: #2980b9;
        }

        .form-group button {
            background-color: #2980b9;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #1f6cb5;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loggin- Tema Azul</title>
    
</head>

<body>
    <div class="container">
        <h2>Login Administrador</h2>
        <form name="myForm" method="post" onsubmit="return verifyAdmin()" action="">
            <div class="form-group">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="text" id="senha" name="senha" required>
            </div>

            <div class="form-group">
                <button type="submit" value="Entrar">Login</button>
            </div>
        </form>
    </div>

    <script src="../Data/Validate.js"></script>
</body>

</html>