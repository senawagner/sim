<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('empresas')) {
            Schema::create('empresas', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nome', 191);
                $table->string('cnpj', 14)->unique();
                $table->string('endereco', 191)->nullable();
                $table->string('telefone', 15)->nullable();
                $table->string('email', 191)->nullable();
                $table->string('site', 191)->nullable();
                $table->timestamp('criado_em')->useCurrent();
                $table->timestamp('atualizado_em')->useCurrent()->useCurrentOnUpdate();
            });
        } else {
            Schema::table('empresas', function (Blueprint $table) {
                if (!Schema::hasColumn('empresas', 'nome')) {
                    $table->string('nome', 191);
                }
                if (!Schema::hasColumn('empresas', 'cnpj')) {
                    $table->string('cnpj', 14)->unique();
                }
                if (!Schema::hasColumn('empresas', 'endereco')) {
                    $table->string('endereco', 191)->nullable();
                }
                if (!Schema::hasColumn('empresas', 'telefone')) {
                    $table->string('telefone', 15)->nullable();
                }
                if (!Schema::hasColumn('empresas', 'email')) {
                    $table->string('email', 191)->nullable();
                }
                if (!Schema::hasColumn('empresas', 'site')) {
                    $table->string('site', 191)->nullable();
                }
                if (!Schema::hasColumn('empresas', 'criado_em')) {
                    $table->timestamp('criado_em')->useCurrent();
                }
                if (!Schema::hasColumn('empresas', 'atualizado_em')) {
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
        // Schema::dropIfExists('empresas');
    }
}
