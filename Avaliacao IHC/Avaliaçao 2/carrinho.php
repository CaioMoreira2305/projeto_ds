<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['email'])) {
    $_SESSION['redirecionar_para_carrinho'] = true;
    header("Location: login.php");
    exit;
}

if (isset($_GET['limpar']) && $_GET['limpar'] == 1) {
    unset($_SESSION['carrinho']);
    header('Location: index.php');
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$preco = isset($_GET['preco']) ? (float) $_GET['preco'] : 0;

if ($id <= 0 || $preco <= 0) {
    die("Livro inválido ou preço incorreto.");
}

$stmt = $conexao->prepare("SELECT id, nome_livro, nome_autor, imagem_url FROM tb_livros WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$livro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$livro) {
    die("Livro não encontrado.");
}

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (isset($_SESSION['carrinho'][$id])) {
    $_SESSION['carrinho'][$id]['quantidade'] += 1;
} else {
    $_SESSION['carrinho'][$id] = [
        'id' => $livro['id'],
        'nome_livro' => $livro['nome_livro'],
        'nome_autor' => $livro['nome_autor'],
        'imagem_url' => $livro['imagem_url'],
        'preco' => $preco,
        'quantidade' => 1
    ];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Seu Carrinho</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f4f8;
      padding: 20px;
    }
    .container {
      background: white;
      padding: 20px;
      max-width: 800px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .livro {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 10px;
    }
    .livro img {
      height: 100px;
      margin-right: 20px;
      border-radius: 8px;
    }
    .livro-info {
      flex: 1;
    }
    .livro-preco {
      font-weight: bold;
      color: #2b6cb0;
    }
    .total {
      text-align: right;
      margin-top: 20px;
      font-size: 18px;
    }
    a {
      display: inline-block;
      margin-top: 20px;
      background: #0c7ff2;
      color: white;
      padding: 10px 20px;
      border-radius: 6px;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Livro adicionado ao carrinho!</h1>

    <?php foreach ($_SESSION['carrinho'] as $item): ?>
      <div class="livro">
        <img src="<?= htmlspecialchars($item['imagem_url']) ?>" alt="<?= htmlspecialchars($item['nome_livro']) ?>">
        <div class="livro-info">
          <p><strong><?= htmlspecialchars($item['nome_livro']) ?></strong></p>
          <p><?= htmlspecialchars($item['nome_autor']) ?></p>
          <p>Quantidade: <?= $item['quantidade'] ?></p>
        </div>
        <div class="livro-preco">
          R$ <?= number_format($item['preco'], 2, ',', '.') ?>
        </div>
      </div>
    <?php endforeach; ?>

    <div class="total">
      <?php
        $total = 0;
        foreach ($_SESSION['carrinho'] as $item) {
          $total += $item['preco'] * $item['quantidade'];
        }
      ?>
      Total: <strong>R$ <?= number_format($total, 2, ',', '.') ?></strong>
    </div>

    <a href="index.php">Continuar comprando</a>

    <a href="carrinho.php?limpar=1" style="background-color: #e53e3e; margin-left: 10px;">
        Limpar carrinho
    </a>

  </div>
</body>
</html>