<?php
include_once('config1.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['Nome'];
    $email = $_POST['E-mail'];
    $genero = $_POST['gênero'];
    $data_nasc = $_POST['data-nascimento'];
    $possui50quilosoumais = $_POST['Pergunta'];
    $tipo_sanguineo = $_POST['tipo-sanguineo'];
    $cidade = $_POST['Cidade'];
    $estado = $_POST['Estado'];

    $stmt = $conexao->prepare("INSERT INTO formulario_blood (nome, email, genero, data_nasc, possui50quilosoumais, tipo_sanguineo, cidade, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nome, $email, $genero, $data_nasc, $possui50quilosoumais, $tipo_sanguineo, $cidade, $estado);
    $stmt->execute();
    $stmt->close();

    // Verificar se os dados existem no banco antes de redirecionar
    $sql = "SELECT * FROM formulario_blood WHERE email = '$email' AND nome = '$nome' AND genero = '$genero' AND data_nasc = '$data_nasc' AND possui50quilosoumais = '$possui50quilosoumais' AND tipo_sanguineo = '$tipo_sanguineo' AND cidade = '$cidade' AND estado = '$estado'";
    $result = mysqli_query($conexao, $sql);

    if ($result) {
        // Se os dados existirem, redirecionar para a página desejada
        header("Location: sistema1.php");
        exit();
    } else {
        // Lógica adicional ou tratamento de erro, se necessário
        echo "Erro ao verificar os dados no banco de dados.";
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<h1></h1>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Tipo Sanguíneo | GN</title>
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

        .box {
            background: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 80%;
            max-width: 500px;
            color: white;
        }

        fieldset {
            border: 3px solid white;
            background-color: #000;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }

        legend {
            border: 1px solid white;
            padding: 10px;
            text-align: center;
            background-color: white;
            border-radius: 8px;
            color: black;
        }

        .inputbox {
            position: relative;
            margin-bottom: 20px;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
        }

        .labelInput {
            position: absolute;
            top: 0;
            left: 0;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus~.labelInput,
        .inputUser:valid~.labelInput {
            top: -20px;
            font-size: 12px;
            color: white;
        }

        #data-nascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
    </style>
</head>

<body>

    <div class="box">
        <form action="projeto1.php" method="POST">
            <fieldset>
                <legend><b>Cadastre Seu Tipo Sanguíneo</b></legend>

                <div class="inputbox">
                    <input type="text" name="Nome" id="nome" class="inputUser" required>
                    <label for="Nome" class="labelInput">Nome Completo</label>
                </div>

                <div class="inputbox">
                    <input type="text" name="E-mail" id="e-mail" class="inputUser" required>
                    <label for="E-mail" class="labelInput">E-mail</label>
                </div>

                <div class="inputbox">
                    <input type="text" name="Telefone" id="Telefone" class="inputUser" required>
                    <label for="Telefone" class="labelInput">Telefone</label>
                </div>

                <p>Gênero</p>
                <div class="inputbox">
                    <input type="radio" id="Masculino" name="gênero" value="Masculino" required>
                    <label for="Masculino">Masculino</label><br>

                    <input type="radio" id="Feminino" name="gênero" value="Feminino" required>
                    <label for="Feminino">Feminino</label><br>

                    <input type="radio" id="Outro" name="gênero" value="Outro" required>
                    <label for="Outro">Outro</label>
                </div>

                <label for="data-nascimento">Data de Nascimento</label>
                <input type="date" id="data-nascimento" name="data-nascimento" required><br>

                <p>Possui 50 quilos ou mais?</p>
                <div class="inputbox">
                    <input type="radio" id="Sim" name="Pergunta" value="Sim" required>
                    <label for="Sim">Sim</label><br>

                    <input type="radio" id="Não" name="Pergunta" value="Não" required>
                    <label for="Não">Não</label>
                </div>

                <div class="inputbox">
                    <input type="text" name="tipo-sanguineo" id="tipo-sanguineo" class="inputUser" required>
                    <label for="tipo-sanguineo" class="labelInput">Seu tipo sanguíneo</label>
                </div>

                <div class="inputbox">
                    <input type="text" name="Cidade" id="Cidade" class="inputUser" required>
                    <label for="Cidade" class="labelInput">Cidade</label>
                </div>

                <div class="inputbox">
                    <input type="text" name="Estado" id="Estado" class="inputUser" required>
                    <label for="Estado" class="labelInput">Estado</label>
                </div>

                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

</body>

</html>
