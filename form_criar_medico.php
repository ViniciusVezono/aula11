<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar médico</title>
</head>
<body>
    <form action="recebe_medico.php" method="POST">
        <label for="">Digite o nome o seu nome</label> <br>
        <input type="text" name="nome" id="nome"> <br> <br>
        <label for="">Digite um nome de usuário</label> <br>
        <input type="text" name="usuario" id="usuario"> <br> <br>
        <label for="">Digite a senha</label> <br>
        <input type="password" name="senha" id="senha"> <br> <br>
        <label for="">Digite a sua especialidade</label> <br>
        <input type="text" name="especialidade" id="especialidade"> <br> <br>
        <label for="">Escreva o seu CRM </label> <br>
        <input type="text" name="crm" id="crm"> <br> <br>
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>