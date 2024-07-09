<?php
session_start();
require_once("../../Data/conexao.php");

// Verifica se o CPF está na sessão
if (isset($_SESSION["login_user"])) {
    $cpf = $_SESSION["login_user"];

    // Consulta SQL para obter os dados do perfil do usuário
    $sql = "SELECT * FROM perfilusuario WHERE cpf = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $cpf);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Extrai os dados do perfil do usuário
        $perfil = mysqli_fetch_assoc($resultado);
    } else {
        echo "Erro ao buscar perfil do usuário.";
        exit;
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
} else {
    // Caso não haja CPF na sessão, redireciona para o login
    header("Location: ./login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
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
    <div class="container">
        <h1>Meu Perfil</h1>

        <form action="./atualizarPerfil.php" onsubmit="" method="post">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($perfil['cpf']); ?>" readonly>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($perfil['nome']); ?>" >

            <label for="nascimento">Data de Nascimento:</label>
            <input type="date" id="nascimento" name="nascimento" value="<?php echo htmlspecialchars($perfil['dataNascimento']); ?>" >
        
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" placeholder="Formato: exemplo av./Rua, Nº" name="endereco" value="<?php echo htmlspecialchars($perfil['endereco']);  ?>" >

            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($perfil['bairro']); ?>" >

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($perfil['cidade']); ?>">

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($perfil['email']); ?>" >

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" value="<?php echo htmlspecialchars($perfil['telefone']); ?>" >

            <button type="submit">Atualizar Perfil</button>
        </form>
    </div>
</body>
</html>