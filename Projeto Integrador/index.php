<?php
//API PROCESS
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./data/style.css">
    <title>Sistema de Vagas</title>
</head>

<body>

    <header>
        <img src="./img/senacLogo.jpeg" alt="Logo do Senac" style="width: 250px; height: auto;">
        <h1 class="gwendolyn-regular gwendolyn-bold">Informativo de vagas de trabalho</h1>
        <a class="admin-page" href="Admin/loginAdmin.php"><img src="./img/admins.png" alt="Administradores" style="height: 80px;"></a>
    </header>

    <nav>
        <ul>
            <li><button type="button" onclick="dynamicDisplayDiv('content')" class="button">Home</button></li>
            <li><button type="button" onclick="dynamicDisplayDiv('contact-box')" class="button">Contacte-nos</button></li>
            <li><button type="button" onclick="dynamicDisplayDiv('about-us')" class="button">Sobre nós</button></li>
            <li><button type="button" onclick="dynamicDisplayDiv('questions')" class="button">Dúvidas</button></li>
        </ul>
    </nav>

    <div id="content">
        <img src="./img/fundoHome.jpeg" alt="Imagem de fundo" style="width: 100%; max-width: 600px; display: block; margin: 0 auto;">

        <div id="buttons">
            <div class="vagas"><a href="./consultarVagas.php" class="button">Buscar Vagas</a></div>
        </div>

        <div class="message">
            <p>Faça login ou cadastre-se para se candidatar às vagas.</p>
        </div>

        <div class="buttons">
            <a href="User/cadastro.php" class="button">Cadastrar</a>
            <a href="User/login.php" class="button">Login</a>
        </div>
    </div>

    <div id="contact-box" class="hidden">
    <div id="center-box">
        <h2>Entre em Contato</h2>
        <form name="contactForm" id="contactForm" action="" method="post" onsubmit="return validateAndSubmitForm();">
            <fieldset class="box-form">
                <div class="name">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name">
                </div>
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="example@gmail">
                </div>
                <div class="message">
                    <label for="message">Mensagem</label>
                    <br>
                    <textarea name="message" id="message" maxlength="256" placeholder="max 256"></textarea>
                </div>
                <div class="phone">
                    Telefone (WhatsApp): (Opcional)
                    <br>
                    <label for="ddd">DDD</label>
                    <select name="ddd" id="ddd">
                        <option value="null" hidden selected></option>
                        <option value="">+1</option>
                        <option value="">+55</option>
                        <option value="">+10</option>
                        <option value="">+55</option>
                    </select>
                    
                    <input type="tel" id="phone" name="phone" placeholder="(00) 00000-0000" size="20" maxlength="15" />
                    
                    <small>Formato: (00) 00000-0000</small>
                </div>
                <br>
                <div class="submit">
                    <button type="submit" class="text-button">Submit</button>
                </div>
            </fieldset>
        </form>
        </div>
    </div>

    <div id="about-us" class="hidden">
        <div id="center-box">
            <h2>Sobre a Hedgehog</h2>
            <p>
                A Hedgehog é uma empresa inovadora no setor de tecnologia, comprometida com o desenvolvimento de soluções que transformam a forma como pessoas e empresas interagem com o mundo digital. Desde a nossa fundação, temos nos dedicado a fornecer produtos e serviços de alta qualidade que atendem às necessidades em constante evolução dos nossos clientes.
            </p>
            <p>
                Com uma equipe de profissionais apaixonados e altamente qualificados, a Hedgehog se destaca por sua capacidade de antecipar tendências e implementar tecnologias de ponta. Nossos valores centrais incluem inovação, excelência e responsabilidade, e acreditamos que a tecnologia pode ser uma força poderosa para o bem, melhorando vidas e impulsionando negócios para o sucesso.
            </p>
            <p>
                Na Hedgehog, estamos sempre buscando novas maneiras de nos desafiar e superar expectativas. Nosso portfólio de produtos abrange desde soluções de software personalizadas até plataformas robustas de gerenciamento de dados, todas projetadas para oferecer eficiência, segurança e flexibilidade.
            </p>
            <p>
                Com sede em [Localização], a Hedgehog tem orgulho de servir clientes em todo o mundo, com um compromisso inabalável com a qualidade e a satisfação do cliente. Junte-se a nós nesta jornada e descubra como a Hedgehog pode ajudar a impulsionar seu futuro digital.
            </p>
        </div>
    </div>


    <div id="questions" class="hidden">
        <div id="center-box">
            <h2>Duvidas Sobre o Site</h2>
            <p>
                Duvidas Frequentes
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-icons">
            <!-- Instagram -->
            <a href="https://www.instagram.com/seuperfil" target="_blank">
                <img src="./img/instagram.png" alt="Instagram" style="height: 40px;">
            </a>
            <!-- Twitter -->
            <a href="https://twitter.com/seuperfil" target="_blank">
                <img src="./img/x.png.png" alt="Twitter" style="height: 40px;">
            </a>
            <!-- Facebook -->
            <a href="https://www.facebook.com/seuperfil" target="_blank">
                <img src="./img/face.png.png" alt="Facebook" style="height: 40px;">
            </a>
            <!-- WhatsApp -->
            <a href="https://api.whatsapp.com/send?phone=seunumerodetelefone" target="_blank">
                <img src="./img/whatsapp.png" alt="WhatsApp" style="height: 40px;">
            </a>
        </div>
    </footer>

    <script src="./data/index-script.js"></script>

</body>

</html>