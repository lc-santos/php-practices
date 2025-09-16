<?php
include 'conn.php';

// 1. Pega os dados do formulário
$id             = $_POST['id'];
$rm             = $_POST['rm'];
$email          = $_POST['email'];
$senha          = $_POST['senha'];
$dataNascimento = $_POST['dataNascimento'];

// 2. Monta a query base
$update = "UPDATE cadastro SET rm = ?, email = ?, data_nascimento = ?";
$params = [$rm, $email, $dataNascimento];
$types = "sss"; // s = string

// 3. Adiciona a senha à query APENAS se ela foi preenchida
if (!empty($senha)) {
    // É crucial criptografar a senha em um sistema real!
    // $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $update .= ", senha = ?";
    $params[] = $senha; // Usando a senha pura conforme o resto do projeto
    $types .= "s";
}

// 4. Lida com o upload do novo avatar (se houver)
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

// 5. Finaliza a query e adiciona o ID no final dos parâmetros
$update .= " WHERE id = ?";
$params[] = $id;
$types .= "i"; // i = integer

// 6. Executa a query com segurança usando Prepared Statements
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