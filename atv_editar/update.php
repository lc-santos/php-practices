<?php
include 'conn.php';

$id             = $_POST['id'];
$rm             = $_POST['rm'];
$email          = $_POST['email'];
$senha          = $_POST['senha'];
$dataNascimento = $_POST['dataNascimento'];


$update = "UPDATE cadastro SET rm = ?, email = ?, data_nascimento = ?";
$params = [$rm, $email, $dataNascimento];
$types = "sss"; 


if (!empty($senha)) {
  
    $update .= ", senha = ?";
    $params[] = $senha; 
    $types .= "s";
}


if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
    $avatar = $_FILES['avatar']['name'];
    $pasta = "img/";
    $ext = strtolower(pathinfo($avatar, PATHINFO_EXTENSION));
    $avatarFinal = $rm . '.' . $ext;

    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $pasta . $avatarFinal)) {
        $update .= ", avatar = ?";
        $params[] = $avatarFinal;
        $types .= "s";
    }
}

$update .= " WHERE id = ?";
$params[] = $id;
$types .= "i"; 


$stmt = $conn->prepare($update);
$stmt->bind_param($types, ...$params);

if ($stmt->execute()) {
    echo "Cadastro atualizado com sucesso! <br>";
    echo "<a href='listar.php'>Voltar para a Lista</a>";
} else {
    echo "Erro ao atualizar o cadastro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>