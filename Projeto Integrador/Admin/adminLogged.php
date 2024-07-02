<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            font-size:x-large
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

nav ul li {
    margin-bottom: 10px;
    display: flex; /* Torna o <li> um flex container */
    align-items: center; /* Alinha itens verticalmente */
    padding: 10px; /* Espaçamento interno */
    transition: box-shadow 0.1s ease, transform 0.1s ease; /* Transições suaves */
} nav ul li:hover{
    cursor: pointer;
}

nav ul li a {
    text-decoration: none;
    color: #333;
    transition: background-color 0.3s ease;
    padding: 5px; /* Espaçamento interno dos links */
    position: relative; /* Necessário para aplicar a sombra corretamente */
    z-index: 1; /* Garante que os links fiquem acima da sombra */
}

nav ul li:hover {
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); /* Sombra preta suave no hover */
    border-color: #5e5364; /* Cor da borda no hover */
    transform: scale(1.02); /* Zoom de 5% no hover */

}

.icon {
    width: 3px;
    height: 15px;
    background-color: #333;
    margin-right: 10px; /* Espaçamento entre a caixa e o texto */
}

.main {
    flex: 3;
    background-color: #f9f9f9;
    padding: 10px;
}

@media (max-width: 768px) {
    .content {
        flex-direction: column;
    }
}

.box-shadow{
    box-shadow: 1px 1px 2px rgba(48, 47, 46, 0.5);
    border: solid 1px black;
}   

    </style>
</head>

<body>
<div class="container">
    <header>
        <div class="logo-left">
            <img src="./Sistema-Vagas-/Projeto Integrador/img/senacLogo.jpeg" alt="Imagem à esquerda">
        </div>
        <div class="titulo">
            Projeto Sistema de Vagas - Área de Administração
        </div>
        <div class="logo-right">
            <img src="./Sistema-Vagas-/Projeto Integrador/img/admins.png" alt="Imagem à direita">
        </div>
    </header>
    <div class="content">
        <nav>
            <ul>
                <li class="box-shadow"><div class="icon"></div><a href="#">Perfil de Administrador</a></li>
                <li class="box-shadow"><div class="icon"></div><a href="#">Cadastrar Novo Adm</a></li>
                <li class="box-shadow"><div class="icon"></div><a href="#">Consultar Usuários</a></li>
                <li class="box-shadow"><div class="icon"></div><a href="#">Cadastrar Formações</a></li>
                <li class="box-shadow"><div class="icon"></div><a href="#">Cadastrar Cargos</a></li>
                <li class="box-shadow"><div class="icon"></div><a href="#">Cadastrar Vagas</a></li>
            </ul>
        </nav>
        <div class="main">
            <p>Aqui vai o conteúdo da página.</p>
        </div>
    </div>
</div>
</body>

</html>
