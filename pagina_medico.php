
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
    <form action="">
        <label for="">Nome:</label>
        <input type="text" name="nome" id="nome"> <br> <br>
        <label for="">Leito:</label>
        <input type="text" name="leito" id="leito">
        <input type="submit" value="Enviar">
    </form>
    <?php
    include("conexao.php");
    if (isset($_POST['nome'])) {
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
                echo "Paciente cadastrado com sucesso!"; 
            } else {
                echo "Erro ao cadastrar paciente!";
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    ?>

</body>
</html>