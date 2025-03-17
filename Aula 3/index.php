<?php

    $a = 3;
    $b = 4;
    $c = $a + $b;
    $d = $a . $b;

    echo $d;
    echo "<div style = 'color: red'>" .$c. "</div>";
    echo "<div style = 'color: green'>" .$d. "</div>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style = " color: blue"> <?php echo $c ?> </div>

    <br><br>

    <form method = "request" action= "resultado.php">
        nome: <input type = "text" name = "nome">
        <br><br>
        idade: <input type = "number" name= "idade">
        <br><br>
        <input type = "submit" value="Salvar">
        <input type = "reset" value= "Limpar">
    </form>
</body>
</html>