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
            //Filiais
            FiliaisTableSeeder::class,

            // Primeiro as permissões e papéis
            PermissionsSeeder::class,

            //Usuário arquiteto padrão
            ArquitetoUserSeeder::class,

            //Usuário administrador padrão
            //AdminUserSeeder::class,
            
            // Outros seeders especificos do sistema
            //EquipamentoSeeder::class,
            //ContratosPmocSeeder::class,
            //CiclosManutencaoSeeder::class,
            //ItensVerificacaoSeeder::class,
            
            
            
        ]);
    }
}
