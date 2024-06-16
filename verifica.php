<?php 
session_start();

$email = $_SESSION["email2"];

if ($email == "") {
    print ("<script> location = 'index.php'</script>");
}
?>