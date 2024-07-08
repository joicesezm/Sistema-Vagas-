<?php require_once('../../Data/conexao.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Perfil</title>
    <style>
        /* styles.css */
        body,
        html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header,
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }

        .content {
            display: flex;
            flex: 1;
            flex-wrap: wrap;
            padding: 1em;
        }

        .flex-1 {
            flex: 1;
            padding: 1em;
            background-color: #f4f4f4;
        }

        .flex-3 {
            flex: 3;
            padding: 1em;
        }

        button {
            display: block;
            width: 100%;
            padding: 1em;
            margin-bottom: 1em;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {

            .flex-1,
            .flex-3 {
                flex: 100%;
            }
        }

        .hidden {
            display: none;
        }
    </style>
     <script src="../../Data/Validate.js"></script>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>Seu Perfil</h1>
        </header>
        <nav class="header">Procure pela melhor vaga para você aqui!</nav>
        <div class="content">
            <div class="flex-1">
              <button onclick="dynamicDisplay('even', './cadastroMeuPerfil.php')"><b>Perfil do Usuário</b></button>
              <button onclick="dynamicDisplay('odd', './formacao.php')"><b>Formações</b></button>
              <button onclick="dynamicDisplay('even', './experiencias.php')"><b>Experiência</b></button>
              <button onclick="dynamicDisplay('odd', './consultarVagasUser.php')"><b>Consultar Vagas</b></button>
            </div>
            <div class="flex-3" id="content">
                <div id="even" class="hidden"></div>
                <div id="odd" class="hidden"></div>
            </div>
        </div>
        <footer>
        <div class="footer">
            <!-- Instagram -->
            <a href="https://www.instagram.com/seuperfil" target="_blank">
                <img src="../img/instagram.png" alt="Instagram" style="height: 40px;">
            </a>
            <!-- Twitter -->
            <a href="https://twitter.com/seuperfil" target="_blank">
                <img src="../img/x.png.png" alt="Twitter" style="height: 40px;">
            </a>
            <!-- Facebook -->
            <a href="https://www.facebook.com/seuperfil" target="_blank">
                <img src="../img/face.png.png" alt="Facebook" style="height: 40px;">
            </a>
            <!-- WhatsApp -->
            <a href="https://api.whatsapp.com/send?phone=seunumerodetelefone" target="_blank">
                <img src="../img/whatsapp.png" alt="WhatsApp" style="height: 40px;">
            </a>
        </div>
    </footer>
    </div>
</body>

</html>