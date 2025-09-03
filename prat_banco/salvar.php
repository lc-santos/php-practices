<?php

require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Método inválido");
}

$rm = $_POST['rm'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sexo = $_POST['sexo'] ?? '';

$check = "SELECT * FROM alunos WHERE rm = '$rm' OR email = '$email'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    echo "Já existe um aluno com este RM ou Email.<br>";
    echo "<a href='form.html'>Voltar</a><br>";
    echo "<a href='listar.php'>Listar</a>";
    exit;
}

$pasta = "img/";
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] !== UPLOAD_ERR_NO_FILE) {
    if ($_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
        die('Erro no upload. Código: ' . $_FILES['avatar']['error']);
    }

    $ext = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));

    $avatar = $rm . '-' . time() . '.' . $ext;

    $destino = $pasta . $avatar;

    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $destino)) {
        die('Erro ao mover o arquivo para a pasta definitiva.');
    }

} else {
    $avatar = 'default.png';
}

$sql = "INSERT INTO alunos (rm, nome, email, senha, sexo, avatar) VALUES ('$rm', '$nome', '$email','$senha','$sexo','$avatar')";


$stmt = $conn->prepare($sql);
if (!$stmt) {
    die('Erro no prepare: ' . $conn->error);
}

if ($stmt->execute()) {
    echo "Registro salvo com sucesso!";
    echo "<br><a href='listar.php'>Ver lista de alunos</a>";
} else {
    echo "Erro ao salvar: " . $stmt->error;
}
