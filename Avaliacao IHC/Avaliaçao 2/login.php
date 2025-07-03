<?php

    $mensagem = isset ($_REQUEST['m']) ? $_REQUEST['m'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: gray;
            height: 100vh;     
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;  
        }

        div {
            background-color: lightgrey;
            width: 300px;
            border: 15px solid black;
            padding: 50px;
        }
    </style>
</head>
<body style="text-align: center;">

    <div>
        <form action = "back_login.php" method = "POST">

            <?php echo $mensagem ?>
            <h3>LOGIN</h3>
            <br>

            Email: <input type = "text" name = "email">
            <br><br>
            Senha: <input type = "text" name = "senha">
            <br><br>
            <input type = "submit" value = "Salvar">
            <br><br><br>
            <a href = "cadastro.php">Criar Cadastro</a>
            <br><br>
            <a href = "index.php"> Voltar para Pagina Principal </a>

        </form>
    </div>

</body>
</html>