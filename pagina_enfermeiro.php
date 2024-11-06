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
    if (!isset($_SESSION['enfermeiro_id'])) {
        header("Location: login_enfermeiro.php"); 
        exit();
    }
    
    echo "<h1>Bem-vindo, " . $_SESSION['enfermeiro_nome'] . "! </h1>";
    ?>
    <label for="turmas">Escolha a receita para colocar a data que foi aplicada</label><br> <br>
            <?php
                include ("conexao.php");
                $comandoSQL = 'SELECT * FROM `receitas`';   
                $comando = $conexao->prepare($comandoSQL);
                $resultado = $comando->execute();

                if ($resultado) {
                    while ($linha = $comando->fetch()) {
                        echo "<a href=\"atualizar_receitas.php?id={$linha['id']}\">Registrar {$linha['nome_medicamento']} para {$linha['nome_paciente']}</a><br><br>";            
                    }
                } else {
                    echo "<option value=\"\">Erro ao carregar turmas</option>";
                }
            ?>
        <br>
</body>
</html>
