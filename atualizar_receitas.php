<?php
session_start();
if (!isset($_SESSION['enfermeiro_id'])) {
    header("Location: login_enfermeiro.php");
    exit();
}

include("conexao.php");

if (isset($_GET['id'])) {
    $receita_id = $_GET['id'];

    
    $comandoSQL = 'SELECT * FROM receitas WHERE id = :id';
    $comando = $conexao->prepare($comandoSQL);
    $comando->execute(array(':id' => $receita_id));
    $receita = $comando->fetch();

    // Verifica se a receita existe
    if (!$receita) {
        echo "Receita não encontrada!";
        exit();
    }
} else {
    echo "ID da receita não informado!";
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nome_paciente = $_POST['nome_paciente'];
    $nome_medicamento = $_POST['nome_medicamento'];
    $data_administracao = $_POST['data_administracao'];
    $hora_administracao = $_POST['hora_administracao'];
    $dose = $_POST['dose'];

    
    $comandoSQL = "UPDATE receitas SET 
        nome_paciente = :nome_paciente,
        nome_medicamento = :nome_medicamento,
        data_admnistracao = :data_administracao,
        hora_admnistracao = :hora_administracao,
        dose = :dose
        WHERE id = :id";
    
    $comando = $conexao->prepare($comandoSQL);

    
    $resultado = $comando->execute(array(
        ':nome_paciente' => $nome_paciente,
        ':nome_medicamento' => $nome_medicamento,
        ':data_administracao' => $data_administracao,
        ':hora_administracao' => $hora_administracao,
        ':dose' => $dose,
        ':id' => $receita_id
    ));

    if ($resultado) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados!";
    }

    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Receita</title>
</head>
<body>
    <h1>Atualizar Receita para o Paciente: <?php echo htmlspecialchars($receita['nome_paciente']); ?></h1>

    <form method="POST">
        <label for="nome_paciente">Nome do Paciente:</label>
        <input type="text" id="nome_paciente" name="nome_paciente" value="<?php echo htmlspecialchars($receita['nome_paciente']); ?>" required><br><br>

        <label for="nome_medicamento">Nome do Medicamento:</label>
        <input type="text" id="nome_medicamento" name="nome_medicamento" value="<?php echo htmlspecialchars($receita['nome_medicamento']); ?>" required><br><br>

        <label for="data_administracao">Data da Administração:</label>
        <input type="date" id="data_administracao" name="data_administracao" required><br><br>

        <label for="hora_administracao">Hora da Administração:</label>
        <input type="time" id="hora_administracao" name="hora_administracao"  required><br><br>

        <label for="dose">Dose:</label>
        <input type="text" id="dose" name="dose" value="<?php echo htmlspecialchars($receita['dose']); ?>" required><br><br>

        <input type="submit" value="Atualizar Receita">
    </form>

</body>
</html>
    