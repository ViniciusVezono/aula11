<?php
session_start(); // Inicia a sessão
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Médico</title>
</head>
<body>
    <h2>Login do Médico</h2>
    <form action="processa_login.php" method="POST">
        <label for="usuario">Usuário:</label><br>
        <input type="text" name="usuario" id="usuario" required><br><br>
        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" id="senha" required><br><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
