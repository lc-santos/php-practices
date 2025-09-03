<?php


$host = "localhost";
$user = "root";
$pass = "";
$db   = "noite";


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

date_default_timezone_set('America/Sao_Paulo');


?>
