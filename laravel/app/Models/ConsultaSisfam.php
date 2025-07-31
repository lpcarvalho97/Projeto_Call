<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultaSisfam extends Model
{
    protected $table = 'consulta_sisfam';

    protected $fillable = [
        'id_apac',
        'status_financeiro',
        'autorizado',
        'profissional_solicitante',
        'prontuario',
        'paciente',
        'cid',
        'procedimento_descricao',
        'codigo_procedimento',
        'nome_procedimento',
        'tipo_apac',
        'situacao',
        'motivo_perm_saida',
        'solicitacao',
        'criacao',
        'atualizacao',
        'validade',
        'motivo_saida',
        'localidade',
        'sol_aut',
        'situacao_apac',
        'cod_tabela_string',
        'descricao_grupo',
        'meta_mensal',
        'multiplicador',
        'area_especialidade',
        'data_cirurgia',
        'cirurgia_menor_18_meses',
        'atendido_dr_marcelo',
        'proc_associado',
        'apac_emitida_mais_3_meses',
        'total_registros',
    ];

    public $timestamps = false;
}
