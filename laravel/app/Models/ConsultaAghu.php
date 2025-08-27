<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class ConsultaAghu extends Model
    {
        protected $table = 'consultas_aghu'; //Nome da tabela no banco

        protected $fillable = [
            'nr_consulta',
            'data_marcacao',
            'data_consulta',
            'dia_semana',
            'nr_prontuario',
            'grade',
            'nome_paciente',
            'unidade_funcional',
            'especialidade',
            'equipe',
            'nome_profissional',
            'fone_recado',
            'fone_contato',
            'Observacao',
            'Complemento',
        ];


        public $timestamps = true;
    }