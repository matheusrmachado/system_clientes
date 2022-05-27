<?php
include("protectdashboard.php");

if (!$_SESSION) {
    session_start();
}

include("conexao.php");

$query_clientes = $connection->query("SELECT * FROM users");
$num_clientes = $query_clientes->num_rows;
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
    <p>
        <h2>Seu nível é: <?php echo $_SESSION["nivel"]?></h2>
    </p>
    <h2>Para deslogar, apenas aperte o botão a seguir:</h2>
    <h2><a href="logout.php">Deslogar</a></h2>
    <div class="clientes">
        <table>
            <thead>
                <th>Usuário</th>
                <th>Email</th>
                <th>Deletar</th>
            </thead>
            <tbody>
                <?php if($num_clientes == 0) {?>
                    <tr>
                        <td colspan="2">Nenhum usuário foi encontrado</td>
                    </tr>
                <?php } else {
                    while($cliente = $query_clientes->fetch_assoc()) {  
                ?>
                    <tr>
                        <td><?php echo $cliente["user"];?></td>
                        <td><?php echo $cliente["email"];?></td>
                        <td><a href="delete_cliente.php?user=<?php echo $cliente["user"]; ?>">Deletar</a></td>
                    </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
</body>
</html>