<?php

    $Nome = $_POST['aluno'];
    $Nota1 = $_POST['nota1'];
    $Nota2 = $_POST['nota2'];
    $Nota3 = $_POST['nota3'];

    $Media = ($Nota1 + $Nota2 + $Nota3) / 3;

    echo ("Aluno: $Nome <br><br>");


    echo ("A médio do Aluno é: $Media<br><br>");

    if($Media >= 6){
        print ("Situação: Aprovado");
    } else {
        print ("Situação: Reprovado");
    }

?>