
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Perfil</title>
    <style>
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
            padding: 1em;
            justify-content: center; /* Centraliza conteúdo */
            align-items: center; /* Centraliza conteúdo */
            flex-wrap: wrap;
        }

        /* Estilos para cada vaga */
        .vaga {
            margin: 10px;
            padding: 20px;
            border: 1px solid #ccc;
            cursor: pointer;
            width: 300px;
        }

        .vaga:hover {
            background-color: #f0f0f0;
        }

        /* Estilos para o modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            position: relative;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 10px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }

        /* Estilos para links nas redes sociais no footer */
        .footer a {
            margin: 0 5px;
        }

        .footer img {
            height: 40px; /* Mantém o tamanho máximo das imagens */
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
    </style>
    <?php require_once('../../Data/conexao.php')?>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Seu Perfil</h1>
        </header>
        <div class="content">
            <div class="flex-1">
                <a id="aestranho" href="./user.php"><b>Voltar</b></a>
            </div>
            <div class="flex-3" id="content">
        <!-- Conteúdo principal -->
        <div class="content">
            <?php
            $sql = "SELECT idVaga, nomEmpresa, cargo, turno FROM vaga";
            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Exibindo apenas nome da empresa, cargo e turno
                    echo "<div class='vaga' onclick='openModal(" . $row['idVaga'] . ")'>";
                    echo "<h3>" . $row['nomEmpresa'] . "</h3>";
                    echo "<p><strong>Cargo:</strong> " . $row['cargo'] . "</p>";
                    echo "<p><strong>Turno:</strong> " . $row['turno'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 resultados";
            }
            ?>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal">
            <!-- Conteúdo do modal -->
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div id="modalContent">
                    <!-- Aqui serão exibidas as informações detalhadas da vaga -->
                </div>
                <!-- Botão "Candidatar-se para vaga" -->
                <button onclick="candidatar()">Candidatar-se para vaga</button>
            </div>
        </div>
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

    <!-- JavaScript -->
    <script>
        function openModal(idVaga) {
            // Requisição AJAX para buscar detalhes da vaga
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("modalContent").innerHTML = this.responseText;
                    document.getElementById('myModal').style.display = 'block';
                }
            };
            xhttp.open("GET", "detalhes_vaga.php?idVaga=" + idVaga, true);
            xhttp.send();
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        function candidatar() {
            alert('Redirecionar para página de candidatura');
            // Aqui você pode redirecionar o usuário para a página de candidatura
            // Exemplo: window.location.href = 'pagina_de_candidatura.php';
        }
    </script>
</body>
</html>
