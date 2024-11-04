<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNotificationsTableStructure extends Migration
{
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Remover colunas existentes que não são padrão, se existirem
            if (Schema::hasColumn('notifications', 'user_id')) {
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('notifications', 'message')) {
                $table->dropColumn('message');
            }
            if (Schema::hasColumn('notifications', 'read')) {
                $table->dropColumn('read');
            }

            // Adicionar colunas padrão do Laravel, se não existirem
            if (!Schema::hasColumn('notifications', 'notifiable_type')) {
                $table->string('notifiable_type');
            }
            if (!Schema::hasColumn('notifications', 'notifiable_id')) {
                $table->unsignedBigInteger('notifiable_id');
            }
            if (!Schema::hasColumn('notifications', 'read_at')) {
                $table->timestamp('read_at')->nullable();
            }

            // Garantir que a coluna 'data' existe e é do tipo text
            if (!Schema::hasColumn('notifications', 'data')) {
                $table->text('data');
            } else {
                $table->text('data')->change();
            }

            // Remover a coluna 'type' se existir
            if (Schema::hasColumn('notifications', 'type')) {
                $table->dropColumn('type');
            }
        });
    }

    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Não faremos nada aqui para evitar perda de dados
        });
    }
}
