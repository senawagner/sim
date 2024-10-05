<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiliaisTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('filiais')) {
            Schema::create('filiais', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nome', 100)->nullable();
                $table->string('endereco', 255)->nullable();
                $table->string('cidade', 100)->nullable();
                $table->string('estado', 2)->nullable();
                $table->string('cnpj', 18)->nullable();
                $table->text('observacoes')->nullable();
                $table->date('dt_padrao')->nullable();
                $table->timestamp('criado_em')->useCurrent();
                $table->timestamp('atualizado_em')->useCurrent()->useCurrentOnUpdate();
            });
        } else {
            Schema::table('filiais', function (Blueprint $table) {
                if (!Schema::hasColumn('filiais', 'id')) {
                    $table->bigIncrements('id');
                }
                if (!Schema::hasColumn('filiais', 'nome')) {
                    $table->string('nome', 100)->nullable();
                }
                if (!Schema::hasColumn('filiais', 'endereco')) {
                    $table->string('endereco', 255)->nullable();
                }
                if (!Schema::hasColumn('filiais', 'cidade')) {
                    $table->string('cidade', 100)->nullable();
                }
                if (!Schema::hasColumn('filiais', 'estado')) {
                    $table->string('estado', 2)->nullable();
                }
                if (!Schema::hasColumn('filiais', 'cnpj')) {
                    $table->string('cnpj', 18)->nullable();
                }
                if (!Schema::hasColumn('filiais', 'observacoes')) {
                    $table->text('observacoes')->nullable();
                }
                if (!Schema::hasColumn('filiais', 'dt_padrao')) {
                    $table->date('dt_padrao')->nullable();
                }
                if (!Schema::hasColumn('filiais', 'criado_em')) {
                    $table->timestamp('criado_em')->useCurrent();
                }
                if (!Schema::hasColumn('filiais', 'atualizado_em')) {
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
        // Schema::dropIfExists('filiais');
    }
}
