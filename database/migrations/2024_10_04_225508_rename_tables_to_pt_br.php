<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTablesToPtBr extends Migration
{
    public function up()
    {
        Schema::rename('users', 'usuarios');
        Schema::rename('companies', 'empresas');
        Schema::rename('branches', 'filiais');
        Schema::rename('equipments', 'equipamentos');
        Schema::rename('maintenances', 'manutencoes');
        Schema::rename('technicians', 'tecnicos');
    }

    public function down()
    {
        Schema::rename('usuarios', 'users');
        Schema::rename('empresas', 'companies');
        Schema::rename('filiais', 'branches');
        Schema::rename('equipamentos', 'equipments');
        Schema::rename('manutencoes', 'maintenances');
        Schema::rename('tecnicos', 'technicians');
    }
}
