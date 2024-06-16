<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar</title>
</head>
<body>
    <h1>Página de Adicionar pergunta</h1>

    <form action="checkcadastro.php" method="post">
        <label><b>Pergunta:</b></label>
        <br><textarea rows="5" cols="35">
        </textarea>
    
        <h4>tipo da pergunta:</h4> 
        
        <input type="radio" value="0" name="tipo" required>Alternativa    
        
        <input type="radio" value="1" name="tipo" required>dissertativa <br>

        <button type="submit" name="entrar">Adicionar</button>
    </form>
</body>
</html>
<?php
$array = [1,2,3];
array_push($array, 4);
echo $array[4];
?>