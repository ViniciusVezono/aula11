<?php
include("conexao.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
   $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);   
    $coren = $_POST['coren'];
    $data_hora = date('Y-m-d H:i:s');
}

$codigoSQL = "INSERT INTO `tblenfermeiro` (`nome`, `coren`, `usuario`, `senha`, `data_criada`) VALUES (:nome, :coren , :usuario, :senha, :datah)";

try{
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array(
        'nome' => $nome,
        'coren' => $coren,
        'usuario' => $usuario,
        'senha' => $senha,
        'datah' => $data_hora
    ));

    if($resultado) {
	echo "Comando executado!";
    echo "<a href='login_enfermeiro.php'>Faça o login</a>"; 
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

?>