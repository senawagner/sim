<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

class UpdateDbStructure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:update-structure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the database structure documentation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $output = "# Estrutura do Banco de Dados\n\n";

        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $tableName = array_values((array)$table)[0];
            $output .= "## Tabela: $tableName\n\n";
            $output .= "| Coluna | Tipo | Nulo | Chave | Padrão | Extra |\n";
            $output .= "|--------|------|------|-------|--------|-------|\n";

            $columns = DB::select("SHOW COLUMNS FROM $tableName");
            foreach ($columns as $column) {
                $output .= "| {$column->Field} | {$column->Type} | {$column->Null} | {$column->Key} | {$column->Default} | {$column->Extra} |\n";
            }

            $output .= "\n";
        }

        File::put(base_path('docs/db_structure.md'), $output);

        $this->info('Database structure documentation updated successfully.');
    }
}
