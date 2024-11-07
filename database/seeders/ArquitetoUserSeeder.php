<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class ArquitetoUserSeeder extends Seeder
{
    public function run(): void
    {
        // Criar ou recuperar o papel de arquiteto
        $roleArquiteto = Role::findOrCreate('arquiteto', 'web');

        // Definir permissões do arquiteto
        $roleArquiteto->syncPermissions([
            'listar equipamentos',
            'criar equipamentos',
            'editar equipamentos',
            'excluir equipamentos',
            'listar manutencoes',
            'listar filiais'
        ]);

        // Criar usuário arquiteto com os parâmetros especificados
        $arquiteto = Usuario::firstOrCreate(
            ['email' => 'arquiteto@example.com'],
            [
                'nome_usuario' => 'Wagner',
                'password' => Hash::make('senha123'),
                'perfil' => 'arquiteto'
            ]
        );

        // Atribuir papel de arquiteto
        $arquiteto->syncRoles(['arquiteto']);

        $this->command->info('Usuário arquiteto Wagner criado com sucesso!');
    }
}
