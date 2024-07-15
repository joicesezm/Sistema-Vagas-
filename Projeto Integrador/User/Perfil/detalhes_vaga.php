<?php
// detalhes_vaga.php

if (isset($_GET['idVaga'])) {
  $idVaga = $_GET['idVaga'];

  // Conectar ao banco de dados
  include '../../Data/conexao.php';

  // Consulta SQL para buscar detalhes da vaga com base no idVaga
  $sql = "SELECT * FROM vaga WHERE idVaga = $idVaga";
  $result = $conexao->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Gerar HTML com os detalhes da vaga
    echo "<h2>" . $row['nomEmpresa'] . "</h2>";
    echo "<p><strong>Cargo:</strong> " . $row['cargo'] . "</p>";
    echo "<p><strong>Turno:</strong> " . $row['turno'] . "</p>";
    echo "<p><strong>Requisitos:</strong> " . $row['requisitos'] . "</p>";
    echo "<p><strong>Descrição das atividades:</strong> " . $row['descAtividades'] . "</p>";
    echo "<p><strong>Endereço:</strong> " . $row['endereco'] . "</p>";
    echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
  } else {
    echo "Vaga não encontrada";
  }

  $conexao->close();
} else {
  echo "ID da vaga não fornecido";
}
?>
