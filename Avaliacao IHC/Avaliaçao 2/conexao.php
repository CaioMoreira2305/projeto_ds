<?php

    $host = "127.0.0.1";
    $user = "root";
    $porta = "3306";
    $password = "123456";
    $db = "A1";

    $conexao = new PDO(
        'mysql:host='.$host.';
        port='.$porta.';
        dbname='.$db, 
        $user,
        $password);

    ?>