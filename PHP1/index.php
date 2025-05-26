<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method = "REQUEST" action = "calculadora.php">

        Numero 1: <input type = "number" name = "numero1">
        <br><br>
        Numero 2: <input type = "number" name = "numero2">
        <br><br>
        <label for="operacao"> Escolha uma operação: </label>
        <select id="operacao" name = "operacao">
            <option value = "soma">Soma</option>
            <option value = "subtracao">Subtração</option>
            <option value = "mult">Multiplicação</option>
            <option value = "div">Divisão</option>
        </select>
        <br><br>
        <button onclick = "verificarSelect()">Enviar</button>

        <p> Escolha uma Opreação </p>
        <Label> <input type = "radio" name = "operacao" value = "Soma"> Soma </label> <br>
        <Label> <input type = "radio" name = "operacao" value = "Subtração"> Subtração </label> <br>
        <Label> <input type = "radio" name = "operacao" value = "Multiplicação"> Multiplicação </label> <br>
        <Label> <input type = "radio" name = "operacao" value = "Divisão"> Divisão </label> <br> <br>

        <input type = "submit" value = "Calcular"> 
        <input type = "reset" value = "Limpar">

    </form>

</body>
</html>