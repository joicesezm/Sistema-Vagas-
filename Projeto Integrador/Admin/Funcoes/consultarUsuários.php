<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Vagas</title>
    <link href="style.css" rel="stylesheet">

    <?php
    session_start();
    include("../../Data/conexao.php");

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $result_usuarios = "SELECT * FROM perfilusuario";
    $resultado_usuarios = mysqli_query($conexao, $result_usuarios);
    ?>

    <style>
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            cursor: pointer;
        }

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
        .hiddenTable {
            display: none;
        }

        /* Estilos gerais */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
        }

        header {
            background-color: #c5c5c5;
            color: #000000;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-left img {
            width: 200px;
            /* Ajuste o tamanho conforme necessário */
            height: auto;
        }

        .logo-right img {
            width: 50px;
            /* Ajuste o tamanho conforme necessário */
            height: auto;
        }

        .titulo {
            font-size: x-large;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
        }

        .content {
            display: flex;
            flex-wrap: wrap;
        }

        nav {
            flex: 1;
            background-color: #f0f0f0;
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li:hover {
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
            /* Sombra preta suave no hover */
            border-color: #5e5364;
            /* Cor da borda no hover */
            transform: scale(1.02);
            /* Zoom de 5% no hover */
        }

        nav ul li {
            margin-bottom: 10px;
            display: flex;
            /* Torna o <li> um flex container */
            align-items: center;
            /* Alinha itens verticalmente */
            padding: 10px;
            /* Espaçamento interno */
            transition: box-shadow 0.1s ease, transform 0.1s ease;
            /* Transições suaves */
        }

        nav ul li button {
            border: none;
            background: none;
            cursor: pointer;
            font-size: 16px;
            color: #333;
            text-decoration: none;
            padding: 10px;
            /* Ajuste o padding conforme necessário */
            width: 100%;
            /* Ocupa toda a largura do <li> */
            display: block;
            /* Para ocupar todo o espaço do <li> */
            text-align: left;
            /* Alinha o texto do botão à esquerda */
            transition: color 0.3s ease;
        }

        nav ul li button:hover {
            color: none;
        }

        .main {
            flex: 3;
            background-color: #f9f9f9;
            padding: 10px;
        }

        .hidden {
            display: none;
        }

        .box-shadow {
            box-shadow: 1px 1px 2px rgba(48, 47, 46, 0.5);
            border: solid 1px black;
        }

        /* Remove a formatação padrão dos links */
        a {
            text-decoration: none;
            /* Remove sublinhado */
            color: #333;
            /* Define a cor do texto */
        }

        /* Estilo de hover e foco */
        a:hover,
        a:focus {
            text-decoration: underline;
            /* Adiciona sublinhado no hover/foco */
            color: #555;
            /* Define a cor do texto no hover/foco */
        }

        .hidden {
            display: none;
        }
    </style>

    <script>
        function toggleDetails(rowId) {
            var detailsRow = document.getElementById(rowId);
            detailsRow.style.display = (detailsRow.style.display === 'table-row') ? 'none' : 'table-row';
        }

        function fillEditForm(usuario) {
            document.getElementById('edit-cpf').value = usuario.cpf;
            document.getElementById('edit-nome').value = usuario.nome;
            document.getElementById('edit-dataNascimento').value = usuario.dataNascimento;
            document.getElementById('edit-endereco').value = usuario.endereco;
            document.getElementById('edit-bairro').value = usuario.bairro;
            document.getElementById('edit-cidade').value = usuario.cidade;
            document.getElementById('edit-email').value = usuario.email;
            document.getElementById('edit-telefone').value = usuario.telefone;
            document.getElementById('edit-senha').value = usuario.senha;
            document.getElementById('edit-modal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('edit-modal').style.display = 'none';
        }

        function toggleEditForm(cpf) {
            var editFormRow = document.getElementById('edit-form-' + cpf);
            editFormRow.classList.toggle('hidden');
        }

        function confirmDelete(cpf) {
            document.getElementById('delete-confirm-' + cpf).classList.remove('hidden');
        }

        function cancelDelete(cpf) {
            document.getElementById('delete-confirm-' + cpf).classList.add('hidden');
        }

        function deleteUser(cpf) {
            if (confirm("Tem certeza que deseja excluir este usuário?")) {
                window.location.href = 'delete_user.php?cpf=' + cpf;
            }
        }
    </script>
</head>

<body>

    <style>

    </style>
    </head>

    <body>
        <script src="..\Data\Validate.js"></script>
        <div class="container">
            <header>
                <div class="logo-left"><img src="../../img/senacLogo.jpeg" alt="Logo"></div>
                <div class="titulo">Consultando Usuários...</div>
                <div class="logo-right"><img src="../../img/admins.png" alt="Admin"></div>
            </header>

            <div class="content">
                <nav>
                    <ul>
                        <a href="../adminLogged.php">
                            <li class="box-shadow"><b>Voltar</b></li>
                        </a>
                    </ul>
                </nav>

                <div class="main">
                    <table>
                        <tr>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                        <?php while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) : ?>
                            <tr>
                                <td><?php echo $row_usuario['cpf']; ?></td>
                                <td><?php echo $row_usuario['nome']; ?></td>
                                <td>
                                    <button onclick="toggleDetails('<?php echo $row_usuario['cpf']; ?>')">Detalhes</button>
                                    <button onclick="toggleEditForm('<?php echo $row_usuario['cpf']; ?>')">Editar</button>
                                    <button onclick="confirmDelete('<?php echo $row_usuario['cpf']; ?>')">Excluir</button>
                                </td>
                            </tr>
                            <tr class="hiddenTable" id="<?php echo $row_usuario['cpf']; ?>">
                                <td colspan="3">
                                    <table>
                                        <tr>
                                            <th>Data de Nascimento</th>
                                            <th>Endereço</th>
                                            <th>Bairro</th>
                                            <th>Cidade</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Senha</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $row_usuario['dataNascimento']; ?></td>
                                            <td><?php echo $row_usuario['endereco']; ?></td>
                                            <td><?php echo $row_usuario['bairro']; ?></td>
                                            <td><?php echo $row_usuario['cidade']; ?></td>
                                            <td><?php echo $row_usuario['email']; ?></td>
                                            <td><?php echo $row_usuario['telefone']; ?></td>
                                            <td><?php echo $row_usuario['senha']; ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr id="delete-confirm-<?php echo $row_usuario['cpf']; ?>" class="hidden">
                                <td colspan="3">
                                    Deseja mesmo excluir o usuário?
                                    <button onclick="deleteUser('<?php echo $row_usuario['cpf']; ?>')">Sim</button>
                                    <button onclick="cancelDelete('<?php echo $row_usuario['cpf']; ?>')">Não</button>
                                </td>
                            </tr>
                            <tr class="edit-form hidden" id="edit-form-<?php echo $row_usuario['cpf']; ?>">
                                <td colspan="3">
                                    <form method="POST" action="update_user.php">
                                        <input type="hidden" name="cpf" value="<?php echo $row_usuario['cpf']; ?>">
                                        <label>Nome: <input type="text" name="nome" value="<?php echo $row_usuario['nome']; ?>"></label><br>
                                        <label>Data de Nascimento: <input type="date" name="dataNascimento" value="<?php echo $row_usuario['dataNascimento']; ?>"></label><br>
                                        <label>Endereço: <input type="text" name="endereco" value="<?php echo $row_usuario['endereco']; ?>"></label><br>
                                        <label>Bairro: <input type="text" name="bairro" value="<?php echo $row_usuario['bairro']; ?>"></label><br>
                                        <label>Cidade: <input type="text" name="cidade" value="<?php echo $row_usuario['cidade']; ?>"></label><br>
                                        <label>Email: <input type="email" name="email" value="<?php echo $row_usuario['email']; ?>"></label><br>
                                        <label>Telefone: <input type="text" name="telefone" value="<?php echo $row_usuario['telefone']; ?>"></label><br>
                                        <label>Senha: <input type="password" name="senha" value="<?php echo $row_usuario['senha']; ?>"></label><br>
                                        <button type="submit">Salvar</button>
                                        <button type="button" onclick="toggleEditForm('<?php echo $row_usuario['cpf']; ?>')">Cancelar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div id="edit-modal" style="display:none;">
            <form method="POST" action="update_user.php">
                <input type="hidden" id="edit-cpf" name="cpf">
                <label>Nome: <input type="text" id="edit-nome" name="nome"></label><br>
                <label>Data de Nascimento: <input type="date" id="edit-dataNascimento" name="dataNascimento"></label><br>
                <label>Endereço: <input type="text" id="edit-endereco" name="endereco"></label><br>
                <label>Bairro: <input type="text" id="edit-bairro" name="bairro"></label><br>
                <label>Cidade: <input type="text" id="edit-cidade" name="cidade"></label><br>
                <label>Email: <input type="email" id="edit-email" name="email"></label><br>
                <label>Telefone: <input type="text" id="edit-telefone" name="telefone"></label><br>
                <label>Senha: <input type="password" id="edit-senha" name="senha"></label><br>
                <button type="submit">Salvar</button>
                <button type="button" onclick="closeEditModal()">Cancelar</button>
            </form>
        </div>

    </body>

</html>
</body>

</html>