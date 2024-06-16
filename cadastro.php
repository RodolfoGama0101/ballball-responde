<?php
include "redireciona.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Página de Cadastro</h1>

    <form action="checkcadastro.php" method="post">
        <label>Nome: </label>
            <input type="text" name="nome" placeholder="Nome" required="required"><br>
        <label>Email: </label>
            <input type="email" name="email" placeholder="Email" required="required">
            <?php if(isset($_COOKIE["mensagem"])){ echo $_COOKIE["mensagem"];}?><br>
        <label>Senha: </label>
            <input type="password" name="pass" placeholder="Senha" required="required"><br>
        <button type="submit" name="entrar">Fazer cadastro</button>
    </form>
    <a href="index.php">Já possui uma conta?</a>
</body>
</html>