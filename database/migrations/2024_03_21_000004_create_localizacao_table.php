<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('localizacao', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            
            // Índice
            $table->index('nome');
        });

        // Inserir localizações iniciais
        DB::table('localizacao')->insert([
            ['nome' => 'Térreo', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => '1º Andar', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => '2º Andar', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => '3º Andar', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Subsolo', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Cobertura', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Área Externa', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Mezanino', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('localizacao');
    }
};
