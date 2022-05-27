<?php

$host = "localhost";
$db = "bored_protection";
$user = "root";
$password = "";

$connection = new mysqli($host, $user, $password, $db);

if($connection->error) {
    die("Falha ao conectar com o banco de dados: " .$mysqli->error);
}