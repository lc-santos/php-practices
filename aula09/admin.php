<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION)['nome'] and $_SESSION['tipo'] != 1) {
    echo ('Login inválido')
    header("Refresh: 5; url=login.html" )
}
else {
    echo('Bem vindo')
}
