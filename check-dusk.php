<?php
echo "Iniciando verificação...\n\n";

function checkFile($file) {
    if (!file_exists($file)) {
        echo "Arquivo não existe: $file\n";
        return;
    }
    
    echo "Verificando: $file\n";
    $content = file_get_contents($file);
    
    // Procura por qualquer referência ao Dusk
    if (preg_match_all('/(Dusk|dusk)/i', $content, $matches)) {
        echo "!!! ENCONTRADO !!!\n";
        var_dump($matches[0]);
        echo "\n";
    }
}

$files = [
    __DIR__ . "/config/app.php",
    __DIR__ . "/bootstrap/cache/packages.php",
    __DIR__ . "/bootstrap/cache/services.php",
    __DIR__ . "/config/services.php"
];

foreach ($files as $file) {
    checkFile($file);
}