<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('capacidades', function (Blueprint $table) {
            $table->id();
            $table->string('valor')->unique();
            $table->boolean('ativo')->default(true);
            $table->timestamps();
            
            // Índice
            $table->index('valor');
        });

        // Inserir capacidades iniciais (BTUs)
        DB::table('capacidades')->insert([
            ['valor' => '7.000', 'created_at' => now(), 'updated_at' => now()],
            ['valor' => '9.000', 'created_at' => now(), 'updated_at' => now()],
            ['valor' => '12.000', 'created_at' => now(), 'updated_at' => now()],
            ['valor' => '18.000', 'created_at' => now(), 'updated_at' => now()],
            ['valor' => '24.000', 'created_at' => now(), 'updated_at' => now()],
            ['valor' => '30.000', 'created_at' => now(), 'updated_at' => now()],
            ['valor' => '36.000', 'created_at' => now(), 'updated_at' => now()],
            ['valor' => '48.000', 'created_at' => now(), 'updated_at' => now()],
            ['valor' => '60.000', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('capacidades');
    }
};
