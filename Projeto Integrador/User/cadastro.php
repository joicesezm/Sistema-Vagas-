<?php 
// Inicia a sessão da página
session_start();
require_once("../Data/conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && $_POST['submit'] == 'submit') {
    // Filtra e valida os dados do formulário
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    // Validações adicionais, se necessário (ex: validar o formato do CPF)

    // Prepara a query SQL usando prepared statement
    $stmt = $conexao->prepare("INSERT INTO perfilusuario (cpf, senha) VALUES (?, ?)");
    $stmt->bind_param("is", $cpf, $senha);

    // Executa a query
    if ($stmt->execute()) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
        // Redireciona para o arquivo index
        echo "<script>alert('Cadastrado com Sucesso!'); window.location='./login.php';</script>";
        exit(); // Termina o script após redirecionar
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
        // Redireciona para o arquivo cadastro.php
        echo "<script>alert('Usuario não cadastrado!'); window.location='./cadastro.php';</script>";
        exit(); // Termina o script após redirecionar
    }
    
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Tema Azul</title>
    <link rel="stylesheet" href="../Data/CascadingLogCad.css">
    <script src="../Data/Validate.js"></script>
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
        <form name="cadastro-form" method="post" onsubmit="return verifyUser()" action="">
    
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" placeholder="CPF (XXX.XXX.XXX-XX)" required>
                <small>Formato: XXX.XXX.XXX-XX</small>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" value="submit">Cadastrar</button>
            </div>
            <a href="./login.php">Já tem um cadastro? faça loggin</a>
            </form>
    </div>
    </body>
</html>
         
