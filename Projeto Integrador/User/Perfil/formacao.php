<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Educação</title>
    
    <link rel="stylesheet" href="vagasR.css">
</head>
<body>
   
    <form action="/salvar-educacao" method="POST">
    <h1>Formulário de formação acadêmica</h1>
        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required>

        <label for="instituicao">Instituição:</label>
        <input type="text" id="instituicao" name="instituicao" required>

        <label>Situação do curso:</label>
        <input type="radio" id="cursando" name="situacao" value="cursando" required>
        <label for="cursando">Cursando</label>

        <input type="radio" id="completo" name="situacao" value="completo">
        <label for="completo">Completo</label>

        <input type="radio" id="trancado" name="situacao" value="trancado">
        <label for="trancado">Trancado</label>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
