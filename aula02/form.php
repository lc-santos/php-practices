<?php

$nome = $_POST['nome'];
$n1 = $_POST['n1'];
$n2 = $_POST['n2'];
$n3 = $_POST['n3'];

echo "$nome" . "<hr>";
echo "$n1" . "<hr>";
echo "$n2" . "<hr>";
echo "$n3" . "<hr>";

$media = ($n1 + $n2 + $n2) / 3;


echo 'Media: ' . $media;

?>