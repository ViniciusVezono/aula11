<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['medico_id'])) {
        header("Location: login_medico.php"); 
        exit();
    }
    
    echo "<h1>Bem-vindo, " . $_SESSION['medico_nome'] . "! </h1>";
    ?>

    <h2>Cadastro de paciente</h2>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome"> <br><br>
        <label for="leito">Leito:</label>
        <input type="text" name="leito" id="leito">
        <input type="submit" name="cadastrar_paciente" value="Cadastrar Paciente">
    </form>

    <?php
    include("conexao.php");

    // Cadastro de paciente
    if (isset($_POST['cadastrar_paciente']) && isset($_POST['nome'])) {
        $nome = $_POST['nome'];
        $leito = $_POST['leito'];

        $codigoSQL = "INSERT INTO `tblpaciente` (`nome`, `leito`) VALUES (:nome, :leito)";
        try {
            $comando = $conexao->prepare($codigoSQL);

            $resultado = $comando->execute(array(
                ':nome' => $nome,
                ':leito' => $leito
            ));

            if ($resultado) {
                echo "Paciente cadastrado com sucesso!<br>";
            } else {
                echo "Erro ao cadastrar paciente!<br>";
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    ?>

    <h2>Cadastrar receitas</h2>
    <form method="post">
        <label for="nome_p">Nome do paciente:</label>
        <input type="text" name="nome_p" id="nome_p"> <br><br>
        <label for="nome_medicamento">Nome do medicamento:</label>
        <input type="text" name="nome_medicamento" id="nome_medicamento"> <br><br>
        <label for="dose">Dose do medicamento:</label>
        <input type="text" name="dose" id="dose"> <br><br>
        <input type="submit" name="cadastrar_receita" value="Cadastrar Receita">
    </form>

    <?php

    if (isset($_POST['cadastrar_receita']) && isset($_POST['nome_p'])) {
        $nome_p = $_POST['nome_p'];
        $nome_medicamento = $_POST['nome_medicamento'];
        $dose = $_POST['dose'];
        $data = date('Y-m-d');
        $hora = date('H:i:s');

        $checkPacienteSQL = "SELECT * FROM `tblpaciente` WHERE `nome` = :nome_p";
        $comandoCheck = $conexao->prepare($checkPacienteSQL);
        $comandoCheck->execute(array(':nome_p' => $nome_p));

        if ($comandoCheck->rowCount() > 0) {
            $codigoSQL = "INSERT INTO `receitas` (`nome_paciente`, `nome_medicamento`, `data_administracao`, `hora_administracao`, `dose`) VALUES (:nome_p, :nome_m, :data_adm, :hora_adm, :dose)";
            try {
                $comando = $conexao->prepare($codigoSQL);
                $resultado = $comando->execute(array(
                    ':nome_p' => $nome_p,
                    ':nome_m' => $nome_medicamento,
                    ':data_adm' => $data,
                    ':hora_adm' => $hora,
                    ':dose' => $dose
                ));

                if ($resultado) {
                    echo "Receita cadastrada com sucesso!<br>";
                } else {
                    echo "Erro ao cadastrar receita!<br>";
                }
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        } else {
            // Paciente não encontrado, solicitar cadastro
            echo "Paciente não cadastrado! Por favor, cadastre o paciente antes de registrar uma receita.<br>";
        }
    }
    ?>
</body>
</html>
