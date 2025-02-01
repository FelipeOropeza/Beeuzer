<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=beeuzer_db;charset=utf8mb4", "root", "kiraFE22022006", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Exibe erros como exceções
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retorna os resultados como array associativo
        PDO::ATTR_EMULATE_PREPARES => false, // Desativa a emulação de prepared statements para mais segurança
    ]);

    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
