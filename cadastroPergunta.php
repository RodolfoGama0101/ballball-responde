<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de perguntas</title>

    <style>
        .container * {
            margin: 5px;
        }

        h1 {
            margin: 5px;
        }
    </style>
</head>

<body>
    <h1>Adicionar perguntas</h1>
    <div class="container">
        <form action="appCadastroPergunta.php" method="post">
            <label>Enunciado: </label> <br>
            <textarea name="inputEnunciado" id="" cols="30" rows="10"></textarea>
            <br>

            <label>Matéria: </label>
            <select name="selectMateria" id="select-materia">
                <option value="1">Matemática</option>
                <option value="2">Português</option>
                <option value="3">História</option>
            </select>
            <br>

            <label>Tipo de pergunta: </label>
            <select name="selectTipoPergunta" id="">
                <option value="2">Dissertativa</option>
                <option value="1">Alternativa</option>
            </select>
            <br>

            <button type="submit">Adicionar pergunta</button>
        </form>
    </div>
</body>

</html>