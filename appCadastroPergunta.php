<?php 
include("conexao.php");

$inputEnunciado = $_POST['inputEnunciado'];
$inputMateria = $_POST['selectMateria'];
$inputTipoPergunta = $_POST['selectTipoPergunta'];

$query = "INSERT INTO `pergunta` (`idPergunta`, `enunciado`, `idmateria`, `idtipo`) VALUES (NULL, '$inputEnunciado', '$inputMateria', '$inputTipoPergunta');";

$result = mysqli_query($conexao, $query);

if ($inputTipoPergunta == 1) { 
    print("<script> document.location='respostaA.php' </script>");
}

?>