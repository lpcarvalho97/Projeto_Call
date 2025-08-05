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
        <h1>Consultas AGHU</h1>
        <input type="text" id="filtroAghu" placeholder="Filtrar por nome do paciente...">
        <table id="tabelaAghu">
            <thead>
                <tr>
                    <th>Número da Consulta</th>
                    <th>Data Marcação</th>
                    <th>Data Consulta</th>
                    <th>Dia da Semana</th>
                    <th>Número do Prontuário</th>
                    <th>Grade</th>
                    <th>Nome</th>
                    <th>Unidade Funcional</th>
                    <th>Especialidade</th>
                    <th>Equipe</th>
                    <th>Nome do Profisional</th>
                    <th>Telefone para Recado</th>
                    <th>Telefone para Contato</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultasAghu as $consulta)
                
                    <tr>
                        <td>{{ $consulta->nr_consulta }}</td>
                        <td>{{ $consulta->data_marcacao }}</td>
                        <td>{{ $consulta->data_consulta }}</td>
                        <td>{{ $consulta->dia_semana }}</td>
                        <td>{{ $consulta->nr_prontuario }}</td>
                        <td>{{ $consulta->grade }}</td>
                        <td>{{ $consulta->nome_paciente }}</td>
                        <td>{{ $consulta->unidade_funcional }}</td>
                        <td>{{ $consulta->especialidade }}</td>
                        <td>{{ $consulta->equipe }}</td>
                        <td>{{ $consulta->nome_profissional}}</td>
                        <td>{{ $consulta->fone_recado}}</td>
                        <td>{{ $consulta->fone_contato}}</td>
                    </tr>
                @endforeach
            </tbody>
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

        </script>



    </body>
</html>