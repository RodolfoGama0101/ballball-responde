<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Select com Dados do Banco</title>
</head>
<body>
    <form action="processar_formulario.php" method="POST">
        <label for="opcao">Selecione uma opção:</label>
        <select name="opcao" id="opcao">
            <?php
            require 'conexao.php';
            $sql = "SELECT idMateria, nomeMateria FROM materia";
            $result = $conexao->query($sql);

            // Verificar se encontrou resultados
            if ($result->num_rows > 0) {
                // Loop para exibir cada opção dentro do select
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['idMateria'] . "'>" . $row['nomeMateria'] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhuma opção encontrada</option>";
            }
            // Fechar conexão com o banco de dados
            $conexao->close();
            ?>
        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>