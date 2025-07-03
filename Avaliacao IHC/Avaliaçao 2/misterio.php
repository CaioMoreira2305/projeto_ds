<?php require_once 'header.php'; ?>

<div class="px-40 flex flex-1 justify-center py-5">
  <div class="layout-content-container flex flex-col max-w-[960px] mx-auto">
    <h2 class="text-[#0d141c] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">
      <a href="misterio.php">Mistério</a>
    </h2>
    <div class="grid grid-cols-3 justify-center gap-6 p-4">
      <?php foreach ($misterio as $book): ?>
        <a href="livro.php?id=<?= urlencode($book['id']) ?>" class="flex flex-col gap-4 rounded-lg hover:shadow-lg hover:bg-gray-400 transition-shadow duration-300">
      <div class="flex flex-col gap-4 rounded-lg">
        <div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
          style='background-image: url("<?= htmlspecialchars($book['imagem_url']) ?>");'>
        </div>
        <div>
          <p class="text-[#0d141c] text-base font-medium leading-normal"><?= htmlspecialchars($book['nome_livro']) ?></p>
          <p class="text-[#49739c] text-sm font-normal leading-normal">By <?= htmlspecialchars($book['nome_autor']) ?></p>
        </div>
      </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>