<?php 
if(isset($_POST['entrar'])){
include "conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$pass = $_POST["pass"];

// echo $user . " - " . "$pass";

$query = "SELECT * FROM login WHERE email = '$email'";

// echo " ";
// echo $query;

$result = mysqli_query($conexao, $query);

$existe = mysqli_num_rows($result);

// echo " ";
// echo $existe;

if ($existe == 1) {
    $mensagem = "O cadastro não foi possivel porque ja esxiste o email cadastrado";
    setcookie("mensagem", "$mensagem", time() + (5));
    echo("<script> document.location='cadastro.php' </script>");
} else {
    $query = "INSERT INTO `login` (`idLogin`, `nome`, `email`, `senha`) VALUES (NULL, '$nome', '$email', '$pass');";
    $result = mysqli_query($conexao, $query);
    session_start();
    $_SESSION["email2"] = $email;
    print("<script> document.location='main.php' </script>");
}
}else{
    print("<script> document.location='main.php' </script>");
}
?>