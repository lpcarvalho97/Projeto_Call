<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultas_sisfam', function (Blueprint $table) {
            $table->id();
            $table->string('id_apac')->nullable();
            $table->string('status_financeiro')->nullable();
            $table->string('autorizado')->nullable();
            $table->string('profissional_solicitante')->nullable();
            $table->string('prontuario')->nullable();
            $table->string('paciente')->nullable();
            $table->string('cid')->nullable();
            $table->string('procedimento_descricao')->nullable();
            $table->string('codigo_procedimento')->nullable();
            $table->string('nome_procedimento')->nullable();
            $table->string('tipo_apac')->nullable();
            $table->string('situacao')->nullable();
            $table->string('motivo_perm_saida')->nullable();
            $table->dateTime('solicitacao')->nullable();
            $table->dateTime('criacao')->nullable();
            $table->dateTIme('atualizacao')->nullable();
            $table->dateTime('validade')->nullable();
            $table->string('motivo_saida')->nullable();
            $table->string('localidade')->nullable();
            $table->string('sol_aut')->nullable();
            $table->string('situacao_apac')->nullable();
            $table->string('cod_tabela_string')->nullable();
            $table->string('descricao_grupo')->nullable();
            $table->string('meta_mensal')->nullable();
            $table->string('multiplicador')->nullable();
            $table->string('area_especialidade')->nullable();
            $table->string('data_cirurgia')->nullable();
            $table->string('cirurgia_menor_18_meses')->nullable();
            $table->string('atendido_dr_marcelo')->nullable();
            $table->string('proc_associado')->nullable();
            $table->string('apac_emitida_mais_3_meses')->nullable();
            $table->string('total_registros')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas_sisfam');
    }
};
