<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Usuario;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Lista de permissões
        $permissions = [
            // Equipamentos
            'listar equipamentos',
            'criar equipamentos',
            'editar equipamentos',
            'excluir equipamentos',
            // Manutenções
            'listar manutencoes',
            'criar manutencoes',
            'editar manutencoes',
            'excluir manutencoes',
            // Filiais
            'listar filiais',
            'criar filiais',
            'editar filiais',
            'excluir filiais'
        ];

        // Criar permissões se não existirem
        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission, 'web');
        }

        // Criar ou recuperar papéis
        $roleAdmin = Role::findOrCreate('admin', 'web');
        $roleTecnico = Role::findOrCreate('tecnico', 'web');
        $roleGestor = Role::findOrCreate('gestor', 'web');

        // Atribuir todas as permissões ao admin
        $roleAdmin->syncPermissions(Permission::all());

        // Atribuir permissões específicas ao técnico
        $roleTecnico->syncPermissions([
            'listar equipamentos',
            'listar manutencoes',
            'editar manutencoes'
        ]);

        // Atribuir permissões específicas ao gestor
        $roleGestor->syncPermissions([
            'listar equipamentos',
            'listar manutencoes',
            'listar filiais',
            'criar manutencoes'
        ]);

        // Atribuir papel de admin ao Wagner (ID 1)
        if ($wagner = Usuario::find(1)) {
            $wagner->syncRoles(['admin']);
        }
    }
}
