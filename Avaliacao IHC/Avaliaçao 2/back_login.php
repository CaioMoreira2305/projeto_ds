<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html><?php

    include_once("conexao.php");

    $email = $_REQUEST['email'];
    $senha = $_REQUEST['senha'];

    $sql = "SELECT * FROM aula WHERE email = :email AND senha = :senha";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', md5($senha));
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $usuario['nome'];
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?m=Usuario ou Senha inválidos! ");
    }

?>