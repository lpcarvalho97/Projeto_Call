<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Consultas</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { padding: 8px; border: 1px solid #ddd }
            th { background-color: #f2f2f2; }
            .hidden { display: none; }
        </style>
        
    </head>
    <body>
        
        <h1>Consultas SISFAM</h1>
        <input type="text" id="filtroSisfam" placeholder="Filtrar por nome do paciente...">
        <table id="tabelaSisfam">
            <thead>
                <tr>
                    <th>APAC</th>
                    <th>Status Financeiro</th>
                    <th>Autorizado</th>
                    <th>Profissional Solicitante</th>
                    <th>Prontuário</th>
                    <th>Paciente</th>
                    <th>CID</th>
                    <th>Descrição do Procedimento</th>
                    <th>Código do Procedimento</th>
                    <th>Nome do Procedimento</th>
                    <th>Tipo APAC</th>
                    <th>Situação</th>
                    <th>Motivo Perm Saída</th>
                    <th>Solicitação</th>
                    <th>Criação</th>
                    <th>Atualização</th>
                    <th>Validade</th>
                    <th>Motivo Saída</th>
                    <th>Localidade</th>
                    <th>Sol Aut</th>
                    <th>Situação APAC</th>
                    <th>Cod Tabela string</th>
                    <th>Descrição do Grupo</th>
                    <th>Meta Mensal</th>
                    <th>Multiplicador</th>
                    <th>Área Especialidade</th>
                    <th>Data Cirurgia</th>
                    <th>Cirurgia < 18 meses</th>
                    <th>Atendido por Dr. Marcelo</th>
                    <th>Processo Associado</th>
                    <th>APAC Emitida + 3 meses</th>
                    <th>Total de registros</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($consultasSisfam as $consulta)
                <tr>
                    <td>{{ $consulta->id_apac }}</td>
                    <td>{{ $consulta->status_financeiro }}</td>
                    <td>{{ $consulta->autorizado }}</td>
                    <td>{{ $consulta->profissional_solicitante }}</td>
                    <td>{{ $consulta->prontuario }}</td>
                    <td>{{ $consulta->paciente }}</td>
                    <td>{{ $consulta->cid }}</td>
                    <td>{{ $consulta->procedimento_descricao }}</td>
                    <td>{{ $consulta->codigo_procedimento }}</td>
                    <td>{{ $consulta->nome_procedimento }}</td>
                    <td>{{ $consulta->tipo_apac }}</td>
                    <td>{{ $consulta->situacao }}</td>
                    <td>{{ $consulta->motivo_perm_saida }}</td>
                    <td>{{ $consulta->solicitacao }}</td>
                    <td>{{ $consulta->criacao }}</td>
                    <td>{{ $consulta->atualizacao }}</td>
                    <td>{{ $consulta->validade }}</td>
                    <td>{{ $consulta->motivo_saida }}</td>
                    <td>{{ $consulta->localidade }}</td>
                    <td>{{ $consulta->sol_aut }}</td>
                    <td>{{ $consulta->situacao_apac }}</td>
                    <td>{{ $consulta->cod_tabela_string }}</td>
                    <td>{{ $consulta->descricao_grupo }}</td>
                    <td>{{ $consulta->meta_mensal }}</td>
                    <td>{{ $consulta->multiplicador }}</td>
                    <td>{{ $consulta->area_especialidade }}</td>
                    <td>{{ $consulta->data_cirurgia }}</td>
                    <td>{{ $consulta->cirurgia_menor_18_meses }}</td>
                    <td>{{ $consulta->atendido_dr_marcelo }}</td>
                    <td>{{ $consulta->proc_associado }}</td>
                    <td>{{ $consulta->apac_emitida_mais_3_meses }}</td>
                    <td>{{ $consulta->total_registros }}</td>
                </tr>
                @endforeach
        </table>

        <script>
            function aplicarFiltro(inputId, tabelaId, colunaIndex) {
                document.getElementById(inputId).addEventListener('keyup', function() {
                    let filtro = this.value.toLowerCase();
                    let linhas = document.querySelectorAll(`#${tabelaId} tbody tr`);

                    linhas.forEach(function(linha) {
                        let texto = linha.cells[colunaIndex].textContent.toLowerCase();
                        linha.style.display = texto.includes(filtro) ? '' : 'none';
                    });
                });
            }

            aplicarFiltro('filtroAghu', 'tabelaAghu', 0); //Filtra os dados do AGHU por nome de paciente
            aplicarFiltro('filtroSisfam', 'tabelaSisfam', 0); //FIltra os dados do Sisfam por nome de paciente
        </script>



    </body>
</html>