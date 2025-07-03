<?php
require_once 'conexao.php';
session_start();

$usuarioLogado = isset($_SESSION['email']); 
$nomeUsuario = isset($_SESSION['nome']) ? $_SESSION['nome'] : '';

$stmt = $conexao->prepare("SELECT * FROM tb_livros WHERE id_categoria = (SELECT id_categoria FROM tb_categorias WHERE categoria_nome = 'Academicos')");
$stmt->execute();
$academico = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conexao->prepare("SELECT * FROM tb_livros WHERE id_categoria = (SELECT id_categoria FROM tb_categorias WHERE categoria_nome = 'Literatura Infantil')");
$stmt->execute();
$infantil = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conexao->prepare("SELECT * FROM tb_livros WHERE id_categoria = (SELECT id_categoria FROM tb_categorias WHERE categoria_nome = 'Ficçao')");
$stmt->execute();
$ficcao = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conexao->prepare("SELECT * FROM tb_livros WHERE id_categoria = (SELECT id_categoria FROM tb_categorias WHERE categoria_nome = 'Misterio')");
$stmt->execute();
$misterio = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php

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
            <form action="pesquisa.php" method="GET" class="flex flex-col min-w-40 !h-10 max-w-64">
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
                  name="q"
                  placeholder="Search books or authors"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d141c] focus:outline-0 focus:ring-0 border-none bg-[#e7edf4] focus:border-none h-full placeholder:text-[#49739c] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                  value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>"
                  type="search"
                  autocomplete="off"
                  aria-label="Search books or authors"
                />
              </div>
            </form>
            <div class="flex gap-2">
              <button
                class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-[#e7edf4] text-[#0d141c] gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5"
              >
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