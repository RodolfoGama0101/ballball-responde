<?php
include "conexao.php";
session_start();

$enunciado = $_SESSION['enunciado'];

$alternativa1 = $_POST['a'];
$alternativa2 = $_POST['b'];
$alternativa3 = $_POST['c'];
$alternativa4 = $_POST['d'];
$correta = intval($_POST['correta']);

$sql = "SELECT idPergunta FROM `pergunta` WHERE `enunciado` = '$enunciado';";
$result = mysqli_query($conexao, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $idPergunta = $row['idPergunta'];
}

if ($alternativa1 != "") {
    if ($correta == "1") {
        $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa1', '1', '$idPergunta');";
        $resultInsert = mysqli_query($conexao, $sql);
    } else {
        $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa1', '2', '$idPergunta');";
        $resultInsert = mysqli_query($conexao, $sql);
    }
}

if ($alternativa2 != "") {
    if ($correta == "2") {
        $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa2', '1', '$idPergunta');";
        $resultInsert = mysqli_query($conexao, $sql);
    } else {
        $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa2', '2', '$idPergunta');";
        $resultInsert = mysqli_query($conexao, $sql);
    }
}

if ($alternativa3 != "") {
    if ($correta == "3") {
        $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa3', '1', '$idPergunta');";
        $resultInsert = mysqli_query($conexao, $sql);
    } else {
        $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa3', '2', '$idPergunta');";
        $resultInsert = mysqli_query($conexao, $sql);
    }
}
if ($alternativa4 != "") {
    if ($correta == "4") {
        $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa4', '1', '$idPergunta');";
        $resultInsert = mysqli_query($conexao, $sql);
    } else {
        $sql = "INSERT INTO `resposta` (`idResposta`, `descricao`, `idalternativa`, `idperg`) VALUES (NULL, '$alternativa4', '2', '$idPergunta');";
        $resultInsert = mysqli_query($conexao, $sql);
    }
}
print ("<script> document.location='main.php' </script>");
?>