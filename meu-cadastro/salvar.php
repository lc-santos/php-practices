<?php

// include 'conn.php';: Inclui e executa o código do
// arquivo conn.php, estabelecendo a conexão com o banco.

include 'conn.php';

//$_POST['nome']: Acessa o valor enviado pelo formulário
//  através do método POST para o campo com name="nome".

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?,?,?)";

// Prepara a declaração para evitar SQL Injection
$stmt = $conn->prepare($sql);

// Vincula os parâmetros com os tipos de dados
$stmt->bind_param("sss", $nome, $email, $senha);

// Executa a query
if ($stmt->execute()) {
    echo "Novo registro criado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();
