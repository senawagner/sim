<?php

$autoloader = require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

// Força o carregamento do arquivo .env
(new \Symfony\Component\Dotenv\Dotenv())->bootEnv(__DIR__.'/.env');

// Registra os providers base
$app->registerConfiguredProviders();

// Lista todos os providers registrados
$providers = array_keys($app->getLoadedProviders());

echo "Providers Registrados:\n";
foreach ($providers as $provider) {
    echo "- " . $provider . "\n";
}
