<?php

    include_once("conexao.php");

    $NOME = $_POST['nome'];
    $RA = $_POST['ra'];
    $EMAIL = $_POST['email'];

    $sql = "INSERT INTO aluno (nome, ra, email) 
            VALUES (:nome, :ra, :email);";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $NOME);
    $stmt->bindParam(':ra', $RA);
    $stmt->bindParam(':email', $EMAIL);

    $stmt->execute();

    header("Location: index.php")

    

?>