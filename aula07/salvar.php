<html lang="pt-br">

<head>
<title>Relatório</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="css/php.css"></link>

</head>

<body>

<table>
    <tr>
    <th></th>
    </tr>
</table>



<?php

require "conn.php";

$rm = $_POST['rm'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sexo = $_POST['sexo'];



$avatar = $_FILES['avatar']['name'] ?? null;



if (isset($_FILES['avatar'])) {
    echo "<pre>";
    print_r($_FILES['avatar']);
    echo "</pre>";
}



$pasta = "img/";


$nomeArquivo = basename($_FILES['avatar']['name']);
$caminhoFinal = $pasta . $nomeArquivo;


if (move_uploaded_file($_FILES['avatar']['tmp_name'], $caminhoFinal)) {
    echo "Arquivo salvo em: $caminhoFinal";
} else {
    echo "Erro ao salvar o arquivo.";
}




echo "$rm <br> $nome <br> $email <br> $senha <br> $sexo <br> $avatar";

?>

</body>

</html>