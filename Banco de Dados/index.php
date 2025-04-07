<?php

    include_once("conexao.php");

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if($id){
        $sql = "SELECT * FROM aluno WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $resultItem = $stmt->fetch(PDO::FETCH_OBJ);
    }

    $sql = "SELECT * FROM aluno";
    $result = $conexao->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action = "inserir.php" method = "POST">
        <input type = "hidden" name = "id" value="<?php echo isset($resultItem) ? $resultItem -> id : '' ?>)">
        Nome: <input type = "text" name = "nome" value="<?php echo isset($resultItem) ? $resultItem->nome : '' ?>">
        <br> <br>
        RA: <input type = "number" name = "ra" value="<?php echo isset($resultItem) ? $resultItem->ra : '' ?>">
        <br> <br>
        Email: <input type = "text" name = "email" value="<?php echo isset($resultItem) ? $resultItem->email : '' ?>">
        <br> <br>
        <input type = "Submit" value = "Executar">
        <input type = "Reset" value = "Limpar">
        <br> <br>
    </form>

    <table border = "1" width = "100%">
            <tr>
                <th>ID</th>
                <th>nome</th>
                <th>RA</th>
                <th>email</th>
                <th>Ações</th>
            </tr>

            <?php while($row = $result->fetch(PDO::FETCH_OBJ)) { ?>
            
            <tr>
                <td> <?php echo $row->id ?> </td>
                <td> <?php echo $row->nome ?> </td>
                <td> <?php echo $row->ra ?> </td>
                <td> <?php echo $row->email ?> </td>
                <td>
                    <a href = "excluir.php?id=<?php echo $row->id ?>">Excluir</a>
                    <a href = "index.php?id=<?php echo $row->id ?>">Editar</a>
                </td>
            </tr>
            <?php } ?>
    </table>

</body>
</html>