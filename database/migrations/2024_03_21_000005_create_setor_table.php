<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('setor', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            
            // Índice
            $table->index('nome');
        });

        // Inserir setores iniciais
        DB::table('setor')->insert([
            ['nome' => 'Ginecologia', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Sala de Espera', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Drive', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Recepção', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Consultório', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Laboratório', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Farmácia', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Administração', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('setor');
    }
};
