<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;

class UpdateFileStructure extends Command
{
    protected $signature = 'docs:update-file-structure';
    protected $description = 'Update the file structure documentation for production-relevant files';

    protected $relevantDirs = [
        'app', 'bootstrap', 'config', 'database/migrations', 'docs', 'nginx', 'public', 'resources/views', 'routes', 
        'storage/app'
    ];

    protected $excludedFiles = [
        '.gitignore', '.gitattributes', 'README.md', 'phpunit.xml', 'package.json', 'composer.json', 'webpack.mix.js'
    ];

    public function handle()
    {
        $basePath = base_path();
        $finder = new Finder();
        $finder->in(array_map(function($dir) use ($basePath) { return $basePath . '/' . $dir; }, $this->relevantDirs))
               ->notName($this->excludedFiles)
               ->sortByType();

        $tree = [];
        $dirCount = 0;
        $fileCount = 0;

        foreach ($finder as $file) {
            $relativePath = str_replace($basePath . DIRECTORY_SEPARATOR, '', $file->getPathname());
            $pathParts = explode(DIRECTORY_SEPARATOR, $relativePath);
            
            $current = &$tree;
            foreach ($pathParts as $part) {
                if (!isset($current[$part])) {
                    $current[$part] = [];
                }
                $current = &$current[$part];
            }
            
            if ($file->isDir()) {
                $dirCount++;
            } else {
                $fileCount++;
            }
        }

        $output = "# Estrutura de Arquivos do Projeto SIM (Pacote de Implantação)\n\n";
        $output .= "Atualizado em: " . now()->format('d/m/Y H:i:s') . "\n\n";
        $output .= "Total: {$dirCount} pastas e {$fileCount} arquivos\n\n";
        $output .= "Legenda:\n";
        $output .= "🟨 representa pastas\n";
        $output .= "🔵 representa arquivos\n\n";
        $output .= "---\n\n";
        $output .= $this->renderTree($tree);

        File::put(base_path('docs/file_structure.md'), $output);

        $this->info('File structure documentation for production-relevant files updated successfully.');
    }

    protected function renderTree($tree, $prefix = '')
    {
        $output = '';
        $lastKey = array_key_last($tree);

        foreach ($tree as $key => $value) {
            $isLast = ($key === $lastKey);
            $newPrefix = $prefix . ($isLast ? '└── ' : '├── ');
            
            if (empty($value)) {
                $output .= $newPrefix . "🔵 {$key}\n";
            } else {
                $output .= $newPrefix . "🟨 {$key}\n";
                $output .= $this->renderTree($value, $prefix . ($isLast ? '    ' : '│   '));
            }
        }

        return $output;
    }
}
