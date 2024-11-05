<?php
session_start(); 
include("conexao.php"); 

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$codigoSQL = "SELECT * FROM tblmedicos WHERE usuario = :usuario";
$comando = $conexao->prepare($codigoSQL);
$comando->execute(array(':usuario' => $usuario));
$medico = $comando->fetch(PDO::FETCH_ASSOC); // Busca os dados do médico

if ($medico) {
    // Verifica a senha (usando password_verify se a senha estiver criptografada)
    if (password_verify($senha, $medico['senha'])) {
        $_SESSION['medico_id'] = $medico['id']; // Armazena o ID do médico
        $_SESSION['medico_nome'] = $medico['nome']; // Armazena o nome do médico

        // Redireciona para a página principal do médico
        header("Location: pagina_medico.php");
        exit();
    } else {
        echo "Usuário ou senha incorretos.";
    }
} else {
    echo "Usuário ou senha incorretos.";
}
?>
