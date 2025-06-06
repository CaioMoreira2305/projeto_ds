<?php
if (!isset($_GET['termo'])) {
    echo json_encode([]);
    exit;
}

$termo = urlencode($_GET['termo']);
$url = "https://openlibrary.org/search.json?q={$termo}";

$response = file_get_contents($url);
$data = json_decode($response, true);

$resultados = [];

if (isset($data['docs'])) {
    foreach ($data['docs'] as $livro) {
        $titulo = $livro['title'] ?? 'Sem título';
        $autores = isset($livro['author_name']) ? implode(", ", $livro['author_name']) : 'Desconhecido';
        $capa_id = $livro['cover_i'] ?? null;
        $capa = $capa_id 
            ? "https://covers.openlibrary.org/b/id/{$capa_id}-M.jpg"
            : "https://via.placeholder.com/128x180?text=Sem+Capa";

        $resultados[] = [
            "titulo" => $titulo,
            "autores" => $autores,
            "capa" => $capa
        ];

        if (count($resultados) >= 20) break; // Limita a 10 resultados
    }
}

header('Content-Type: application/json');
echo json_encode($resultados);
