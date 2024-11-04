<?php

$files = [
    __DIR__ . '/bootstrap/cache/packages.php',
    __DIR__ . '/bootstrap/cache/services.php',
    __DIR__ . '/bootstrap/cache/config.php'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        
        // Remove todas as referências ao Dusk
        $content = preg_replace('/[\'"]laravel\/dusk[\'"]\s*=>\s*array\s*\([^)]+\),?/s', '', $content);
        $content = preg_replace('/[\'"]Laravel\\\\Dusk\\\\DuskServiceProvider[\'"]\s*,?/s', '', $content);
        
        file_put_contents($file, $content);
        echo "Limpando $file\n";
    }
}
