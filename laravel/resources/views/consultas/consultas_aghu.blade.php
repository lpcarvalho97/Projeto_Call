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

        <label for="filtroAghu_2">Filtrar por:</label>
        <select id="filtroAghu_2">
            <option value="0">Número da Consulta</option>
            <option value="1">Data Marcação</option>
            <option value="2">Data Consulta</option>
            <option value="3">Dia da Semana</option>
            <option value="4">Número do Prontuário</option>
            <option value="5">Grade</option>
            <option value="6">Nome</option>
            <option value="7">Unidade Funcional</option>
            <option value="8">Especialidade</option>
            <option value="9">Equipe</option>
            <option value="10">Nome do Profissional</option>
            <option value="11">Telefone para Recado</option>
            <option value="12">Telefone para Contato</option>
        </select>
        
        <input type="text" id="filtroAghu" placeholder="Filtrar por nome do paciente...">

        <table id="tabelaAghu" border="1">
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
                        <td>{{ $consulta->fone_recado }}</td>
                        <td>{{ $consulta->fone_contato }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>

            function aplicaFiltroDinamico(inputId, selectId, tabelaId) {
                const input = document.getElementById(inputId);
                const select = document.getElementById(selectId);
                
                input.addEventListener('keyup', function () {

                    const filtro = input.value.toLowerCase();
                    const colunaIndex = parseInt(select.value);
                    const linhas = document.querySelectorAll(`#${tabelaId} tbody tr`); 

                    linhas.forEach(function (linha) {
                        const celula = linha.cells[colunaIndex];
                        if (celula) {
                            const texto = celula.textContent.toLowerCase();
                            linha.style.display = texto.includes(filtro) ? '' : 'none';
                        }
                    });
                });
            }

            aplicaFiltroDinamico('filtroAghu', 'filtroAghu_2', 'tabelaAghu');

        </script>



    </body>
</html>