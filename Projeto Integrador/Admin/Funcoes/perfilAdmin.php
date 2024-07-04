<!DOCTYPE html>
<html lang="en">
<head>
    <style> 
    body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        form {
            max-width: 400px;
            padding: 40px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

       
        h1 { text-align: center;}

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="icon" href="..//icon" type="image/png">
</head>
<body>
    




    <form action="#" method="post">
    <h1>Infoemações Pessoais de ADM</h1>
        <label for="id">id:</label>
        <input type="text" id="id" name="id">

        <label for="cpf">cpf:</label>
        <input type="text" id="cpf" name="cpf">

        <label for="senha">senha:</label>
        <input type="password" id="senha" name="senha">
    </form>
</body>
</html>
