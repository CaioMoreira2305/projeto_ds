<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method = "POST" action = "Resultado.php">   
        Numero1: <input type = "number" name = "numero1" required>
        <br> <br>
        Numero2: <input type = "number" name = "numero2" required>
        <br> <br>
        
        <label for = "operacao" > Escolha uma operação:</label>
        <select name = "operacao" required>
            <option value = "soma"> Soma</option>
            <option value = "sub"> Subtração</option>
            <option value = "mult"> Multiplicação</option>
            <option value = "div"> Divisão</option> 
        </select>

        <br><br>
        <button type = "Submit"> Calcular </button>

    </form>


</body>
</html>