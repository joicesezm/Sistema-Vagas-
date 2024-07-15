<?php
session_start();
require_once("../../Data/conexao.php");

// Verifica se os dados foram submetidos via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos necessários foram preenchidos
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        $_SESSION['msg'] = "<p style='color:red;'>Por favor, preencha todos os campos.</p>";
    } else {
        // Obtém os valores dos campos do formulário e sanitiza-os
        $user = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        
        // Prepara e executa a consulta SQL para inserir os dados na tabela
        $sql = "INSERT INTO loginadmin (user, pass) VALUES (?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $user, $pass);

        if ($stmt->execute()) {
            $_SESSION['msg'] = "<p style='color:green;'>Dados cadastrados com sucesso!</p>";
            echo "<script>alert('Dados cadastrados com sucesso!'); window.location = '../adminLogged.php';</script>";
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao cadastrar dados: " . $stmt->error . "</p>";
            echo "<script>alert('Erro ao cadastrar dados: " . $stmt->error . "');</script>";
        }

        // Fecha a declaração
        $stmt->close();
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Admin</title>
    <style>
        /* Estilos para melhorar a aparência */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        #titulo{
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="titulo">
    <h2>Cadastro de Novo Administrador</h2>
    </div>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form name="cadastro-form" method="post" action="./Funcoes/cadastroAdmin.php">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name="submit" value="Cadastrar">
    </form>
</body>
</html>
