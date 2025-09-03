<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "noite";


$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

date_default_timezone_set('America/Sao_paulo');

echo "Data e hora atual em São Paulo: " . date("d/m/Y H:i:s");

