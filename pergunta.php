<?php
include "verifica.php";
include "conexao.php";

$qtd = $_POST['qtd'];
$pesquisa = $_POST['pesquisa'];
$materia = $_POST['materia'];

if ($qtd <= 0) {
    setcookie('mensagemqtd', 'Coloque um número positivo', time() + (5));
    echo "<script> document.location='main.php' </script>";
}

if ($materia == "nada") {
    $sql = "SELECT * FROM pergunta WHERE enunciado LIKE '%$pesquisa%' ORDER BY RAND() LIMIT $qtd;";
} else {
    $sql = "SELECT * FROM pergunta WHERE idmateria = '$materia' AND enunciado LIKE '%$pesquisa%' ORDER BY RAND() LIMIT $qtd;";
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
            'descricaoe' => implode('<p>', $erradas)
        ];

        $dados[] = $objeto;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BallBall Responde - Pergunta</title>

    <style>
        b {
            color: green;
        }

        html,
        body,
        input {
            padding: 0;
            margin: 0;
        }

        body {
            display: flex;

            justify-content: center;

            height: 90vh;
            width: 85vw;

            background-color: white;
            border-radius: 1rem;
        }

        html {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: black;
            margin-top: 1rem;
        }

        .pergunta {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

        }

        .resposta {
            width: 50vw;
            height: 10vh;
        }

        footer {
            position: absolute;
            height: 5vh;
            display: flex;
            justify-content: space-around;
            margin-top: 90vh;
            width: 85vw;
        }
    </style>
</head>

<body>
    <div class="pergunta" id="pergunta">
        <script>
            var i = 0;
            const passa = document.getElementById("passar");
            const volta = document.getElementById("voltar");
            const dadosCartas = <?php echo json_encode($dados); ?>;
            novaQuestao = document.getElementById("pergunta");
            atualiza();

            function atualiza() {
                novaQuestao.innerHTML = '';

                dado = dadosCartas[i];

                const enunciado = document.createElement('h2');
                enunciado.innerHTML = dado.enunciado;

                const descricaoc = document.createElement('b');
                descricaoc.innerHTML = dado.descricaoc;

                const descricaoe = document.createElement('p');
                descricaoe.innerHTML = dado.descricaoe;

                novaQuestao.appendChild(enunciado);
                novaQuestao.appendChild(descricaoc);
                novaQuestao.appendChild(descricaoe);
            }

            function passar() {
                if (i < dadosCartas.length - 1) {
                    i++;
                    atualiza();

                    if (i == dadosCartas.length - 2) {
                        passar.style.display = 'block'; // Ativa o botão "Próximo"
                    }

                    if (i == dadosCartas.length - 1) {
                        passar.style.display = 'none'; // Desativa o botão "Próximo"
                        voltar.style.display = 'block'; // Ativa o botão "Voltar"
                    }
                }
            }

            function voltar() {
                if (i > 0) {
                    i--;
                    atualiza();

                    if (i == 0) {
                        voltar.style.display = 'none'; // Desativa o botão "Voltar"
                    }

                    if (i == 1) {
                        voltar.style.display = 'block'; // Ativa o botão "Voltar"
                        passar.style.display = 'block'; // Ativa o botão "Próximo"
                    }
                }
            }
        </script>
    </div>

    <!-- Rodapé -->
    <footer>
        <button type="button" id="voltar" onclick="voltar()"><- Anterior</button>
                <a href="main.php"><button>Retornar para a pesquisa</button></a>
                <button type="button" id="passar" onclick="passar()">Próximo -></button>
    </footer>
</body>

</html>