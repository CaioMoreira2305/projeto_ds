<?php

    include_once("conexao.php");

    $id = isset ($_REQUEST['id']) ? $_REQUEST['id'] : null;
    $NOME = $_POST['nome'];
    $RA = $_POST['ra'];
    $EMAIL = $_POST['email'];
    $mensagem = "Registro Salvo com Sucesso";

    if($id) {

        $sql = "UPDATE aluno SET nome = :nome, ra = :ra, email = :email
                WHERE id = :id";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);

        $mensagem = "Registro Salvo com Sucesso";

    } else {
        // realiza a inserção de um novo registro
        $sql = "INSERT INTO aluno (nome, ra, email) 
                VALUES (:nome, :ra, :email);";

        $stmt = $conexao->prepare($sql);

        $mensagem = "Registro Salvo com Sucesso";

    } 

    $stmt->bindParam(':nome', $NOME);
    $stmt->bindParam(':ra', $RA);
    $stmt->bindParam(':email', $EMAIL);
    $stmt->execute();

    header("Location: index.php?mensagem=$mensagem");

?>