<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de cargos</title>
    <link rel="stylesheet" href="../cadastroCargo.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
        input[type="text"] {
            width: 60%;
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="cadastroCargos.php" method="POST">
            <fieldset>
                <h1>Cadastro de cargos</h1>
                <div>
                    <label for="cargo">Cadastrar cargo</label> <br>
                    <input id="cargo" type="text" name="cargo" placeholder="Digite o nome do cargo" required>
                </div>
                <div class="cadastrar-button">
                    <input type="submit" name="cadastrar" value="Cadastrar">
                </div>
            </fieldset>
        </form>

        <?php 
        require_once("conexao.php");
 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cadastrar"])) {
            $cargoD = $_POST["cargo"];

            // Verifica se o campo não está vazio antes de inserir
            if (!empty($cargoD)) {
                $sql = "INSERT INTO cargos (cargo) VALUES ('$cargoD')";
                $resultadoCargos = mysqli_query($conexao, $sql);

                if ($resultadoCargos) {
                    echo "<p>Dados cadastrados com sucesso!</p>";
                } else {
                    echo "<p>Erro ao cadastrar cargo: " . mysqli_error($conexao) . "</p>";
                }
            } else {
                echo "<p>O campo cargo não pode estar vazio.</p>";
            }
        }
 
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idCargos"])) {
            $idCargos = $_GET["idCargos"];

             $sql = "DELETE FROM cargos WHERE idCargos = $idCargos";

            if ($conexao->query($sql) === TRUE) {
                echo "<p>Cargo excluído com sucesso.</p>";
            } else {
                echo "<p>Erro ao excluir cargo: " . $conexao->error . "</p>";
            }
        }
 
        $sql1 = "SELECT idCargos, cargo FROM cargos;";
        $result = $conexao->query($sql1);

        if ($result->num_rows > 0) {
            // Exibe os resultados na tabela HTML
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Cargo</th>";
            echo "<th>Ação</th>";
            echo "</tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["idCargos"] . "</td>";
                echo "<td>" . $row["cargo"] . "</td>";
                echo "<td><a href='cadastroCargos.php?idCargos=" . $row["idCargos"] . "'>Excluir</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum resultado encontrado.";
        }

        $conexao->close();
        ?>
    </div>
</body>
</html>
