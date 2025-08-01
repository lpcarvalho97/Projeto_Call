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
        Schema::create('consultas_aghu', function (Blueprint $table) {
            $table->id();
            $table->string('nr_consulta')->nullable();
            $table->string('data_marcacao')->nullable();
            $table->string('data_consulta')->nullable();
            $table->string('dia_semana')->nullable();
            $table->string('nr_prontuario')->nullable();
            $table->string('grade')->nullable();
            $table->string('nome_paciente')->nullable();
            $table->string('unidade_funcional')->nullable();
            $table->string('especialidade')->nullable();
            $table->string('equipe')->nullable();
            $table->string('nome_profissional')->nullable();
            $table->string('fone_recado')->nullable();
            $table->string('fone_contato')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas_aghu');
    }
};
