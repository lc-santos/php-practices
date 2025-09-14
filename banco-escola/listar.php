<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="css/listar.css">
</head>
<body>

<?php

include "conn.php";

$sql = "SELECT id, rm, nome, email FROM alunos";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Alunos</h2>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>ID</th><th>RM</th><th>Nome</th><th>Email</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['rm']."</td>
                <td>".$row['nome']."</td>
                <td>".$row['email']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum aluno cadastrado.";
}

$conn->close();

?>


</body>



