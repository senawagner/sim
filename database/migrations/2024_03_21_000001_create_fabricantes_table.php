<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fabricantes', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            
            // Índice
            $table->index('nome');
        });

        // Inserir fabricantes iniciais
        DB::table('fabricantes')->insert([
            ['nome' => 'Fujitsu', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Elgin', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'LG', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Carrier', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Daikin', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Midea', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Samsung', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('fabricantes');
    }
};
