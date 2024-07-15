<?php
session_start();
require_once("../../Data/conexao.php");

// Verifica se os dados foram submetidos via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o id do administrador, o novo usuário e a nova senha do formulário
    $id_admin = $_POST["id_admin"];
    $user = $_POST["username"];
    $pass = $_POST["password"];

    // Prepara e executa a consulta SQL para atualizar o usuário e a senha na tabela loginadmin
    $sql = "UPDATE loginadmin SET user = ?, pass = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $user, $pass, $id_admin); // "ssi" indica string, string, inteiro
    $resultado = mysqli_stmt_execute($stmt);

    if ($resultado) {
        echo "<script>alert('Perfil atualizado com sucesso!');</script>";
        // Redireciona de volta para a página de perfil após a atualização
        header("Location: ../adminLogged.php");
        exit;
    } else {
        echo "<script>alert('Erro ao atualizar perfil!');</script>";
        // Imprime o erro específico para depuração
        echo mysqli_error($conexao);
        header("Location: ../adminLogged.php");
        exit;
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conexao);
?>
