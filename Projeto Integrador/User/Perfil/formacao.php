<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["login_user"])) {
    header("Location: ./login.php");
    exit;
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $curso = $_POST['curso'];
    $instituicao = $_POST['instituicao'];
    $situacao = $_POST['situacao'];

    // Validação dos dados (pode adicionar validações adicionais aqui)

    // Conectar ao banco de dados (substitua com suas configurações)
    require_once("../../Data/conexao.php");

    // Preparar a consulta SQL para inserir na tabela 'formacao'
    $sql = "INSERT INTO formacao (curso, instituicao, situacao, idCpfCandidato) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    // Obtém o CPF do usuário logado da sessão
    $cpfCandidato = $_SESSION["login_user"];

    // Vincula os parâmetros e executa a consulta
    mysqli_stmt_bind_param($stmt, "sssi", $curso, $instituicao, $situacao, $cpfCandidato);
    
    if ($stmt->execute()) {
        echo "<script>alert('Formação cadastrada com Sucesso!'); window.location='user.php';</script>";
    } else {
        echo "<script>alert('Formação não cadastrada!'); window.location='user.php';</script>" . $conexao->error;
    }

    // Fechar a conexão
    $conexao->close();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Educação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
   
    <form action="./formacao.php" method="POST">
    <h1>Formulário de formação acadêmica</h1>
        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required>

        <label for="instituicao">Instituição:</label>
        <input type="text" id="instituicao" name="instituicao" required>

        <label>Situação do curso:</label>
        <input type="radio" id="cursando" name="situacao" value="cursando" required>
        <label for="cursando">Cursando</label>

        <input type="radio" id="completo" name="situacao" value="completo">
        <label for="completo">Completo</label>

        <input type="radio" id="trancado" name="situacao" value="trancado">
        <label for="trancado">Trancado</label>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
