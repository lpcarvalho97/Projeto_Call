<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ConsultaAghu;
use App\Models\ConsultaSisfam;

class ConsultaSeeder extends Seeder
{
    public function run(): void
    {
        ConsultaAghu::create([
            'nr_consulta' => '001',
            'data_marcacao' => '2025-07-20',
            'data_consulta' => '2025-07-25',
            'dia_semana' => 'Sexta-feira',
            'nr_prontuario' => '123456',
            'grade' => 'A1',
            'nome_paciente' => 'João da Silva',
            'unidade_funcional' => 'Clínica Geral',
            'especialidade' => 'Cardiologia',
            'equipe' => 'Equipe A',
            'nome_profissional' => 'Dr. Marcos Andrade',
            'fone_recado' => '11999999999',
            'fone_contato' => '11999999999',
            'observacao' => 'não ligar',
            'complemento' => 'falar com Pedro',

        ]);

        ConsultaSisfam::create([
            'paciente' => 'Jessica',
            'data_cirurgia' => '2025-07-25',
            'profissional_solicitante' => 'Dr. Renato',
            'total_registros' => '2',
        ]);
    }
}
