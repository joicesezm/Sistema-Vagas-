<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Vagas</title>
    <link rel="stylesheet" href="Data/CascadingInt.css">
    <script src="./Data/Validate.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <img src="./img/senacLogo.jpeg" alt="Logo do Senac" style="width: 250px; height: auto; position: relative; top: 0; left: 0;">
        <h1 class="gwendolyn-regular gwendolyn-bold">Informativo de vagas de trabalho</h1>
        <a class="admin-page" href="Admin/loginAdmin.php"><img src="./img/admins.png" alt="Administradores" style="height: 80px;"></a>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="Contact.html">Contacte-nos</a></li>
            <li><a href="#">Sobre nós</a></li>
            <li><a href="#">Dúvidas</a></li>
        </ul>
    </nav>

    <div id="vagasCad">
        VAGAS
    </div>

    <div class="btn-group">
        <a href="User/cadastro.php" class="btn">Cadastrar</a>
        <a href="User/login.php" class="btn">Login</a>
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

</body>
</html>
