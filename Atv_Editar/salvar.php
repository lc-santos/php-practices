<?php

include 'conn.php';

$rm = $_POST['rm'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$dataNascimento = $_POST['dataNascimento'];
$avatar = $_FILES['avatar']['name'];
$pasta = "img/";
$ext = strtolower(pathinfo($avatar, PATHINFO_EXTENSION));

$check = "SELECT * FROM cadastro WHERE rm = '$rm' OR email = '$email'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    echo "Já existe um aluno com este RM ou Email.<br>";
    echo "<a href='form.html'>Voltar</a><br>";
    echo "<a href='listar.php'>Listar</a>";
    exit;
}



// renomeia para evitar conflitos
$avatarf = $rm . '.' .  $ext;


if (move_uploaded_file($_FILES['avatar']['tmp_name'], $pasta . $avatarf)) {
    $avatardb = $avatarf; 
}


$conn->query("INSERT INTO cadastro(rm, email, senha, avatar, data_nascimento) VALUES ('$rm', '$email', '$senha', '$avatardb', '$dataNascimento')");
echo "Dados inseridos com sucesso! <br>";


echo "Conexão bem-sucedida com o banco de dados 'Lucas Silva'.<br>";
echo "Data e hora atual em São Paulo: " . date("d/m/Y H:i:s");
echo "<br><a href='listar.php'>Listar</a>";
echo "<br><a href='form.html'>Cadastrar Novo</a>";
