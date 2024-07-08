<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Conteúdo HTML Dinamicamente</title>
    <style>
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
            width: 200px; /* Ajuste o tamanho conforme necessário */
            height: auto;
        }

        .logo-right img {
            width: 50px; /* Ajuste o tamanho conforme necessário */
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
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); /* Sombra preta suave no hover */
    border-color: #5e5364; /* Cor da borda no hover */
    transform: scale(1.02); /* Zoom de 5% no hover */
}
        nav ul li {
            margin-bottom: 10px;
            display: flex; /* Torna o <li> um flex container */
            align-items: center; /* Alinha itens verticalmente */
            padding: 10px; /* Espaçamento interno */
            transition: box-shadow 0.1s ease, transform 0.1s ease; /* Transições suaves */
        }

        nav ul li button {
    border: none;
    background: none;
    cursor: pointer;
    font-size: 16px;
    color: #333;
    text-decoration: none;
    padding: 10px; /* Ajuste o padding conforme necessário */
    width: 100%; /* Ocupa toda a largura do <li> */
    display: block; /* Para ocupar todo o espaço do <li> */
    text-align: left; /* Alinha o texto do botão à esquerda */
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
        a {
            text-decoration: none; /* Remove sublinhado */
            color: #333; /* Define a cor do texto */
        }
    </style>
    <?php 
        session_start();
        include("../Data/conexao.php");
    ?>
</head>
<body>
    <script src="..\Data\Validate.js"></script>
    <div class="container">
        <header>
            <div class="logo-left">
                <img src="../img/senacLogo.jpeg" alt="Imagem à esquerda">
            </div>
            <div class="titulo">
                Projeto Sistema de Vagas - Área de Administração
            </div>
            <div class="logo-right">
                <img src="../img/admins.png" alt="Imagem à direita">
            </div>
        </header>
        <div class="content">
            <nav>
                <ul>
                    Seus Dados
                    <li class="box-shadow">
                        <button onclick="dynamicDisplay('even', './Funcoes/perfilAdmin.php')"><b>Perfil de Administrador</b></button>
                    </li>

                    Área de Cadastro
                    <li class="box-shadow">
                        <button onclick="dynamicDisplay('odd', 'url')"><b>Cadastrar Novo Adm</b></button>
                    </li>

                    <li class="box-shadow">
                        <button onclick="dynamicDisplay('even', './Funcoes/cadastroVagas.php')"><b>Cadastrar Vagas</b></button>
                    </li>

                    Área de Consultas
                    <a href="./Funcoes/consultarVagas.php"><li class="box-shadow">
                        <b>Consultar Vagas</b>
                    </li></a>
                    

                    <a href="./Funcoes/consultarUsuários.php"><li class="box-shadow">
                        <b>Consultar Usuários</b>
                    </li></a>

                </ul>
            </nav>
            <div class="main">
                <div id="even" class="hidden"></div>
                <div id="odd" class="hidden"></div>
            </div>
        </div>
    </div>

</body>
</html>
