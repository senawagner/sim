<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateManutencoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manutencoes', function (Blueprint $table) {
            // Remover colunas desnecessárias se existirem
            $this->dropColumnIfExists($table, ['itens_verificacao', 'data_manutencao', 'criado_em', 'atualizado_em']);

            // Modificar colunas existentes
            if (Schema::hasColumn('manutencoes', 'tipo')) {
                $table->string('tipo')->change();
            }
            if (Schema::hasColumn('manutencoes', 'periodicidade')) {
                $table->string('periodicidade')->change();
            }

            // Adicionar novas colunas se não existirem
            if (!Schema::hasColumn('manutencoes', 'data_realizada')) {
                $table->date('data_realizada')->nullable()->after('data_programada');
            }
            if (!Schema::hasColumn('manutencoes', 'status')) {
                $table->string('status')->default('Pendente')->after('observacoes');
            }

            // Renomear colunas se necessário
            if (Schema::hasColumn('manutencoes', 'manutencao_id') && !Schema::hasColumn('manutencoes', 'id')) {
                $table->renameColumn('manutencao_id', 'id');
            }

            // Adicionar chaves estrangeiras se ainda não existirem
            $this->addForeignKeyIfNotExists($table, 'equipamento_id', 'equipamentos');
            $this->addForeignKeyIfNotExists($table, 'usuario_id', 'users');
            $this->addForeignKeyIfNotExists($table, 'filial_id', 'filiais');

            // Adicionar timestamps se não existirem
            if (!Schema::hasColumn('manutencoes', 'created_at')) {
                $table->timestamps();
            }
        });

        // Adicionar restrições após a criação das colunas
        $this->addCheckConstraint('manutencoes', 'chk_tipo', "tipo IN ('Preventiva', 'Corretiva')");
        $this->addCheckConstraint('manutencoes', 'chk_periodicidade', "periodicidade IN ('Mensal', 'Trimestral', 'Semestral')");
        $this->addCheckConstraint('manutencoes', 'chk_status', "status IN ('Pendente', 'Realizada', 'Atrasada')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manutencoes', function (Blueprint $table) {
            // Remover restrições
            $this->dropCheckConstraint('manutencoes', 'chk_tipo');
            $this->dropCheckConstraint('manutencoes', 'chk_periodicidade');
            $this->dropCheckConstraint('manutencoes', 'chk_status');

            // Reverter as mudanças feitas no método up()
            $table->string('itens_verificacao')->nullable();
            $table->date('data_manutencao')->nullable();
            $table->dropColumn(['data_realizada', 'status']);
            if (Schema::hasColumn('manutencoes', 'id') && !Schema::hasColumn('manutencoes', 'manutencao_id')) {
                $table->renameColumn('id', 'manutencao_id');
            }
            $table->dropTimestamps();
        });
    }

    private function dropColumnIfExists(Blueprint $table, $columns)
    {
        $columns = is_array($columns) ? $columns : [$columns];
        foreach ($columns as $column) {
            if (Schema::hasColumn('manutencoes', $column)) {
                $table->dropColumn($column);
            }
        }
    }

    private function addForeignKeyIfNotExists(Blueprint $table, $column, $referencedTable)
    {
        if (!Schema::hasColumn('manutencoes', $column)) {
            $table->foreignId($column)->constrained($referencedTable);
        }
    }

    private function addCheckConstraint($table, $name, $condition)
    {
        $checkExists = DB::select("SHOW CREATE TABLE $table")[0]->{'Create Table'};
        if (strpos($checkExists, "CONSTRAINT `$name`") === false) {
            DB::statement("ALTER TABLE $table ADD CONSTRAINT $name CHECK ($condition)");
        }
    }

    private function dropCheckConstraint($table, $name)
    {
        $checkExists = DB::select("SHOW CREATE TABLE $table")[0]->{'Create Table'};
        if (strpos($checkExists, "CONSTRAINT `$name`") !== false) {
            DB::statement("ALTER TABLE $table DROP CONSTRAINT $name");
        }
    }
}
