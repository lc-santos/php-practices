<html>
    
<head>

<style>

    .caixaphp {
        padding: 10px;
        padding-bottom: 2px;
        border-radius: 10px;
        text-align: center;
        margin: 0 auto;
        margin-top: 10%;
        width: 250px;
        height: 250px;
        min-width: 250px;
        max-width: 450px;
        background: lightgray;
    }

</style>

</head>

<body>

<div class=caixaphp>

<?php

$nome = $_POST['nome'];
$faltas = $_POST['faltas'];
$n1 = $_POST['n1'];
$n2 = $_POST['n2'];
$n3 = $_POST['n3'];

echo "Nome: " . " $nome" . "<hr>";
echo "Faltas: " . " $faltas" . "<hr>";
echo "Nota 1: " . " $n1" . "<hr>";
echo "Nota 2: " . " $n2" . "<hr>";
echo "Nota 3: " . " $n3" . "<hr>";

$media = ($n1 + $n2 + $n2) / 3;

echo 'Media: ' . $media . "<hr>";

if($faltas >= 6) {
    echo "Aprovado";
}

if($media >= 9 AND $faltas <=5) {
    echo "Super Aprovado";
}

else {
    echo"Reprovado";
}


?>

</div>

</body>

</html>