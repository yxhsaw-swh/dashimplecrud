<?php
$userMaster = "120787@gmail.com";
$passMaster = "13198103";

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($email === $userMaster && $senha === $passMaster) {
    header("Location: inicio.php");
    exit();
} else {
    header("Location: login.php?erro=1");
    exit();
}
?>