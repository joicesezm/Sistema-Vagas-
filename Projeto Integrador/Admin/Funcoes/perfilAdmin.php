<?php
session_start();
require_once("../../Data/conexao.php");

// Verifica se o usuário está logado
if (!isset($_SESSION["id_admin"])) {
    header("Location: ./loginAdmin.php");
    exit;
}

// Consulta SQL para obter os dados do perfil do usuário logado
$id_admin = $_SESSION["id_admin"];
$sql = "SELECT * FROM loginadmin WHERE id = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_admin);
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="icon" href="../icon" type="image/png">
    <style> 
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
        }

        form {
            max-width: 400px;
            padding: 40px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
       
        h1 {
            text-align: center;
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

    <form action="./Funcoes/atualizarPerfil.php" method="post">
        <h1>Informações Pessoais de ADM</h1>

        <!-- Campo oculto para enviar o id -->
        <input type="hidden" id="id_admin" name="id_admin" value="<?php echo $perfil['id']; ?>">

        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($perfil['user']); ?>">

        <label for="password">Nova Senha:</label>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($perfil['pass']); ?>">

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>