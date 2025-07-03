<?php

    $mensagem = isset ($_REQUEST['m']) ? $_REQUEST['m'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
        <form action = "back_cadastro.php" method = "POST">

            <?php echo $mensagem ?>
            <h3>CADASTRO</h3>
            <br>

            Nome: <input type = "text" name = "nome" required>
            <br><br>
            Email: <input type = "text" name = "email" required>
            <br><br>
            Senha: <input type = "text" name = "senha" required>
            <br><br>
            <input type = "submit" value = "Cadastrar">
            <br><br>
            <a href = "login.php"> Voltar para Pagina de Login </a>
            <br><br>
            <a href = "index.php"> Voltar para Pagina Principal </a>

        </form>
    </div>
    
</body>
</html>