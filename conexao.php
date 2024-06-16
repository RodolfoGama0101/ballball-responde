<?php 
header("Content-Type: text/html; charset-utf-8");

// Conexão com o Bando de Dados
$banco = "ballball_responde";// Depois de criado colocar o nome do banco de dados
$usuario = "root";
$senha = "";
$hostname = "localhost"; // Pode colocar "localhost"

$conexao = mysqli_connect($hostname, $usuario, $senha) or die(mysqli_error());
$banco2 = mysqli_select_db($conexao, $banco) or die("ERRO! Não foi possível conectar ao banco MySQL");

?> 