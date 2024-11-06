<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar enfermeiros</title>
</head>
<body>
    <form action="recebe_enfermeiro.php" method="POST">
        <label for="">Digite o nome</label> <br>
        <input type="text" name="nome" id="nome"> <br> <br>
        <label for="">Digite um nome de usuário</label> <br>
        <input type="text" name="usuario" id="usuario"> <br> <br>
        <label for="">Digite a senha</label> <br>
        <input type="password" name="senha" id="senha"> <br> <br>
        <label for="">Digite o seu COREN</label> <br>
        <input type="text" name="coren" id="coren"> <br> <br>
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>