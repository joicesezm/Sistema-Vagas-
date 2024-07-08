<?php
session_start();
require_once("../../Data/conexao.php");

// Verifica se os dados foram submetidos via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores dos campos do formulário
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $endereco = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    // Prepara e executa a consulta SQL para atualizar os dados na tabela perfilusuario
    $sql = "UPDATE perfilusuario SET nome = ?, dataNascimento = ?, endereco = ?, bairro = ?, cidade = ?, email = ?, telefone = ? WHERE cpf = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssss", $nome, $nascimento, $endereco, $bairro, $cidade, $email, $telefone, $cpf);
    $resultado = mysqli_stmt_execute($stmt);

    if ($resultado) {
        echo "<script>alert('Perfil atualizado com sucesso!');</script>";
        // Redirecionar para a página de perfil após a atualização
        header("Location: ./user.php");
    } else {
        echo "<script>alert('Erro ao atualizar perfil!');</script>";
        // Imprimir o erro específico para depuração
        echo mysqli_error($conexao);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conexao);
?>