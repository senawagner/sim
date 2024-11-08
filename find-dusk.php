<?php
function searchInDirectory($dir) {
    $files = glob($dir . '/*');
    foreach($files as $file) {
        if(is_dir($file)) {
            searchInDirectory($file);
        } else {
            if(pathinfo($file, PATHINFO_EXTENSION) == 'php') {
                $content = file_get_contents($file);
                if(stripos($content, 'Dusk') !== false) {
                    echo "Encontrado em: $file\n";
                    // Mostra as linhas que contÍm 'Dusk'
                    $lines = file($file);
                    foreach($lines as $number => $line) {
                        if(stripos($line, 'Dusk') !== false) {
                            echo "  Linha " . ($number + 1) . ": " . trim($line) . "\n";
                        }
                    }
                    echo "\n";
                }
            }
        }
    }
}

echo "Procurando por referÍncias ao Dusk...\n\n";
searchInDirectory(__DIR__);
