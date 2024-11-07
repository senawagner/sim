<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FiliaisTableSeeder extends Seeder
{
    public function run()
    {
        // Array com todas as filiais
        $filiais = [
            [
                'nome' => 'Ana Costa',
                'endereco' => 'Av. Ana Costa, 402',
                'cidade' => 'Santos',
                'estado' => 'SP',
                'cep' => '11000-000',
                'telefone' => '13 3100-0000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nome' => 'Conselheiro Nébias',
                'endereco' => 'Av. Conselheiro Nébias, 518',
                'cidade' => 'Santos',
                'estado' => 'SP',
                'cep' => '11000-001',
                'telefone' => '13 3100-0000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // ... continua com todas as filiais ...
        ];

        // Insere todas as filiais no banco
        DB::table('filiais')->insert($filiais);
        
        // Mensagem de feedback
        $this->command->info('Filiais cadastradas com sucesso!');
    }
}
