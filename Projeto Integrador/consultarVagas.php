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
    <style>
  /* Estilos para o modal */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
  }
  .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  .vaga {
    margin-bottom: 10px;
    cursor: pointer;
    border: 1px solid #ccc;
    padding: 10px;
    width: 300px;
  }
  .vaga:hover {
    background-color: #f0f0f0;
  }
</style>
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

<h2>Vagas de Emprego</h2>

<!-- Lista de vagas -->
<div id="listaVagas">
  <?php
  // PHP para recuperar dados do banco de dados e exibir na lista
  include './Data/conexao.php';

  $sql = "SELECT idVaga, nomEmpresa, cargo, turno FROM vaga";
  $result = $conexao->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      // Exibindo apenas nome da empresa, cargo e turno
      echo "<div class='vaga' onclick='openModal(" . $row['idVaga'] . ")'>";
      echo "<h3>" . $row['nomEmpresa'] . "</h3>";
      echo "<p><strong>Cargo:</strong> " . $row['cargo'] . "</p>";
      echo "<p><strong>Turno:</strong> " . $row['turno'] . "</p>";
      echo "</div>";
    }
  } else {
    echo "0 resultados";
  }

  $conexao->close();
  ?>
</div>

<!-- Modal -->
<div id="myModal" class="modal">
  <!-- Conteúdo do modal -->
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <div id="modalContent">
      <!-- Aqui serão exibidas as informações detalhadas da vaga -->
    </div>
    <!-- Botão "Candidatar-se para vaga" -->
    <button onclick="chata()">Candidatar-se para vaga</button>
    <script>
        function chata(){
            alert('Cadastre-se para se Candidatar');
            window.location.href='./User/cadastro.php'
        }
    </script>
  </div>
</div>

<script>
// Funções JavaScript para abrir e fechar o modal
function openModal(idVaga) {
  // Requisição AJAX para buscar detalhes da vaga
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("modalContent").innerHTML = this.responseText;
      document.getElementById('myModal').style.display = 'block';
    }
  };
  xhttp.open("GET", "detalhes_vaga.php?idVaga=" + idVaga, true);
  xhttp.send();
}

function closeModal() {
  document.getElementById('myModal').style.display = 'none';
}

// Fechar o modal clicando fora da área do modal
window.onclick = function(event) {
  var modal = document.getElementById('myModal');
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>




    </div>

    <div class="btn-group">
        <a href="User/cadastro.php" class="btn">Cadastrar</a>
        <a href="User/login.php" class="btn">Login</a>
    </div>

  <div>
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
    </div>
</body>
</html>
