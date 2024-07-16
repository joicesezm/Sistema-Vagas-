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
    $descricao = $_POST['descricao'];
    $dataini = $_POST['datainicio'];
    $datafim = $_POST['datafim'];

    // Validação dos dados (pode adicionar validações adicionais aqui) <----  ---->

    // Conectar ao banco de dados (substitua com suas configurações)
    require_once("../../Data/conexao.php");

    // Preparar a consulta SQL para inserir na tabela 'experiencias'
    $sql = "INSERT INTO experiencias (descricao, dataInicio, dataFim, idCpfCandidato) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    // Obtém o CPF do usuário logado da sessão
    $cpfCandidato = $_SESSION["login_user"];

    // Vincula os parâmetros e executa a consulta
    mysqli_stmt_bind_param($stmt, "sssi", $descricao, $dataini, $datafim, $cpfCandidato);
    
    if ($stmt->execute()) {
        echo "<script>alert('Experiencia cadastrada com Sucesso!'); window.location='user.php';</script>";
    } else {
        echo "<script>alert('Experiencia não cadastrada!'); window.location='user.php';</script>" . $conexao->error;
    }

    // Fechar a conexão
    $conexao->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Experiências</title>
</head>
<body>
    <h1>Formulário de Experiências</h1>

    <form action="./experiencias.php" method="POST">
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" maxlength="45" required><br><br>

        <label for="datainicio">Data de Início:</label>
        <input type="date" id="datainicio" name="datainicio" required><br><br>

        <label for="datafim">Data de Fim:</label>
        <input type="date" id="datafim" name="datafim"><br><br>

        <button type="submit">Salvar Experiência</button>
    </form>

</body>
</html>