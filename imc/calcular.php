<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

      body {
        margin: 0 auto;
        padding: 0;
        background-image: url(img/bg.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        font-family: Georgia, 'Times New Roman', Times, serif;
      }

      #caixa {
        position: relative;
        display: block;
        border-radius: 10px;
        padding: 20px;
        width: 350px;
        height: 290px;
        margin: 10%;
        margin-left: 55%; 
        background: rgb(134, 199, 255);
        box-shadow: rgba(240, 59, 59, 0.712) -10px 10px;
      }


      h1 {
        position: relative;
        margin: 0 auto;
        color: white;
        text-align: center;
      }


      #resultado {
        text-align: center;
        position: relative;
        padding: 10px;
        border-radius: 10px;
        margin: 12% 19%;
        background-color: white;
        height: 20px;
      }

      input {
        
        width: 150px;
        margin-left: 5px;
        padding-left: 10px;
        left: 20px;
        border: 1px solid white;
        border-radius:  10px;
      }

      span {
        position: relative;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
        margin-top: 20px;
        border-radius: 10px;
        background-color: white;
      }

      p {
        background-color: white;
        border-radius: 10px;
        padding: 3px;
        padding-left: 8px;
        margin-bottom: 3px;
        text-align: left;
      }

      #imagem {
        position: absolute; 
        width: 100px;
        height: 100px;
        bottom: 95px;
        left: -100px;
      }

      header {
        display: inline-flex;
        width: 100%;
        height: 50px;
        background: rgb(69, 107, 212);
        border-bottom: 5px solid rgb(90, 129, 214);
      }

      h2 {
        position: absolute;
        color: white;
        top: -35px;
        left: 20px;
        
      }

      #logo {
        position: relative;
        top: 15px;
        width: 50px;
        height: 50px;
      }

       

      li {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: white;
        margin: 0 auto;
        margin-left: 250px;
      }

      ul {
        margin-right: 50px;
      }

      footer {

        bottom: 0;
        position: fixed;
        width: 100%;
        height: 30px;
        text-align: center;
        color: white;
        background-color: rgb(101, 169, 233);
      }

       button {
        position: relative;
        width: 150px;
        height: 30px;
        bottom: 20px;
        background-color: white;
        border: none;
        border-radius: 10px;
        padding: 5px;
      }

      a {
        text-decoration: none;
        text-align: center;
      }

      a:visited {
        color: black;
      }

      a:hover {
        color: white;
      }

      button:hover {
        background-color: rgb(63, 184, 224);
        color: white;
        border: lightblue;
      }

      input#pesquisa {
        position: absolute;
        left: 80%;
        top: 1.5%;
        width: 200px;
        height: 20px;
        border-radius: 50px;
      
      }





</style>
</head>
<body>

<header>

    <h2><img id="logo" src="img/logo.png">Saúde.com</h2>
    <li>
      <ul>Home</ul>
      <ul>Serviços</ul>
      <ul>Contato</ul>
      <ul>Sobre</ul>
    </li>
    <input id="pesquisa" type="text" placeholder="Pesquise aqui ">

  </header>

<div id="caixa">

<h1>Resultado: </h1>



<div id="resultado">

<?php

echo '<img id=imagem src="img/logo.png">';

$nome = $_POST["nome"];
$idade = $_POST["idade"];
$peso = $_POST["peso"];
$altura = $_POST["altura"];
$sexo = $_POST["sexo"];
$imc = $peso / ($altura * $altura); 
$imc2 = number_format($imc, 2,',');

if ($imc2 <= 18.5) {
  echo "IMC: " . $imc2;
  echo "<br>";  
  echo "<span> Está abaixo do peso </span>";

  echo "<p>Paciente: " . $nome;
  echo "<br>";
  echo "Idade: " . $idade;
  echo "<br>";
  echo "Sexo: " . $sexo . "</p>";
}
elseif ($imc2 >= "18.6" and $imc2 <= "24.9") {
  echo "IMC: " . $imc2;
  echo "<br>";  
  echo "<span> Peso normal </span>";

  echo "<p>Paciente: " . $nome;
  echo "<br>";
  echo "Idade: " . $idade;
  echo "<br>";
  echo "Sexo: " . $sexo . "</p>";
}
elseif ($imc2 >= "25" and $imc2 <= "29.9") {
  echo "IMC: " . $imc2;
  echo "<br>";
  echo "<span> Sobrepeso </span>";

  echo "<p>Paciente: " . $nome;
  echo "<br>";
  echo "Idade: " . $idade;
  echo "<br>";
  echo "Sexo: " . $sexo . "</p>";
} 
elseif ($imc2 >= "30" and $imc2 <= "34.9") {
  echo "IMC: " . $imc2;
  echo "<br>";
  echo"<span> Obesidade Grau I </span>";

  echo "<p>Paciente: " . $nome;
  echo "<br>";
  echo "Idade: " . $idade;
  echo "<br>";
  echo "Sexo: " . $sexo . "</p>";
}
elseif ($imc2 >= "35" and $imc2 <= "39.9") {
  echo "IMC: " . $imc2;
  echo "<br>";
  echo"<span> Obesidade Grau II </span>";

  echo "<p>Paciente: " . $nome;
  echo "<br>";
  echo "Idade: " . $idade;
  echo "<br>";
  echo "Sexo: " . $sexo . "</p>";
}
elseif ($imc2 >= "40") {
  echo "IMC: " . $imc2;
  echo "<br>";
  echo"<span> Obesidade Grau III </span>";

  echo "<p>Paciente: " . $nome;
  echo "<br>";
  echo "Idade: " . $idade;
  echo "<br>";
  echo "Sexo: " . $sexo . "</p>";

}
else {
  echo "Valores inválidos";
  echo "<br>";
  echo "<br>";
}




?>

<br><br>
<a href="imc.html"><button type="reset" value="reset" href="imc.html">Consultar</button></a>



</div>
</div>

<footer>
    Todos os direitos reservados
</footer>

</body>
</html>



