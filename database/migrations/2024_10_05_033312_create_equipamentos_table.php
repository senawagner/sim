<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('equipamentos')) {
            Schema::create('equipamentos', function (Blueprint $table) {
                $table->bigIncrements('equipamento_id');
                $table->string('fabricante', 100)->nullable();
                $table->enum('tipo', ['Split', 'ACJ'])->nullable();
                $table->string('capacidade', 50)->nullable();
                $table->string('numero_patrimonio', 50)->nullable();
                $table->string('modelo_evaporadora', 50)->nullable();
                $table->string('modelo_condensadora', 50)->nullable();
                $table->set('caracteristicas', ['High Wall', 'Piso Teto', 'Inverter', 'Frio', 'Frio/Quente', '110.Mono', '220/Mono', '220/Trifasico', '380/Trifasico'])->nullable();
                $table->unsignedBigInteger('filial_id')->nullable();
                $table->string('localizacao', 100)->nullable();
                $table->string('andar', 10)->nullable();
                $table->text('observacoes')->nullable();
                $table->timestamp('criado_em')->useCurrent();
                $table->timestamp('atualizado_em')->useCurrent()->useCurrentOnUpdate();
            });
        } else {
            Schema::table('equipamentos', function (Blueprint $table) {
                if (!Schema::hasColumn('equipamentos', 'equipamento_id')) {
                    $table->bigIncrements('equipamento_id');
                }
                if (!Schema::hasColumn('equipamentos', 'fabricante')) {
                    $table->string('fabricante', 100)->nullable();
                }
                if (!Schema::hasColumn('equipamentos', 'tipo')) {
                    $table->enum('tipo', ['Split', 'ACJ'])->nullable();
                }
                if (!Schema::hasColumn('equipamentos', 'capacidade')) {
                    $table->string('capacidade', 50)->nullable();
                }
                if (!Schema::hasColumn('equipamentos', 'numero_patrimonio')) {
                    $table->string('numero_patrimonio', 50)->nullable();
                }
                if (!Schema::hasColumn('equipamentos', 'modelo_evaporadora')) {
                    $table->string('modelo_evaporadora', 50)->nullable();
                }
                if (!Schema::hasColumn('equipamentos', 'modelo_condensadora')) {
                    $table->string('modelo_condensadora', 50)->nullable();
                }
                if (!Schema::hasColumn('equipamentos', 'caracteristicas')) {
                    $table->set('caracteristicas', ['High Wall', 'Piso Teto', 'Inverter', 'Frio', 'Frio/Quente', '110.Mono', '220/Mono', '220/Trifasico', '380/Trifasico'])->nullable();
                }
                if (!Schema::hasColumn('equipamentos', 'filial_id')) {
                    $table->unsignedBigInteger('filial_id')->nullable();
                }
                if (!Schema::hasColumn('equipamentos', 'localizacao')) {
                    $table->string('localizacao', 100)->nullable();
                }
                if (!Schema::hasColumn('equipamentos', 'andar')) {
                    $table->string('andar', 10)->nullable();
                }
                if (!Schema::hasColumn('equipamentos', 'observacoes')) {
                    $table->text('observacoes')->nullable();
                }
                if (!Schema::hasColumn('equipamentos', 'criado_em')) {
                    $table->timestamp('criado_em')->useCurrent();
                }
                if (!Schema::hasColumn('equipamentos', 'atualizado_em')) {
                    $table->timestamp('atualizado_em')->useCurrent()->useCurrentOnUpdate();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Não vamos dropar a tabela, pois ela já existia antes desta migração
        // Schema::dropIfExists('equipamentos');
    }
}
