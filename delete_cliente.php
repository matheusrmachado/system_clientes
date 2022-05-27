<?php

include("conexao.php");

$user = $_GET["user"];
$sql_code = "DELETE FROM users WHERE user = '$user'";
$sql_query = $connection->query($sql_code) or die($connection->error);

if($sql_query) {
    header("Location: dashboard.php");
} else {
    die("Algum erro aconteceu, retornar para a dashboard:<p><a href=\"\bored_testeprotect/dashboard.php\">Clique aqui</a></p>");
}