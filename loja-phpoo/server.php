<?php

// Caminho para os arquivos no diretório "public"
$baseDir = __DIR__ . '/public';

// Verifica se a URL é para um arquivo estático (CSS, JS, imagens, etc.)
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|woff2|ttf|svg)$/', $_SERVER["REQUEST_URI"])) {
    // Mapeia a URL para o caminho real no sistema de arquivos
    $filePath = $baseDir . $_SERVER["REQUEST_URI"];

    // Verifica se o arquivo existe
    if (file_exists($filePath)) {
        // Define o tipo MIME correto para arquivos CSS
        $mimeType = mime_content_type($filePath);
        if (str_ends_with($filePath, '.css')) {
            $mimeType = 'text/css';
        }
        header("Content-Type: $mimeType");
        readfile($filePath);
        exit;
    } else {
        // Retorna 404 se o arquivo não existir
        http_response_code(404);
        echo "Arquivo não encontrado: {$_SERVER["REQUEST_URI"]}";
        exit;
    }
} else {
    // Para todas as outras requisições, redireciona para o index.php
require_once $baseDir . '/index.php';
}
