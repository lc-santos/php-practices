<?php
session_start();
require "conn.php";

$login = $_POST['login'];
$senha = $_POST['senha']; 

$sql = "SELECT * FROM aluno WHERE (rm = '$login' OR email = '$login') AND senha = '$senha'";
$result = mysqli_query($conn, $sql);
while ($aluno = mysqli_fetch_assoc($result)) {
    $tipo = $aluno['tipo'];
    $nome = $aluno ['nome'];
}

$result = $conn->querry($sql);
if ($result->num_rows > 0) {
    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] = $tipo;

    if ($tipo == 1) {
        echo "Bem vindo, administrador"
        header("Refresh 3; url=admin.php");
        echo "<a href=form.html>Sair</a>"
    }
    else {
        echo "Login realizado cmo sucesso! Aluno";
    }
}