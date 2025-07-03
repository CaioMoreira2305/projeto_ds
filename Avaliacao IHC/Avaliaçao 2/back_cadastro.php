<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
    include_once("conexao.php");

    $NOME = $_POST['nome'];
    $EMAIL = $_POST['email'];
    $SENHA = $_POST['senha'];
    $SENHANORMAL = $SENHA;

    if ($NOME && $EMAIL && $SENHA) {
        $sql = "INSERT INTO aula (nome, email, senha, senha_normal) 
                VALUES (:nome, :email, :senha, :senha_normal)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $NOME);
        $stmt->bindParam(':email', $EMAIL);
        $stmt->bindParam(':senha', md5($SENHA));
        $stmt->bindParam(':senha_normal', $SENHANORMAL);

        if ($stmt->execute()) {
            $mensagem = "Registro Salvo com Sucesso";
        } else {
             $mensagem = "Erro: " . implode(", ", $stmt->errorInfo());
        }

    } else {
        $mensagem = "Preencha todos os campos.";
    }

    header("Location: login.php?mensagem=" . urlencode($mensagem));
    exit;
?>