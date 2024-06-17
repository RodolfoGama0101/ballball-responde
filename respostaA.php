<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de resposta argumentativa</title>
</head>

<body>
    <h1>Cadastro das alternativas</h1>
    <script>

    </script>

    <form action="appRespostaA.php" method="post">
        <label>Alternativa A: </label>
            <input type="text" name="a"> 
            <input type="radio" name="correta" id="correta" value="1"> <label>Correta</label> <br>
        <label>Alternativa B: </label>
            <input type="text" name="b"> 
            <input type="radio" name="correta" id="correta" value="2"> <label>Correta</label> <br>
        <label>Alternativa C: </label>
            <input type="text" name="c"> 
            <input type="radio" name="correta" id="correta" value="3"> <label>Correta</label> <br>
        <label>Alternativa D: </label>
            <input type="text" name="d"> 
            <input type="radio" name="correta" id="correta" value="4"> <label>Correta</label> <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>