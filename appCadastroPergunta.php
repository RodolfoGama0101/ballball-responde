<?php
if (isset($_POST['A'])) {
    include ("conexao.php");

    $inputEnunciado = $_POST['inputEnunciado'];
    $inputMateria = $_POST['selectMateria'];
    $inputTipoPergunta = $_POST['selectTipoPergunta'];

        $query = "SELECT * FROM pergunta WHERE enunciado = '$inputEnunciado'";

        $result = mysqli_query($conexao, $query);

        $existe = mysqli_num_rows($result);

        if ($existe == 1) {
            $mensagem = "Esta pergunta já existe!";
            setcookie("cadastroEnun", "$mensagem", time() + (5));
            echo ("<script> document.location='cadastroPergunta.php' </script>");
        } else {
            $query = "INSERT INTO `pergunta` (`idPergunta`, `enunciado`, `idmateria`, `idtipo`) VALUES (NULL, '$inputEnunciado', '$inputMateria', '$inputTipoPergunta');";
            $result = mysqli_query($conexao, $query);
            if ($inputTipoPergunta == 1) {
                session_start();
                $_SESSION['enunciado'] = $inputEnunciado;
                print ("<script> document.location='respostaA.php' </script>");
        }
        }
    print ("<script> document.location='main.php' </script>");
}
?>