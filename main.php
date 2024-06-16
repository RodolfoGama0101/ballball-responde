<?php
include "verifica.php";
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ball Ball Responde</title>
    <style>
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background-color: #fafafa;
            display: flex;
            margin: 0;
            padding: 0;
        }

        b {
            color: Green;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-top: 10%;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            width: 270px;
            height: auto;
            transition: all 0.3s ease-out;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        nav {
            display: flex;
            justify-content: center;
        }

        main {
            display: flex;
            justify-content: center;
            flex-direction: column;
            border: 1px solid gray;
        }

        .dir {
            width: 100%;
            padding: 1rem;
        }

        .esq {
            width: 20vw;
            padding: 1rem;
        }

        .checks {
            display: flex;
        }

        .quantia {
            width: 10vw;
        }

        .aplicar {
            margin-top: 1rem;
            width: 100%;
        }

        a {
            padding: 0.5rem;
        }

        .qtd-questoes {
            width: 40px;
        }

        .a-logout {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="esq">
        <h1>Filtrar</h1>
        <div class="">
            <h2>Matérias</h2>
            <form method="post" onsubmit="atualiza()">
                <label for="materia">Selecione uma materia:</label>
                <select name="materia" id="materia">
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
                <label>Quantidade de questoes:</label>
                <input type="number" name="qtd" placeholder="2" required="required" class="qtd-questoes"><br>
                <hr/>
                
        </div>
    </div>
    <div class="dir">
        <!-- cabecalho -->
        <header>
            <nav>
                <input type="text" name="pesquisa" placeholder="pesquise pelo enunciado..." />
                <input type="submit" value="pesquisar">
            </nav>
            </form>
            <hr />
        </header>

        <!-- seção dos enunciados -->
        <main>
            <div class="container" id="container"></div>
        </main>
        <button type="button"><a href="logout.php" class="a-logout">Logout</a></button>
    </div>

    <script>
        atualiza();
        function atualiza() {
            <?php
            $qtd = $_POST['qtd'];
            if ($qtd <= 0) {
                echo "alert('Quantidade de questões deve ser um numero positivo');";
            }
            $pesquisa = $_POST['pesquisa'];
            $materia = $_POST['materia'];
            if($materia == "nada"){
                $sql = "SELECT * FROM pergunta ORDER BY RAND() LIKE \"%$pesquisa%\"  LIMIT $qtd;";
            }else{
                $sql = "SELECT * FROM pergunta WHERE idmateria = '$materia' ORDER BY RAND() LIKE "%$pesquisa%" LIMIT $qtd;";    
            }
            $pergunta = $conexao->query($sql);

            if ($pergunta->num_rows > 0) {
                while ($row_perg = $pergunta->fetch_assoc()) {
                    $enunciado = $row_perg["enunciado"];
                    $tipo = $row_perg["idtipo"];
                    $certa = '';
                    $erradas = [];

                    if ($tipo == 1) {
                        $id = $row_perg["idPergunta"];
                        $sqlResposta = "SELECT * FROM resposta WHERE idperg = '$id'";
                        $resposta = $conexao->query($sqlResposta);
                        if ($resposta->num_rows > 0) {
                            while ($row_resp = $resposta->fetch_assoc()) {
                                if ($row_resp["idalternativa"] == 1) {
                                    $certa = $row_resp["descricao"];
                                } else {
                                    $erradas[] = $row_resp["descricao"];
                                }
                            }
                        }
                    }

                    $objeto = [
                        'enunciado' => $enunciado,
                        'descricaoc' => $certa,
                        'descricaoe' => implode("<p>", $erradas)
                    ];

                    $dados[] = $objeto;
                }
            }
            ?>
                document.getElementById('container').innerHTML = '';     
                const dadosCartas = <?php echo json_encode($dados); ?>

                dadosCartas.forEach(dado => {
                const novaCarta = document.createElement('div');
                novaCarta.classList.add('card');

                const enunciado = document.createElement('h2');
                enunciado.innerHTML = dado.enunciado;
                const descricaoc = document.createElement('b');
                descricaoc.innerHTML = dado.descricaoc;
                const descricaoe = document.createElement('p');
                descricaoe.innerHTML = dado.descricaoe;

                novaCarta.appendChild(enunciado);
                novaCarta.appendChild(descricaoc);
                novaCarta.appendChild(descricaoe);

                document.getElementById('container').appendChild(novaCarta);
                });
            }
        </script>

    </body>
</html>