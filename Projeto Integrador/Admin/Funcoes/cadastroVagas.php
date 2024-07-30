<?php
 session_start();
 require_once("../../Data/conexao.php");  

// Verifica se os dados foram submetidos via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos necessários foram preenchidos
    if (empty($_POST["nomeEmpresa"]) || empty($_POST["cargo"]) || empty($_POST["email"]) ||
        empty($_POST["local"]) || empty($_POST["requisitos"]) || empty($_POST["descricao"]) ||
        empty($_POST["turno"])) {
        echo "<script>alert('Por favor, preencha todos os campos.'); window.location = '../adminLogged.php';</script>";
    } else {
        // Obtém os valores dos campos do formulário e sanitiza-os
        $nomeEmpresa = filter_input(INPUT_POST, "nomeEmpresa", FILTER_SANITIZE_STRING);
        $cargo = filter_input(INPUT_POST, "cargo", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $localTrabalho = filter_input(INPUT_POST, "local", FILTER_SANITIZE_STRING);
        $requisitos = filter_input(INPUT_POST, "requisitos", FILTER_SANITIZE_STRING);
        $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING);
        $turno = filter_input(INPUT_POST, "turno", FILTER_SANITIZE_STRING);

        if (!$email) {
            echo "<script>alert('Por favor, forneça um email válido.'); window.location = '../adminLogged.php';</script>";
        } else {
            // Prepara e executa a consulta SQL para inserir os dados na tabela
            $sql = "INSERT INTO vaga (nomEmpresa, cargo, email, endereco, requisitos, descAtividades, turno)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sssssss", $nomeEmpresa, $cargo, $email, $localTrabalho, $requisitos, $descricao, $turno);
            
            if ($stmt->execute()) {
                echo "<script>alert('Dados cadastrados com sucesso!'); window.location = '../adminLogged.php';</script>";
                // header("Location: /home.php");
            } else {
                echo "<script>alert('Erro ao cadastrar dados: " . $stmt->error . "');</script>";
            }

            // Fecha a declaração
            $stmt->close();
        }
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Data/CascadingCadVaga.css" rel="stylesheet">
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="..\img\undraw_learning_sketching_nd4f.svg" alt="img">
        </div>
        <div class="form">
            <form action="./Funcoes/cadastroVagas.php" method="POST" name="cadastroVagas">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastrar vagas</h1>
                    </div>
                    
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nomeEmpresa">Nome da empresa</label>
                        <input id="nomeEmpresa" type="text" name="nomeEmpresa" placeholder="Digite o nome da empresa" required>
                    </div>

                    <div class="input-box">
                        <label for="cargo">Cargo</label>
                        <input id="cargo" type="text" name="cargo" placeholder="Digite o cargo" required>
                    </div>
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="local">Local de trabalho</label>
                        <input id="local" type="text" name="local" placeholder="Local de trabalho" required>
                    </div>

                    <div class="input-box">
                        <label for="requisitos">Requisitos</label>
                        <input id="requisitos" type="text" name="requisitos" placeholder="Digite os requisitos" required>
                    </div>


                    <div class="input-box">
                        <label for="descricao">Descrição</label>
                        <input id="descricao" type="text" name="descricao" placeholder="Descrição da vaga" required>
                    </div>

                </div>

                <div class="turno-inputs">
                    <div class="turno-title">
                        <h6>Turno de trabalho</h6>
                    </div>

                    <div class="turno-group">
                        <div class="turno-input">
                            <input id="turno1" type="radio" name="turno" value="1° turno">
                            <label for="turno1">1° turno</label>
                        </div>

                        <div class="turno-input">
                            <input id="turno2" type="radio" name="turno" value="2° turno">
                            <label for="turno2">2° turno</label>
                        </div>

                        <div class="turno-input">
                            <input id="turno3" type="radio" name="turno" value="3° turno">
                            <label for="turno3">3° turno</label>
                        </div>

                        <div class="turno-input">
                            <input id="turno4" type="radio" name="turno" value="Comercial">
                            <label for="turno4">Comercial</label>
                        </div>
                    </div>
                </div>

                <div class="continue-button">
                    <input type="submit" name="cadastrar" value="Cadastrar" /> 
                </div>
            </form>
        </div>
    </div>
</body>

</html>

