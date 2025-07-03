<?php
require_once 'conexao.php';
session_start();

$usuarioLogado = isset($_SESSION['email']); 
$nomeUsuario = isset($_SESSION['nome']) ? $_SESSION['nome'] : '';

$stmt = $conexao->prepare("SELECT * FROM tb_livros WHERE id_categoria = (SELECT id_categoria FROM tb_categorias WHERE categoria_nome = 'Academicos')LIMIT 3");
$stmt->execute();
$academico = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conexao->prepare("SELECT * FROM tb_livros WHERE id_categoria = (SELECT id_categoria FROM tb_categorias WHERE categoria_nome = 'Literatura Infantil')LIMIT 3");
$stmt->execute();
$infantil = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conexao->prepare("SELECT * FROM tb_livros WHERE id_categoria = (SELECT id_categoria FROM tb_categorias WHERE categoria_nome = 'Ficçao')LIMIT 3");
$stmt->execute();
$ficcao = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conexao->prepare("SELECT * FROM tb_livros WHERE id_categoria = (SELECT id_categoria FROM tb_categorias WHERE categoria_nome = 'Misterio')LIMIT 3");
$stmt->execute();
$misterio = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Serif%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>Pagina Inicial</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  </head>
  <body>
    <div class="relative flex size-full min-h-screen flex-col bg-slate-50 group/design-root overflow-x-hidden" style='font-family: "Noto Serif", "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#e7edf4] px-10 py-3">
          <div class="flex items-center gap-8">
            <div class="flex items-center gap-4 text-[#0d141c]">
              <div class="size-4">
                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 4H17.3334V17.3334H30.6666V30.6666H44V44H4V4Z" fill="currentColor"></path></svg>
              </div>
              <h2 class="text-[#0d141c] text-lg font-bold leading-tight tracking-[-0.015em]"><a href = "index.php">Imaginação</a></h2>
            </div>
          </div>
          <div class="flex flex-1 justify-end gap-8">
            <label class="flex flex-col min-w-40 !h-10 max-w-64">
              <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                <div
                  class="text-[#49739c] flex border-none bg-[#e7edf4] items-center justify-center pl-4 rounded-l-lg border-r-0"
                  data-icon="MagnifyingGlass"
                  data-size="24px"
                  data-weight="regular"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"
                    ></path>
                  </svg>
                </div>
                <input
                  placeholder="Search"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border-none bg-[#e7edf4] focus:border-none h-full placeholder:text-[#49739c] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                  value=""
                />
              </div>
            </label>
            <div class="flex gap-2">
              <?php if ($usuarioLogado): ?>
                <div class="flex items-center gap-2 text-[#0d141c] text-sm font-medium">
                  Olá, <?= htmlspecialchars($nomeUsuario) ?>!
                  <a href="logout.php" class="text-blue-500 underline">Sair</a>
                </div>
              <?php else: ?>
              <a href = "login.php">
                <button
                   class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#e7edf4] text-[#0d141c] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5"
                  >
                
                  <div class="text-[#0d141c]" data-icon="User" data-size="20px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z">
                      </path>
                    </svg>
                  </div> 
                </button>
              </a>
              <?php endif; ?>
            </div>
          </div>
        </header>

        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="@container">
              <div class="@[480px]:p-4">
                <div
                  class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-lg items-center justify-center p-4"
                  style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuAcfi3ECyl7CA3DAcS870e3OYU7hLlIHAPWgL81QDS9HbZPzVX12zwwpWmlWfXMO59HDdv7bHz6YpXXH35DhjLloBFXCoZ9i4coJtCq3dID3inufg5d0Prtmz5odcR0kP_TFgEPr2NJv_qsqoj2oKP5wkzG58GDmWPmIRzUMmktzEkKHwzOCkfFTsZaETdC4ExKLNW-M6MLrT5NIZTtITsrmYloH1tZsrGwPAFiLh-ubbulynRK-MD7HTrdSgxKcBXiznP40HI_o3Y");'
                >
                  <div class="flex flex-col gap-2 text-center">
                    <h1
                      class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]"
                    >
                      Bem-Vindo à Imaginação
                    </h1>
                    <h2 class="text-white text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                      Seu destino para os melhores livros. 
                      Explore nossa vasta coleção de livros, e encontre o melhor livro para você.
                    </h2>
                  </div>
                  <button
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#0c7ff2] text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                  >
                    <span class="truncate">
                      <a href = "index.php">
                      Compre Agora</a>
                    </span>
                  </button>
                </div>
              </div>
            </div>
            
            <div class="px-40 flex flex-1 justify-center py-5">
            <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <h2 class="text-[#0d141c] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5"><a href="academico.php">Livros Acadêmicos</a></h2>
              <div class="grid gap-6 p-4 [grid-template-columns:repeat(auto-fit,minmax(186px,1fr))]">
                <?php foreach ($academico as $book): ?>
                  <a href="livro.php?id=<?= urlencode($book['id']) ?>" class="flex flex-col gap-4 rounded-lg hover:shadow-lg hover:bg-gray-400 transition-shadow duration-300">
                    <div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                        style='background-image: url("<?= htmlspecialchars($book['imagem_url']) ?>");'>
                    </div>
                    <div>
                      <p><?= htmlspecialchars($book['nome_livro']) ?></p>
                      <p class="text-[#49739c] text-sm font-normal leading-normal">By <?= htmlspecialchars($book['nome_autor']) ?></p>
                    </div>
                  </a>
                <?php endforeach; ?>
              </div>

                <h2 class="text-[#0d141c] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5"><a href="infantil.php">Literatura Infantil</a></h2>
                <div class="grid gap-6 p-4 [grid-template-columns:repeat(auto-fit,minmax(186px,1fr))]">
                  <?php foreach ($infantil as $book): ?>
                    <a href="livro.php?id=<?= urlencode($book['id']) ?>" class="flex flex-col gap-4 rounded-lg hover:shadow-lg hover:bg-gray-400 transition-shadow duration-300">
                      <div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                          style='background-image: url("<?= htmlspecialchars($book['imagem_url']) ?>");'>
                      </div>
                      <div>
                        <p><?= htmlspecialchars($book['nome_livro']) ?></p>
                        <p class="text-[#49739c] text-sm font-normal leading-normal">By <?= htmlspecialchars($book['nome_autor']) ?>
                      </div>
                    </a>
                  <?php endforeach; ?>
                </div>

                <h2 class="text-[#0d141c] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5"><a href="ficcao.php">Ficção</a></h2>
                <div class="grid gap-6 p-4 [grid-template-columns:repeat(auto-fit,minmax(186px,1fr))]">
                  <?php foreach ($ficcao as $book): ?>
                    <a href="livro.php?id=<?= urlencode($book['id']) ?>" class="flex flex-col gap-4 rounded-lg hover:shadow-lg hover:bg-gray-400 transition-shadow duration-300">
                      <div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                          style='background-image: url("<?= htmlspecialchars($book['imagem_url']) ?>");'>
                      </div>
                      <div>
                        <p><?= htmlspecialchars($book['nome_livro']) ?></p>
                        <p class="text-[#49739c] text-sm font-normal leading-normal">By <?= htmlspecialchars($book['nome_autor']) ?></p>
                      </div>
                    </a>
                  <?php endforeach; ?>
                </div>

                <h2 class="text-[#0d141c] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5"><a href="misterio.php">Mistério</a></h2>
                  <div class="grid gap-6 p-4 [grid-template-columns:repeat(auto-fit,minmax(186px,1fr))]">
                    <?php foreach ($misterio as $book): ?>
                      <a href="livro.php?id=<?= urlencode($book['id']) ?>" class="flex flex-col gap-4 rounded-lg hover:shadow-lg hover:bg-gray-400 transition-shadow duration-300">
                        <div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-lg"
                            style='background-image: url("<?= htmlspecialchars($book['imagem_url']) ?>");'>
                        </div>
                        <div>
                          <p><?= htmlspecialchars($book['nome_livro']) ?></p>
                          <p class="text-[#49739c] text-sm font-normal leading-normal">By <?= htmlspecialchars($book['nome_autor']) ?></p>
                        </div>
                      </a>
                    <?php endforeach; ?>
                  </div>
                </div>
            </div>
                    </div> 
        </div>
    </div>
</body>
</html>