<?php 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Tema Azul</title>
    <link rel="stylesheet" href="../Data/CascadingLogCad.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
        <form name="cadastro-form" method="post" onsubmit="return ">
    
            <div class="form-group">
                <label for="CPF">CPF</label>
                <input type="text" id="CPF" name="CPF" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" value="submit">Cadastrar</button>
            </div>
            <a href="./login.php">Já tem um cadastro? faça loggin</a>
            </form>
    </div>
    </body>
</html>
         
