<?php
include("conexao.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
   $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);   
    $crm = $_POST['crm'];
    $especialidade = $_POST['especialidade'];
    $data_hora = date('Y-m-d H:i:s');
}

$codigoSQL = "INSERT INTO `tblmedicos` (`nome`, `especialidade`, `crm`, `usuario`, `senha`, `data_criada`) VALUES (:nome, :espec, :crm , :usuario, :senha, :datah)";

try{
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array(
        'nome' => $nome,
        'espec' => $especialidade,
        'crm' => $crm,
        'usuario' => $usuario,
        'senha' => $senha,
        'datah' => $data_hora
    ));

    if($resultado) {
	echo "Comando executado!";
    echo "<a href='login_medico.php'>faça o login</a>"; 
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

?>