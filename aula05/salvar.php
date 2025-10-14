<?php 
$rm = $POST['rm'];
$nome = $POST['nome'];
$senha = $POST['senha'];
$pasta = "img/";
$avatar = $_FILES['avatar']['name'];
$ext = strtolower(pathinfo($svatar, PATHINFO_EXTENSION));
$avatarf = $rm . '.' . $ext;
if (move_uploaded_file($_FILES['avatar']['tmp_name'], $pasta . $avatarf)) {

}
else {
    $result_message = "Não foi possível concluir o upload da imagem";
}
