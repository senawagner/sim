<?php

// Verifica se foi fornecido um argumento (senha) na linha de comando
if ($argc != 2) {
    echo "Uso: php generate_hash.php <senha>\n";
    exit(1);
}

// Pega a senha fornecida como argumento
$senha = $argv[1];

// Gera o hash da senha
$hash = password_hash($senha, PASSWORD_DEFAULT);

// Imprime o hash gerado
echo "Hash gerado: " . $hash . "\n";

