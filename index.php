<?php
include("protectindex.php");

if (!$_SESSION) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Home</title>
</head>
<body>
    <h1>Olá: <?php echo $_SESSION["user"]?></h1>
    <h2>Para deslogar, apenas aperte o botão a seguir:</h2>
    <h2><a href="logout.php">Deslogar</a></h2>
</body>
</html>