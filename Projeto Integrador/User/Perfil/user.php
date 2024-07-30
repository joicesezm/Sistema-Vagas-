<?php require_once('../../Data/conexao.php')?>
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

    <script>
        function dynamicDisplay(divId, arquivo) {
            // Esconde todas as divs dentro de .flex-3
            var contentDivs = document.querySelectorAll('.flex-3 > div');
            contentDivs.forEach(div => {
                div.classList.add('hidden');
            });

            // Carrega o conteúdo do arquivo usando fetch
            fetch(arquivo)
                .then(response => response.text())
                .then(data => {
                    // Insere o conteúdo carregado na div correspondente
                    var divToShow = document.getElementById(divId);
                    divToShow.innerHTML = data;
                    divToShow.classList.remove('hidden');
                })
                .catch(error => console.error('Erro ao carregar o arquivo:', error));
        }
    </script>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Seu Perfil</h1>
        </header>
        <nav class="header"><a href="../logout.php">LogOut</a></nav>
        <div class="content">
            <div class="flex-1">
                <button onclick="dynamicDisplay('even', './cadastroMeuPerfil.php')"><b>Perfil do Usuário</b></button>
                Area de Habilidades
                <button onclick="dynamicDisplay('odd', './formacao.php')"><b>Formações</b></button>
                <a id="aestranho" href="./consultarFormacao.php"><b>Consultar Formações</b></a>
                <button onclick="dynamicDisplay('even', './experiencias.php')"><b>Experiência</b></button>
                <a id="aestranho" href="./consultarExperiencia.php"><b>Consultar Experiências</b></a>
                Area de Vagas
                <a id="aestranho" href="./consultarVagasUser.php"><b>Consultar Vagas</b></a>
            </div>
            <div class="flex-3" id="content">
                <div id="even" class="hidden"></div>
                <div id="odd" class="hidden"></div>
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
