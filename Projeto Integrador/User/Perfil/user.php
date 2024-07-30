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
            width: 100%;
            /* Manter largura total */
            padding: 1em;
            margin-bottom: 1em;
            background-color: #00CED1;
            color: white;
            text-decoration: none;
            text-align: center;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            /* Tamanho de fonte desejado */
            box-sizing: border-box;
            /* Garantir que padding não aumente o tamanho */
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

        .header a {

            margin-left: 300%;

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






        #hello-world {
            text-align: center;
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
                <button onclick="dynamicDisplay('even', './cadastroMeuPerfil.php')"><b>Perfil do Usuário</b></button>
                Area de Habilidades
                <button onclick="dynamicDisplay('odd', './formacao.php')"><b>Formações</b></button>
                <a id="aestranho" href="./consultarFormacao.php"><b>Consultar Formações</b></a>
                <button onclick="dynamicDisplay('even', './experiencias.php')"><b>Experiência</b></button>
                <a id="aestranho" href="./consultarExperiencia.php"><b>Consultar Experiências</b></a>
                Area de Vagas
                <a id="aestranho" href="./consultarVagasUser.php"><b>Consultar Vagas Disponiveis</b></a>
                <a id="aestranho" href="#"><b>Consultar Vagas Já Candidatadas</b></a>
            </div>
            <div class="flex-3" id="content">
                <div id="hello-world">
                    <h1>BEM-VINDO
                        <?php
                        echo htmlspecialchars($perfil['nome']);
                        ?>
                    </h1>
                </div>
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