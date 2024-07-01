<?php 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loggin- Tema Azul</title>
    <link rel="stylesheet" href="../Data/CascadingLogCad.css">
    <script src="../Data/Validate.js"></script>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="#" method="post" onsubmit="return verifyUser()">
            <div class="form-group">
                <label for="CPF">CPF</label>
                <input type="text" id="CPF" name="CPF" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>

                <input type="password" id="senhasenha" name="senha" onkeyup="verify" required>
                <div id="incSenha" class="error-message"></div>
            </div>

            <div class="form-group">
                <button type="submit" value="Entrar">Login</button>
            </div>

            <a href="./cadastro.php">Ainda não tem um cadastro? cadastre-se</a>
        </form>
    </div>
</body>

</html>