<?php
session_start();
include("../../Data/conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    $sql = "UPDATE perfilusuario SET nome='$nome', dataNascimento='$dataNascimento', endereco='$endereco', bairro='$bairro', cidade='$cidade', email='$email', telefone='$telefone', senha='$senha' WHERE cpf='$cpf'";

    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Usuário editado com sucesso!'); window.location.href = 'consultarUsuários.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar o usuário!'); window.location.href = 'consultarUsuários.php';</script>";
    }

    // Não precisa do header após o echo
    exit(); // Para garantir que o script termine aqui
}
?>
