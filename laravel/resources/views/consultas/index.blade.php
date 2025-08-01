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
                    <th>Nome</th>
                    <th>Data Consulta</th>
                    <th>Unidade</th>
                    <th>Especialidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultasAghu as $consulta)
                
                    <tr>
                        <td>{{ $consulta->nome_paciente }}</td>
                        <td>{{ $consulta->data_consulta }}</td>
                        <td>{{ $consulta->unidade_funcional }}</td>
                        <td>{{ $consulta->especialidade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h1>Consultas SISFAM</h1>
        <input type="text" id="filtroSisfam" placeholder="Filtrar por nome do paciente...">
        <table id="tabelaSisfam">
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Data Cirurgia</th>
                    <th>Procedimento</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($consultasSisfam as $consulta)
                <tr>
                    <td>{{ $consulta->paciente }}</td>
                    <td>{{ $consulta->data_cirurgia }}</td>
                    <td>{{ $consulta->nome_procedimento }}</td>
                    <td>{{ $consulta->situacao }}</td>
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
            aplicarFIltro('filtroSisfam', 'tabelaSisfam', 0); //FIltra os dados do Sisfam por nome de paciente
        </script>



    </body>
</html>