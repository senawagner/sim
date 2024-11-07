<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->foreignId('fabricante_id')->constrained('fabricantes');
            $table->enum('tipo', ['evaporadora', 'condensadora']);
            $table->foreignId('capacidade_id')->constrained('capacidades');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            
            // Índices
            $table->index('codigo');
            $table->index(['fabricante_id', 'tipo']);
        });

        // Inserir alguns modelos iniciais
        DB::table('modelos')->insert([
            // Fujitsu (ID: 1)
            ['codigo' => 'AOBA30LCT', 'fabricante_id' => 1, 'tipo' => 'evaporadora', 'capacidade_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => 'AOBA36LCT', 'fabricante_id' => 1, 'tipo' => 'evaporadora', 'capacidade_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => 'AOBR30LCT', 'fabricante_id' => 1, 'tipo' => 'condensadora', 'capacidade_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => 'AOBR36LCT', 'fabricante_id' => 1, 'tipo' => 'condensadora', 'capacidade_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            
            // Elgin (ID: 2)
            ['codigo' => 'PHFI-30000-2', 'fabricante_id' => 2, 'tipo' => 'evaporadora', 'capacidade_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => 'PHFE-30000-2', 'fabricante_id' => 2, 'tipo' => 'condensadora', 'capacidade_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            
            // LG (ID: 3)
            ['codigo' => 'USUQ242CSZ3', 'fabricante_id' => 3, 'tipo' => 'evaporadora', 'capacidade_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['codigo' => 'USUQ362CSZ3', 'fabricante_id' => 3, 'tipo' => 'condensadora', 'capacidade_id' => 7, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('modelos');
    }
};
