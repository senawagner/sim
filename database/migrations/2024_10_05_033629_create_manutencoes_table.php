<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManutencoesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('manutencoes')) {
            Schema::create('manutencoes', function (Blueprint $table) {
                $table->bigIncrements('manutencao_id');
                $table->enum('tipo', ['preventiva', 'corretiva'])->nullable();
                $table->enum('periodicidade', ['mensal', 'trimestral', 'semestral', 'avulsa'])->nullable();
                $table->text('itens_verificacao')->nullable();
                $table->unsignedBigInteger('equipamento_id')->nullable();
                $table->unsignedBigInteger('usuario_id')->nullable();
                $table->unsignedBigInteger('filial_id')->nullable();
                $table->date('data_manutencao')->nullable();
                $table->text('observacoes')->nullable();
                $table->timestamp('criado_em')->useCurrent();
                $table->timestamp('atualizado_em')->useCurrent()->useCurrentOnUpdate();
                $table->index('equipamento_id');
                $table->index('usuario_id');
                $table->index('filial_id');
            });
        } else {
            Schema::table('manutencoes', function (Blueprint $table) {
                if (!Schema::hasColumn('manutencoes', 'manutencao_id')) {
                    $table->bigIncrements('manutencao_id');
                }
                if (!Schema::hasColumn('manutencoes', 'tipo')) {
                    $table->enum('tipo', ['preventiva', 'corretiva'])->nullable();
                }
                if (!Schema::hasColumn('manutencoes', 'periodicidade')) {
                    $table->enum('periodicidade', ['mensal', 'trimestral', 'semestral', 'avulsa'])->nullable();
                }
                if (!Schema::hasColumn('manutencoes', 'itens_verificacao')) {
                    $table->text('itens_verificacao')->nullable();
                }
                if (!Schema::hasColumn('manutencoes', 'equipamento_id')) {
                    $table->unsignedBigInteger('equipamento_id')->nullable();
                }
                if (!Schema::hasColumn('manutencoes', 'usuario_id')) {
                    $table->unsignedBigInteger('usuario_id')->nullable();
                }
                if (!Schema::hasColumn('manutencoes', 'filial_id')) {
                    $table->unsignedBigInteger('filial_id')->nullable();
                }
                if (!Schema::hasColumn('manutencoes', 'data_manutencao')) {
                    $table->date('data_manutencao')->nullable();
                }
                if (!Schema::hasColumn('manutencoes', 'observacoes')) {
                    $table->text('observacoes')->nullable();
                }
                if (!Schema::hasColumn('manutencoes', 'criado_em')) {
                    $table->timestamp('criado_em')->useCurrent();
                }
                if (!Schema::hasColumn('manutencoes', 'atualizado_em')) {
                    $table->timestamp('atualizado_em')->useCurrent()->useCurrentOnUpdate();
                }

                // Adicionando índices se não existirem
                if (!$table->hasIndex(['equipamento_id'])) {
                    $table->index('equipamento_id');
                }
                if (!$table->hasIndex(['usuario_id'])) {
                    $table->index('usuario_id');
                }
                if (!$table->hasIndex(['filial_id'])) {
                    $table->index('filial_id');
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
        // Schema::dropIfExists('manutencoes');
    }
}
