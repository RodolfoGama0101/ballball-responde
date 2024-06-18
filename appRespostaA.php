<?php 
include("conexao.php");
include("appCadastroPergunta.php");

$alternativa1 = $_POST['a'];
$alternativa2 = $_POST['b'];
$alternativa3 = $_POST['c'];
$alternativa4 = $_POST['d'];
$correta = $_POST['correta'];

$sql = "SELECT idPergunta FROM `pergunta` WHERE `enunciado` = '$inputEnunciado' AND `idmateria` = $inputMateria AND `idtipo` = $inputTipoPergunta;";
$result = mysqli_query($conexao, $sql);


// echo "Alternativa A: " . $alternativa1 . "<br>";
// echo "Alternativa B: " . $alternativa2 . "<br>";
// echo "Alternativa C: " . $alternativa3 . "<br>";
// echo "Alternativa D: " . $alternativa4 . "<br>";
// echo "Alternativa correta: " . $correta;

if ($correta = 1) {
    $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa1', '1', '$result');";
    $result = mysqli_query($conexao, $sql);
} else {
    $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa1', '2', '$result');";
    $result = mysqli_query($conexao, $sql);
}

if ($correta = 2) {
    $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa2', '1', '$result');";
    $result = mysqli_query($conexao, $sql);
} else {
    $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa2', '2', '$result');";
    $result = mysqli_query($conexao, $sql);
}

if ($correta = 3) {
    $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa3', '1', '$result');";
    $result = mysqli_query($conexao, $sql);
} else {
    $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa3', '2', '$result');";
    $result = mysqli_query($conexao, $sql);
}

if ($correta = 4) {
    $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa4', '1', '$result');";
    $result = mysqli_query($conexao, $sql);
} else {
    $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa4', '2', '$result');";
    $result = mysqli_query($conexao, $sql);
}

?>