<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_patrimonio');
            $table->string('tipo');
            $table->foreignId('fabricante_id')->constrained('fabricantes');
            $table->foreignId('capacidade_id')->constrained('capacidades');
            $table->foreignId('modelo_evaporadora_id')->nullable()->constrained('modelos');
            $table->foreignId('modelo_condensadora_id')->nullable()->constrained('modelos');
            $table->foreignId('filial_id')->constrained('filiais')->onDelete('cascade');
            $table->foreignId('localizacao_id')->constrained('localizacao');
            $table->foreignId('setor_id')->constrained('setor');
            $table->text('observacoes')->nullable();
            $table->timestamps();
            
            // Índices
            $table->index('numero_patrimonio');
            $table->index('tipo');
            $table->index('filial_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipamentos');
    }
};