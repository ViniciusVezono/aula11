<?php
    $servidor = 'localhost';
    $banco = 'medicacao';
    $usuario = 'root';
    $senha = '';
    $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>