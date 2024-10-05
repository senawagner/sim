<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('usuarios')) {
            Schema::create('usuarios', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('nome', 255)->nullable();
                $table->string('email', 191);
                $table->enum('perfil', ['administrador', 'tecnico', 'coordenador'])->nullable();
                $table->timestamp('email_verificado_em')->nullable();
                $table->string('senha', 255)->nullable();
                $table->string('token_lembrete', 100)->nullable();
                $table->timestamp('criado_em')->useCurrent();
                $table->timestamp('atualizado_em')->useCurrent()->useCurrentOnUpdate();
                $table->string('nome_usuario', 255)->nullable();
            });
        } else {
            Schema::table('usuarios', function (Blueprint $table) {
                if (!Schema::hasColumn('usuarios', 'id')) {
                    $table->bigIncrements('id');
                }
                if (!Schema::hasColumn('usuarios', 'nome')) {
                    $table->string('nome', 255)->nullable();
                }
                if (!Schema::hasColumn('usuarios', 'email')) {
                    $table->string('email', 191);
                }
                if (!Schema::hasColumn('usuarios', 'perfil')) {
                    $table->enum('perfil', ['administrador', 'tecnico', 'coordenador'])->nullable();
                }
                if (!Schema::hasColumn('usuarios', 'email_verificado_em')) {
                    $table->timestamp('email_verificado_em')->nullable();
                }
                if (!Schema::hasColumn('usuarios', 'senha')) {
                    $table->string('senha', 255)->nullable();
                }
                if (!Schema::hasColumn('usuarios', 'token_lembrete')) {
                    $table->string('token_lembrete', 100)->nullable();
                }
                if (!Schema::hasColumn('usuarios', 'criado_em')) {
                    $table->timestamp('criado_em')->useCurrent();
                }
                if (!Schema::hasColumn('usuarios', 'atualizado_em')) {
                    $table->timestamp('atualizado_em')->useCurrent()->useCurrentOnUpdate();
                }
                if (!Schema::hasColumn('usuarios', 'nome_usuario')) {
                    $table->string('nome_usuario', 255)->nullable();
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
        // Schema::dropIfExists('usuarios');
    }
}
