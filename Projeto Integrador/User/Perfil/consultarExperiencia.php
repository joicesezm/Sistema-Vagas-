<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["login_user"])) {
    header("Location: ./login.php");
    exit;
}

// Conectar ao banco de dados (substitua com suas configurações)
require_once("../../Data/conexao.php");

// Verifica se foi enviado um pedido de exclusão
if (isset($_GET['excluir']) && !empty($_GET['excluir'])) {
    // Obtém o ID da formação a ser excluída
    $idFormacao = $_GET['excluir'];

    // Consulta SQL para excluir a formação
    $sqlExcluir = "DELETE FROM experiencias WHERE idExperiencias = ? AND idCpfCandidato = ?";
    $stmtExcluir = mysqli_prepare($conexao, $sqlExcluir);
    mysqli_stmt_bind_param($stmtExcluir, "is", $idFormacao, $_SESSION["login_user"]);

    if (mysqli_stmt_execute($stmtExcluir)) {
        // Redireciona de volta para a página após a exclusão
        echo "<script>alert('Exclusão Bem-Sucedida!'); window.location.href = './consultarExperiencia.php';</script>";
        exit;
    } else {
        echo "Erro ao excluir formação: " . mysqli_error($conexao);
    }
}

// Consulta SQL para buscar as formações do usuário
$sql = "SELECT * FROM experiencias WHERE idCpfCandidato = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $_SESSION["login_user"]);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Fechar a conexão (sempre bom fechar depois de usar)
mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Formações</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            position: relative; /* Adicionado para posicionar o botão de exclusão */
        }

        .card h2 {
            margin-top: 0;
            font-size: 18px;
        }

        .card p {
            margin: 5px 0;
        }

        .excluir-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            position: absolute; /* Posicionamento absoluto para o botão */
            top: 10px; /* Ajuste para posicionamento vertical */
            right: 10px; /* Ajuste para posicionamento horizontal */
        }

        .excluir-btn:hover {
            background-color: #c82333;
        }
                /* Estilos específicos para esta página */

        /* Reset básico */
        body,
        html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Container principal */
        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Cabeçalho e rodapé */
        .header,
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }

        /* Área de conteúdo principal */
        .content {
            display: flex;
            flex: 1;
            flex-wrap: wrap;
            padding: 1em;
        }

        /* Painel esquerdo (menu) */
        .flex-1 {
            flex: 1;
            padding: 1em;
            background-color: #f4f4f4;
        }

        /* Estilos para botões e links */
        .flex-1 button,
        .flex-1 a {
            display: block;
            width: 100%; /* Manter largura total */
            padding: 1em;
            margin-bottom: 1em;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            text-align: center;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px; /* Tamanho de fonte desejado */
            box-sizing: border-box; /* Garantir que padding não aumente o tamanho */
        }

        .flex-1 button:hover,
        .flex-1 a:hover {
            background-color: #0056b3;
        }

        /* Painel direito (conteúdo dinâmico) */
        .flex-3 {
            flex: 3;
            padding: 1em;
        }

        /* Ocultar inicialmente o conteúdo dinâmico */
        .hidden {
            display: none;
        }

        /* Mídia query para telas menores */
        @media (max-width: 768px) {
            .flex-1,
            .flex-3 {
                flex: 100%;
            }
        }

        /* Estilos para links nas redes sociais */
        .footer a {
            margin: 0 5px;
        }

        .footer img {
            height: 40px;
        }

        header {
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
            max-height: 100px;
        }

        .header img {
            max-width: 40px;
        }

        .logo-right {
            position: fixed;
            /* Fixar a posição em relação à janela de visualização */
            top: 10px;
            /* Ajuste a distância do topo conforme necessário */
            right: 10px;
            /* Ajuste a distância da borda direita conforme necessário */
            text-align: center;
            /* Centraliza o conteúdo dentro da div */
        }

        .logo-right img {
            display: block;
            /* Faz com que a imagem seja um bloco, garantindo que o texto fique embaixo */
            margin: 0 auto;
            /* Centraliza a imagem horizontalmente */
        }

        .logo-right small {
            display: block;
            /* Garante que o texto fique embaixo da imagem */
            margin-top: 4px;
            /* Ajusta o espaço entre a imagem e o texto, ajuste conforme necessário */
        }
    </style>
</head>
<body>

        <div class="container">
        <header class="header">
            <h1>Perfil do Usuário</h1>
            <div class="logo-right">
                <a href="../logout.php">
                    <img src="../../img/power-off.png" alt="power-off" class="logo-img">
                </a>
                <small class="logo-text">LogOut</small>
            </div>
        </header>
        <div class="content">
            <div class="flex-1">
                <a id="aestranho" href="./user.php"><b>Voltar</b></a>
            </div>
            <div class="flex-3" id="content">
            <h1>Suas Experiencias</h1>
    <?php
    // Loop através dos resultados da consulta
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card">
            <h2><?php echo htmlspecialchars($row['descricao']); ?></h2>
            <p><strong>Instituição:</strong> <?php echo htmlspecialchars($row['dataInicio']); ?></p>
            <p><strong>Situação:</strong> <?php echo htmlspecialchars($row['dataFim']); ?></p>
            <a class="excluir-btn" href="./consultarFormacao.php?excluir=<?php echo $row['idExperiencias']; ?>">Excluir</a>
        </div>
        <?php
    }
    ?>
            </div>
        </div>
        <footer class="footer">
            <!-- Links para redes sociais -->
            <a href="https://www.instagram.com/seuperfil" target="_blank">
                <img src="../../img/instagram.png" alt="Instagram">
            </a>
            <a href="https://twitter.com/seuperfil" target="_blank">
                <img src="../../img/x.png.png" alt="Twitter">
            </a>
            <a href="https://www.facebook.com/seuperfil" target="_blank">
                <img src="../../img/face.png.png" alt="Facebook">
            </a>
            <a href="https://api.whatsapp.com/send?phone=seunumerodetelefone" target="_blank">
                <img src="../../img/whatsapp.png" alt="WhatsApp">
            </a>
        </footer>
    </div>
</body>
</html>
