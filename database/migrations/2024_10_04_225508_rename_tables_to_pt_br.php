<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Verifica se a tabela antiga existe e a nova não existe antes de renomear
        if (Schema::hasTable('users') && !Schema::hasTable('usuarios')) {
            Schema::rename('users', 'usuarios');
        }
        if (Schema::hasTable('companies') && !Schema::hasTable('empresas')) {
            Schema::rename('companies', 'empresas');
        }
        // ... outras renomeações ...
    }

    public function down()
    {
        if (Schema::hasTable('usuarios') && !Schema::hasTable('users')) {
            Schema::rename('usuarios', 'users');
        }
        if (Schema::hasTable('empresas') && !Schema::hasTable('companies')) {
            Schema::rename('empresas', 'companies');
        }
        // ... outras renomeações ...
    }
};