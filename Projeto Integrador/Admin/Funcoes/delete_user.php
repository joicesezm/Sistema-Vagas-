<?php
session_start();
include("../../Data/conexao.php");

if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    $sql = "DELETE FROM perfilusuario WHERE cpf='$cpf'";

    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Usuário Excluído com sucesso!'); window.location.href = 'consultarUsuários.php';</script>";
    } else {
        echo "<script>alert('Erro ao Excluír o usuário!'); window.location.href = 'consultarUsuários.php';</script>";
    }

    exit();
}
?>
