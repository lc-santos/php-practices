<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'tarde';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

mysqli_set_charset($conn, "utf8");

