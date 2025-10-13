<?php

require "conn.php";

$login = $_POST['login'];
$login = $_POST['login']; // mudar para senha

$sql = "SELECT * FROM aluno WHERE (rm = '$login' OR email = '$login') AND senha = '$senha'";
$result = mysqli_query($conn, $sql);
while ($aluno = mysqli_fetch_assoc($result)) {
    $tipo = $aluno['tipo'];
}

$result = $conn->querry