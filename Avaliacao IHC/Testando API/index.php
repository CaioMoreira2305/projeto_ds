<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Buscar Livros - OpenLibrary</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Busca de Livros</h1>
        <input type="text" id="pesquisa" placeholder="Digite o nome do livro..." />
        <button onclick="buscarLivros()">Buscar</button>

        <div id="resultados"></div>
    </div>

    <script>
        function buscarLivros() {
            const termo = document.getElementById("pesquisa").value;

            fetch("buscar.php?termo=" + encodeURIComponent(termo))
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById("resultados");
                    container.innerHTML = "";

                    if (data.length === 0) {
                        container.innerHTML = "<p>Nenhum resultado encontrado.</p>";
                        return;
                    }

                    data.forEach(livro => {
                        const div = document.createElement("div");
                        div.className = "livro";
                        div.innerHTML = `
                            <img src="${livro.capa}" alt="Capa do livro" />
                            <h3>${livro.titulo}</h3>
                            <p>Autor(es): ${livro.autores}</p>
                        `;
                        container.appendChild(div);
                    });
                })
                .catch(error => {
                    console.error("Erro:", error);
                });
        }
    </script>
</body>
</html>