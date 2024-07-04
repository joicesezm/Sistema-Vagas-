<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Vagas</title>
    <link href="style.css" rel="stylesheet">
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
    <style>
        /* Reset básico e estilos gerais */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
    cursor: pointer; /* cursor de mão ao passar sobre o cabeçalho */
}

table th:first-child, table td:first-child {
    min-width: 50px;
}

/* Estilos para o botão de detalhes */
button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 3px;
    margin-left: 5px;
}

button:hover {
    background-color: #0056b3;
}

/* Oculta a div de detalhes inicialmente */
#detalhes {
    display: none;
    margin-top: 10px;
}

/* Estiliza a tabela de detalhes */
#detalhes table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

#detalhes th, #detalhes td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

#detalhes th {
    background-color: #f2f2f2;
}

    </style>
    <script>
        function toggleDetails(rowId) {
            var detailsRow = document.getElementById('details-' + rowId);
            detailsRow.style.display = (detailsRow.style.display === 'table-row') ? 'none' : 'table-row';
        }
    </script>
</head>
<body>

    <div class="container">
        <h1>Consulta de Vagas</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome da Empresa</th>
                <th>Ações</th>
            </tr>
            <?php while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) : ?>
                <tr>
                    <td><?php echo $row_usuario['idVaga']; ?></td>
                    <td><?php echo $row_usuario['nomEmpresa']; ?></td>
                    <td><button onclick="toggleDetails('<?php echo $row_usuario['idVaga']; ?>')">Detalhes</button></td>
                </tr>
                <tr id="details-<?php echo $row_usuario['idVaga']; ?>" style="display: none;">
                    <td colspan="3">
                        <table>
                            <tr>
                                <th>Requisitos</th>
                                <th>Descrição de Atividades</th>
                                <th>Turno</th>
                                <th>Cargo</th>
                                <th>Endereço</th>
                                <th>Email</th>
                            </tr>
                            <tr>
                                <td><?php echo $row_usuario['requisitos']; ?></td>
                                <td><?php echo $row_usuario['descAtividades']; ?></td>
                                <td><?php echo $row_usuario['turno']; ?></td>
                                <td><?php echo $row_usuario['cargo']; ?></td>
                                <td><?php echo $row_usuario['endereco']; ?></td>
                                <td><?php echo $row_usuario['email']; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
