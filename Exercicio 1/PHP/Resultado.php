<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["numero1"];
        $num2 = $_POST["numero2"];
        $operacao = $_POST["operacao"];

        echo "<h2>Resultado: </h2>";

        if($operacao == "soma") {
            $resultado = $num1 + $num2;
            echo "$num1 + $num2 = $resultado";
        } else if ($operacao == "sub") {
            $resultado = $num1 - $num2;
            echo "$num1 - $num2 = $resultado";
        } else if ($operacao == "mult") {
            $resultado = $num1 * $num2;
            echo "$num1 * $num2 = $resultado";
        } else if ($operacao == "div") {
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                    echo "$num1 / $num2 = $resultado";
                } else {
                    echo "Erro: Divisão por 0 não existe."; }
                } else {
                    echo "Operação Invalida";
                } 
                } 

?>