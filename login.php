<?php

include("conexao.php");

if(isset($_POST['password']) || isset($_POST['user'])) {
    if(strlen($_POST["user"]) == 0 || strlen($_POST["password"]) == 0) {
        echo "Você não preencheu algum campo!";
    } else {
        $user = $connection->real_escape_string($_POST["user"]);
        $password = $connection->real_escape_string($_POST["password"]);

        $sql_code = "SELECT * FROM users WHERE user = '$user' AND password = '$password'";
        $sql_query = $connection->query($sql_code) or die("Falha na execução da busca pelo usuário" .$connection->error);

        $quantidade = $sql_query->num_rows;
        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION["user"] = $user;
            $_SESSION["nivel"] = $usuario["nivel"];
            
            header("Location: index.php");
        } else {
            echo "Email ou senha invalidos";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/login.css" media="screen" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;1,100&display=swap" rel="stylesheet">

    <title>Login</title>
</head>
<body>
    <div class="login_container">
        <div class="login_background">
            <div class="login_title">Logar</div>
            <form class="login_form" method="POST" action="">
                <input type="text" name="user" class="login_input" placeholder="Usuário"/>
                <spam class="login_input_border"></spam>
                <input type="password" name="password" class="login_input" placeholder="Senha"/>
                <spam class="login_input_border"></spam>
                <button type="submit" class="login_submit">Logar</button>
            </form>
        </div>
    </div>
</body>
</html>