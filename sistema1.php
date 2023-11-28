<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'formulario_blood';
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_errno) {
    echo "Erro na conexão: " . $conexao->connect_error;
}

// Selecionar dados do banco de dados
$sql = "SELECT * FROM formulario_blood ORDER BY id DESC";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabela de Busca de Bancos de Dados</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(228, 29, 29), rgb(255, 0, 0), rgb(81, 4, 4), rgb(58, 2, 2));
            color: red;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
    table {
      border-collapse: collapse;
      width: 100%;
      color: black; 
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
      background-color: white; 
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    input[type="text"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }
    </style>
</head>
<body>
    <div class="center">
        <input type="text" id="searchInput" placeholder="Digite para buscar">
    </div>
    <table id="dataTable">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Gênero</th>
                <th>Data de Nascimento</th>
                <th>Possui 50 ou mais quilos</th>
                <th>Tipo Sanguíneo</th>
                <th>Cidade</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Exibir dados do banco de dados na tabela
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['genero'] . "</td>";
                    echo "<td>" . $row['data_nasc'] . "</td>";
                    echo "<td>" . $row['possui50quilosoumais'] . "</td>";
                    echo "<td>" . $row['tipo_sanguineo'] . "</td>";
                    echo "<td>" . $row['cidade'] . "</td>";
                    echo "<td>" . $row['estado'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Nenhum dado encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        // O script permanece o mesmo
    </script>

</body>
</html>
