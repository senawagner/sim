<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            // Remove a coluna andar
            $table->dropColumn('andar');
            
            // Adiciona a nova coluna setor_id como foreign key
            $table->foreignId('setor_id')->after('localizacao_id')
                  ->constrained('setor')
                  ->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            // Remove a foreign key e a coluna setor_id
            $table->dropForeign(['setor_id']);
            $table->dropColumn('setor_id');
            
            // Recria a coluna andar
            $table->string('andar')->nullable();
        });
    }
};
