<?php
// Inicia a sessão da página
session_start();
include("../Data/conexao.php");

// Verifica se há uma mensagem de sucesso ou erro da sessão
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

// Query para selecionar todos os usuários da tabela
$result_usuarios = "SELECT * FROM vaga";
$resultado_usuarios = mysqli_query($conexao, $result_usuarios);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Usuários</title>
    <link href="style.css" rel="stylesheet">
    <script>
        
    </script>
</head>
<body>
    <div class="container">
        <h1>Consulta de Usuários</h1>

        <table>
            <tr>
                <th>ID</th>
                <th onclick="">Nome da Empresa</th>
            </tr>
            <?php while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) : ?>
                <tr>
                    <td><?php echo $row_usuario['idVaga']; ?></td>
                    <td><?php echo $row_usuario['nomEmpresa']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>