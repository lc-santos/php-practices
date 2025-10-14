<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

body {
  margin: 0 auto;
}

#caixa {
  display: flex;
  border-radius: 10px;
  padding: 20px;
  width: 350px;
  height: 250px;
  margin: 0 auto;
  margin-top: 20%;
  background: rgb(71, 129, 210);
}

label, option {
  border-radius: 10px;
  padding-left: 10px;
  padding-right: 10px;
  margin: 20px;
  background: white;

}

input {
  margin: 5px;
  border-radius: 10px;
}

</style>
</head>
<body>


<div id="caixa">


<?php

$nome = $_POST["nome"];
$idade = $_POST["idade"];
$peso = $_POST["peso"];
$altura = $_POST["altura"];
$sexo = $_POST["sexo"];
$imc = $peso / ($altura * $altura); 
$imc2 = number_format($imc, 2,',');


echo $nome;
echo "<br>";
echo $idade;
echo "<br>";
echo $peso;
echo "<br>";
echo $altura;
echo "<br>";
echo $sexo;
echo "<br>";
echo $imc2;


?>

</div>

</body>
</html>



