<?php
session_start(); 
include("conexao.php"); 

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$codigoSQL = "SELECT * FROM tblenfermeiro WHERE usuario = :usuario";
$comando = $conexao->prepare($codigoSQL);
$comando->execute(array(':usuario' => $usuario));
$enfermeiro = $comando->fetch(PDO::FETCH_ASSOC); 

if ($enfermeiro) {
    if (password_verify($senha, $enfermeiro['senha'])) {
        $_SESSION['enfermeiro_id'] = $enfermeiro['id']; 
        $_SESSION['enfermeiro_nome'] = $enfermeiro['nome']; 

        header("Location: pagina_enfermeiro.php");
        exit();
    } else {
        echo "Usuário ou senha incorretos.";
    }
} else {
    echo "Usuário ou senha incorretos.";
}
?>
