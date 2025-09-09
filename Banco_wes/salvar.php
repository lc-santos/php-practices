<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 require 'conn.php';

 $rm = $_POST['rm'];
 $nome = $_POST['nome'];
 $senha = $_POST['senha'];
 $email = $_POST['email'];
 $pasta = "img/"; // / = Siginifica entrar
 $sexo = $_POST['sexo'];
 $avatar = $_FILES['avatar']['name'];
 $tmp_avatar = $_FILES['avatar']['tmp_name'];
 

 $ext = strtolower(pathinfo($avatar, PATHINFO_EXTENSION));
 $avatarf = $rm . '.' . $ext;


 if (move_uploaded_file($_FILES['avatar']['tmp_name'], $pasta . $avatarf)) {
 } //Avatar será movido para a pasta 

 else {
     $result_message = "Não foi possível concluir o upload da imagem.";
 }
 
 $select = "SELECT * FROM aluno WHERE rm = '$rm' ";
 $resultado = mysqli_query($conn, $select);
 
  if (mysqli_num_rows($resultado) > 0 ) 
  {
     echo "Erro: RM já cadastrado";
  }
  else
  {
    $insert = "INSERT INTO aluno (rm, nome, email, senha, avatar, sexo) VALUES ('$rm', '$nome', '$email', '$senha', '$avatarf', '$sexo')"; 

    if ($conn->query($insert)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
  }

 