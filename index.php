<?php
include "redireciona.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Página de Login</h1>

    <form action="checklogin.php" method="post">
        <label>Email: </label>
            <input type="text" name="email" placeholder="Email" required="required">
        <label>Senha: </label>
            <input type="password" name="pass" placeholder="Senha" required="required">
        <button type="submit" name="submit">Fazer login</button>
    </form>
    <a href="cadastro.php">Não possui uma conta?</a>
</body>
</html>