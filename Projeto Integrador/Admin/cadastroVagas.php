
<?php
 session_start();
 include("conexao.php");

// Verifica se os dados foram submetidos via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    // Obtém os valores dos campos do formulário
    $nomeEmpresa = $_POST["nomeEmpresa"];
    $cargo = $_POST["cargo"];
    $email = $_POST["email"];
    $localTrabalho = $_POST["localTrabalho"];
    $requisitos = $_POST["requisitos"];
    $descricao = $_POST["descricao"];
    $turno = $_POST["turno"];


    // Prepara e executa a consulta SQL para inserir os dados na tabela
    $sql = "INSERT INTO vaga (nomEmpresa, idCargo, email, endereco , requisitos, descAtividades, turno)
            VALUES ('$nomeEmpresa', '$cargo', '$email', '$localTrabalho', '$requisitos', '$descricao', '$turno')";
        $resultadoVagas = mysqli_query ($conexao, $sql);

if ($resultadoVagas) {
    echo "<script>alert('Dados cadastrados com sucesso!');</script>";
    header("Location: /home.php");

} else {
    echo "<script>alert('ERRO!');</script>". $conexao->error;
}

// Fecha a conexão com o banco de dados

$conexao->close();
 
?>