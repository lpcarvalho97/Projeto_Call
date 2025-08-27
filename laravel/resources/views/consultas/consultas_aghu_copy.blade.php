<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Consultas AGHU</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--<style>
        <!--    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        <!--    th, td { padding: 8px; border: 1px solid #ddd }
        <!--    th { background-color: #f2f2f2; }
        <!--    .hidden { display: none; }
        <!--</style>---->
        <link rel="stylesheet" href="/views/css/consultas.css">
        
    </head>
    <body>
        <h1>Consultas AGHU</h1>

        <div id="filtros-container"></div>

        <button id="adicionar-filtro">+ Adicionar Filtro</button>
        <button id="limpar-filtros">Limpar Filtros</button>
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
            window.onload = function (){

                const campos = [
                    { label: 'Número', coluna: 0, tipo: 'number'},
                    { label: 'Nome', coluna: 1, tipo: 'text'},
                    { label: 'Especialidade', coluna: 2, tipo: 'text'},
                    { label: 'Data Consulta', coluna: 3, tipo: 'date'}
                ];

                const filtrosContainer = document.getElementById('filtros-container');
                const btnAdicionar = document.getElementById('adicionar-filtro');
                const btnLimpar = document.getElementById('limpar-filtros');
                const tabela = document.getElementById('tabelaAghu').querySelector('tbody');

                function criarFiltro(campoSelecionado = null, valor = '') {
                    const usados = Array.from(filtrosContainer.querySelectorAll('select')).map(sel => sel.value);
                    const campoDisponível = campoSelecionado || campos.find(c => !usados.includes(c.label));

                    if (!campoDisponivel) return;

                    const div = document.createElement('div');
                    div.className = 'filtro';

                    const select = document.createElement('select');
                    campos.forEach(campo => {
                        if (!usados.includes(campo.label) || campo.label === campoSelecionado?.label) {
                            const opt = document.createElement('option');

                            opt.value = campo.label;
                            opt.textContent = campo.label;

                            if (campoSelecionado && campo.label === campoSelecionado.label) {
                                opt.selected = true;
                            }
                            select.appendChild(opt);
                        }
                    });

                    const input = document.createElement('input');
                    input.type = campoSelecionado?.tipo || campoDisponivel.tipo;
                    input.value = valor || '';

                    const btnRemover = document.createElement('button');
                    btnRemover.textContent = '-';
                    btnRemover.onclick = () => {

                        div.remove();
                        aplicarFiltros();
                        salvarFiltros();
                    };

                    select.addEventListener('change', () => {
                        const campo = campos.find(c => c.label === select.value);
                        input.type = campo.tipo;
                        
                        aplicarFiltros();
                        salvarFiltros();
                    });

                    input.addEventListener('input', () => {
                        aplicarFiltros();
                        salvarFiltros();
                    });

                    div.appendChild(select);
                    div.appendChild(input);
                    div.appendChild(btnRemover);
                    filtrosContainer.appendChild(div);


                }

                function aplicarFiltros() {
                    const filtros = Array.from(filtrosContainer.children).map(div => {
                        const select = div.querySelector('select');
                        const input = div.querySelector('input');
                        
                        const campo = campos.find(c => c.label === select.value);
                        return {
                            coluna: campo.coluna,
                            valor: input.value.trim().toLowerCase(),
                            tipo: campo.tipo
                        };
                    });

                    Array.from(tabela.rows).forEach(linha=> {
                        let visivel = true;

                        filtros.forEach(filtro => {
                            const celula = linha.cells[filtro.coluna].textContent.trim().toLowerCase();
                            
                            if(!celula.includes(filtro.valor)) {
                                visivel = false;
                            }
                        });
                        linha.style.display = visivel ? '' : 'none';
                    });
                }

                function salvarFiltros() {
                    const filtros = Array.from(filtrosContainer.children).map(div => {
                        const select = div.querySelector('select');
                        const input = div.querySelector('input');
                        return{
                            label: select.value,
                            valor: input.value
                        };
                    });
                    localStorage.setItem('filtrosAghu', JSON.stringify(filtros));
                }

                function restaurarFiltros() {
                    const salvos = JSON.parse(localStorage.getItem('filtrosAghu') || '[]');
                    salvos.forEach(({ label, valor }) => {
                        const campo = campos.find(c => c.label === label);
                        if (campo) criarFiltro(campo, valor);
                    });

                    aplicarFiltros();
                }

                btnAdicionar.onclick = () => {
                    criarFiltro();
                    salvarFiltros();
                };

                btnLimpar.onclick = () => {
                    filtrosContainer.innerHTML = '';
                    aplicarFiltros();
                    localStorage.removeItem('filtrosAghu');
                };

                restaurarFiltros();
                if (filtrosContainer.children.length === 0) criarFiltro();
            }    
        </script>

    </body>
</html>