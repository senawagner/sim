<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToManutencoesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('manutencoes', function (Blueprint $table) {
            $table->string('status')->default('pendente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('manutencoes', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
