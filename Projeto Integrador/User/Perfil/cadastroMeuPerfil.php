<?php
 session_start();
 require_once("..\Data\conexao.php");  

// Verifica se os dados foram submetidos via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    // Obtém os valores dos campos do formulário
    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $endereco = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $email = $_POST["email"];
    $telefone = ["telefone"];

      //estou aqui
    // Prepara e executa a consulta SQL para inserir os dados na tabela
    $sql = "INSERT INTO perfilusuario (nome, dataNascimento, endereco, bairro , cidade, email, telefone)
            VALUES ('$nome', '$nascimento', '$endereco', '$bairro', '$cidade', '$email', '$telefone')";
        $resultadoVagas = mysqli_query ($conexao, $sql);

if ($resultadoVagas) {
    echo "<script>alert('Dados cadastrados com sucesso!');</script>";
   // header("Location: /home.php");

} else {
   // echo "<script>alert('ERRO!');</script>". $conexao->error;
}

// Fecha a conexão com o banco de dados

$conexao->close();
 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <style> 
    body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        form {
            max-width: 400px;
            padding: 40px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

       
        h1 { text-align: center;}

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
        }</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="icon" href="..//icon" type="image/png">
</head>
<body>
    




    <form action="..\User\cadastroMeuPerfil.php" method="post">
    <h1>Cadastre suas Informações <br>
Pessoais</h1>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="nascimento">Data de Nascimento:</label>
        <input type="date" id="nascimento" name="nascimento" required>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" required>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required>

    

        <button type="submit">Enviar</button>
    </form>
</body>
</html> 
