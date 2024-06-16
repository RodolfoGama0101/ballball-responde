<?php 
if(isset($_POST['submit'])){
include "conexao.php";

$email = $_POST["email"];
$pass = $_POST["pass"];

// echo $user . " - " . "$pass";

$query = "SELECT * FROM login WHERE email = '$email' AND senha = '$pass'";

// echo " ";
// echo $query;

$result = mysqli_query($conexao, $query);

$existe = mysqli_num_rows($result);

// echo " ";
// echo $existe;

if ($existe == 1) {
    echo "<h1>Carregando...</h1>";
    session_start();
    $_SESSION["email2"] = $email;
    print("<script> document.location='main.php' </script>");
} else {
    print "<script> document.location='login.php' </script>";
}
} else {
    print "<script> document.location='login.php' </script>";
}
?>