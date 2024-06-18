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
    <h2><?php if(isset($_COOKIE["cadastroEnun"])){ echo "<br>" . $_COOKIE["cadastroEnun"] . "<br>";}?></h2>
    <div class="container">
        <form action="appCadastroPergunta.php" method="post">
            <label>Enunciado: </label> <br>
            <textarea name="inputEnunciado" id="" cols="30" rows="10"></textarea>
            <br>

            <label>Matéria: </label>
            <select name="selectMateria" id="materia">
                    <option value="nada">Qualquer</option>
                    <?php
                    require 'conexao.php';
                    $sql = "SELECT idMateria, nomeMateria FROM materia";
                    $result = $conexao->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['idMateria'] . "'>" . $row['nomeMateria'] . "</option>";
                        }
                    }
                    ?>
                </select>
            <br>

            <label>Tipo de pergunta: </label>
            <select name="selectTipoPergunta" id="">
                <option value="2">Dissertativa</option>
                <option value="1">Alternativa</option>
            </select>
            <br>

            <button type="submit" name="A">Adicionar pergunta</button>
        </form>
    </div>
</body>

</html>