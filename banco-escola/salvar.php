<?php

include "conn.php";

$rm = $_POST['rm'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "INSERT INTO alunos (rm, nome, email, senha) VALUES (?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $rm, $nome, $email, $senha);

if ($stmt->execute()) {
    echo "Aluno cadastrado com sucesso! <br>";
    echo "<a href='listar.php'>Ver lista de alunos</a>";
} else {
    echo "Erro: " . $stmt->error;
}

$conn->close();
?>

