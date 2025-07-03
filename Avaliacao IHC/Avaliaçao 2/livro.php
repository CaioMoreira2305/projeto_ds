<?php
require_once 'conexao.php';

$id = (int)$_GET['id'];

$stmt = $conexao->prepare("SELECT l.*, c.categoria_nome FROM tb_livros l JOIN tb_categorias c ON l.id_categoria = c.id_categoria WHERE l.id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$book = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title><?= htmlspecialchars($book['nome_livro']) ?> - Detalhes</title>
  <link rel="stylesheet" href="livro.css" />
</head>
<body>
  <div class="container">
    <h1><?= htmlspecialchars($book['nome_livro']) ?></h1>
    <h3>Autor: <?= htmlspecialchars($book['nome_autor']) ?></h3>
    <h4>Categoria: <?= htmlspecialchars($book['categoria_nome']) ?></h4>

    <img src="<?= htmlspecialchars($book['imagem_url']) ?>" alt="<?= htmlspecialchars($book['nome_livro']) ?>" />

    <h3 style="margin-top: 30px; color: #0c7ff2;">Sinopse</h3>
<p><?= nl2br(htmlspecialchars($book['descriao'])) ?></p>

<a href="carrinho.php?id=<?= urlencode($book['id']) ?>&preco=<?= urlencode($book['preco']) ?>"
   style="display:inline-block; margin-top:30px; background-color:#38a169; color:white; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:bold;">
  Comprar por R$ <?= number_format($book['preco'], 2, ',', '.') ?>
</a>

    <a href="index.php">Voltar à lista</a>
  </div>
</body>
</html>
