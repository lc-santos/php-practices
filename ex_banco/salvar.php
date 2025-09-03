<?php

include 'conn.php';

$rm = $_POST['rm'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];

$check = "SELECT * FROM aluno WHERE rm = '$rm' OR email = '$email'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    echo "Já existe um aluno com este RM ou Email.<br>";
    echo "<a href='form.html'>Voltar</a><br>";
    echo "<a href='listar.php'>Listar</a>";
    exit;
}

$pasta = "img/";

$avatar = $_FILES['avatar']['name'];
$ext = strtolower(pathinfo($avatar, PATHINFO_EXTENSION));

// renomeia para evitar conflitos
$avatarf = $rm . '_' . time() . '.' . $ext;


if (move_uploaded_file($_FILES['avatar']['tmp_name'], $pasta . $avatarf)) {
    $avatardb = $avatarf; 
}


$conn->query("INSERT INTO aluno(rm, nome, email, senha, sexo, avatar) VALUES ('$rm', '$nome', '$email', '$senha', '$sexo', '$avatardb')");
echo "Dados inseridos com sucesso! <br>";


echo "Conexão bem-sucedida com o banco de dados 'noite'.<br>";
echo "Data e hora atual em São Paulo: " . date("d/m/Y H:i:s");
echo "<br><a href='listar.php'>Listar</a>";
