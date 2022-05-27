<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION["user"])) {
    die("Voce não tem permissão para acessar essa página! Caso não tenha conta: <p><a href=\"\bored_testeprotect/cadastro.php\">Clique aqui</a></p>. Caso tenha conta: <p><a href=\"login.php\">Cliue aqui</a></p>.");
} else {
    if ($_SESSION["nivel"] < 2) {
        die("Voce não tem permissão para acessar essa página! Caso não tenha conta: <p><a href=\"\bored_testeprotect/cadastro.php\">Clique aqui</a></p>. Caso tenha conta: <p><a href=\"login.php\">Cliue aqui</a></p>.");
    }
}