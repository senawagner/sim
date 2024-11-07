<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('manutencoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipamento_id')->constrained('equipamentos')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->date('data_programada')->nullable();
            $table->date('data_realizada')->nullable();
            $table->string('status')->default('pendente');
            $table->text('observacoes')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index(['equipamento_id', 'data_programada']);
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('manutencoes');
    }
};