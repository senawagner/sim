<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Primeiro as permissões e papéis
            PermissionsSeeder::class,
            
            // Depois os dados básicos do sistema
            FilialSeeder::class,
            EquipamentoSeeder::class,
            
            // Se houver um usuário admin padrão
            AdminUserSeeder::class,
            
            // Outros seeders específicos do sistema
            ContratosPmocSeeder::class,
            CiclosManutencaoSeeder::class,
            ItensVerificacaoSeeder::class,
        ]);
    }
}
