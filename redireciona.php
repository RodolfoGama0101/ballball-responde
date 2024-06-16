<?php 
session_start();

if (isset($_SESSION["email2"])){

$email = $_SESSION["email2"];

if ($email == "") {
}else{
    print ("<script> location = 'main.php'</script>");
}}

?>