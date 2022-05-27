<?php

include("conexao.php");

if(isset($_POST['email']) || isset($_POST['password']) || isset($_POST['password2']) || isset($_POST['user'])) {
    if(strlen($_POST['email']) == 0) {
        echo "Você não preencheu o seu email !";
    } else if(strlen($_POST['user']) == 0) {
        echo "Você não preencheu o seu usuário";
    } else {
        if($_POST['password2'] == $_POST['password']) {
            echo "Você não preencheu a sua senha !";
            $result = $connection->query("SELECT COUNT(*) FROM users WHERE user = '{$_POST['user']}'");
            $row = $result->fetch_row();
            if ($row[0] > 0) {
                echo "Usuário já cadastrado";
            $result2 = $connection->query("SELECT COUNT(*) FROM users WHERE email = '{$_POST['email']}'");
            $row2 = $result2->fetch_row();
            } elseif ($row2[0]>0) {
                echo "Já existe uma conta com esse email !";
            } else {
                $user = $connection->real_escape_string($_POST['user']);
                $email = $connection->real_escape_string($_POST['email']);
                $password = $connection->real_escape_string($_POST['password']);

                $addUser = $connection->query("INSERT INTO users (user,email,password,nivel) VALUES ('$user','$email','$password', 1)");

                $busca = $connection->query("SELECT * FROM users WHERE user = '$user'") or die("Erro na seleção para login.");
                $usuario = $busca->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION["user"] = $usuario["user"];
                $_SESSION["nivel"] = $usuario["nivel"];

                header("Location: index.php");
            }
        } else {
            echo "As senhas não conhecidem !";
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
    <link rel="stylesheet" type="text/css" href="public/css/cadastro.css" media="screen" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;1,100&display=swap" rel="stylesheet">

    <title>Cadastrar-se</title>
</head>
<body>
    <div class="cadastro_container">
        <div class="cadastro_background">
            <div class="cadastro_title">Cadastrar-se</div>
            <form class="cadastro_form" method="POST" action="">
                <input type="text" name="user" class="cadastro_input" placeholder="Usuário"/>
                <spam class="cadastro_input_border"></spam>
                <input type="email" name="email" class="cadastro_input" placeholder="Email"/>
                <spam class="cadastro_input_border"></spam>
                <input type="password" name="password" class="cadastro_input" placeholder="Senha"/>
                <spam class="cadastro_input_border"></spam>
                <input type="password" name="password2" class="cadastro_input" placeholder="Repita sua senha"/>
                <spam class="cadastro_input_border"></spam>
                <button type="submit" class="cadastro_submit">Cadastrar-se</button>
            </form>
        </div>
    </div>
</body>
</html>