<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Consultas AGHU</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
            <option value="6">Nome Paciente</option>
            <option value="7">Unidade Funcional</option>
            <option value="8">Especialidade</option>
            <option value="9">Equipe</option>
            <option value="10">Nome do Profissional</option>
            <option value="11">Telefone para Recado</option>
            <option value="12">Telefone para Contato</option>
        </select>
        
        <input type="text" id="filtroAghu" placeholder="Filtrar...">

        <table id="tabelaAghu" border="1">
            <thead>
                <tr>
                    <th>Número da Consulta</th>
                    <th>Data Marcação</th>
                    <th>Data Consulta</th>
                    <th>Dia da Semana</th>
                    <th>Número do Prontuário</th>
                    <th>Grade</th>
                    <th>Nome Paciente</th>
                    <th>Unidade Funcional</th>
                    <th>Especialidade</th>
                    <th>Equipe</th>
                    <th>Nome do Profisional</th>
                    <th>Telefone para Recado</th>
                    <th>Telefone para Contato</th>
                    <th>Observação</th>
                    <th>Complemento</th>
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
                        <td>
                            <span class="campo_observacao" data-id="{{ $consulta->id }}">{{ $consulta->observacao }}</span>
                            <button class="icone-btn editar" data-campo="observacao">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#007bff" viewBox="0 0 24 24">
                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1.003 1.003 0 000-1.41l-2.34-2.34a1.003 1.003 0 00-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                </svg>
                            </button>
                            <button class="icone-btn salvar" data-campo="observacao">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#28a745" viewBox="0 0 24 24">
                                    <path d="M17 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V7l-4-4zm-5 16a2 2 0 110-4 2 2 0 010 4zm2-10H5V5h9v4z"/>
                                </svg>
                            </button>
                        </td>
                        <td class="campo_complemento_e_botoes">
                            <div class="container_campo_complemento">
                                <span class="campo_complemento" data-id="{{ $consulta->id }}">{{ $consulta->complemento }}</span>
                                <div class="botoes_de_edicao">
                                    <button class="icone-btn editar" data-campo="complemento">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#007bff" viewBox="0 0 24 24">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1.003 1.003 0 000-1.41l-2.34-2.34a1.003 1.003 0 00-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                        </svg>
                                    </button>
                                    <button title="icone-btn salvar" data-campo="complemento">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#28a745" viewBox="0 0 24 24">
                                            <path d="M17 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V7l-4-4zm-5 16a2 2 0 110-4 2 2 0 010 4zm2-10H5V5h9v4z"/>
                                        </svg>
                                    </button>
                                </div>

                            </div>

                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>



            document.addEventListener("DOMContentLoaded", function () {
                
                //Pega o token CSRF do Blade

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                //Clique no botão editar
                document.querySelectorAll(".icone-btn.editar").forEach(botao => {
                    botao.addEventListener("click", function () {
                        const campo = this.getAttribute("data-campo");
                        const row = this.closest("tr");
                        //const span = this.parentElement.querySelector(`.campo_${campo}`);
                        const span = row.querySelector(`.campo_${campo}`);
                        //const salvarBtn = this.parentElement.querySelector(`.salvar[data-campo="${campo}"]`);

                        const salvarBtn = row.querySelector(`.icone-btn.salvar[data-campo="${campo}"]`);
                        const editarBtn = row.querySelector(`.icone-btn.editar[data-campo="${campo}"]`);

                        if (!span) return;


                        //Troca span por input
                        const valorAtual = (span.textContent || "").trim();
                        const input = document.createElement("input");
                        input.type = "text";
                        input.value = valorAtual;
                        input.dataset.id = span.dataset.id;
                        input.dataset.campo = campo;
                        input.className = `input_${campo}`

                        span.replaceWith(input);

                        //this.style.display="none";
                        //salvarBtn.style.display = "inline-block";

                        if(editarBtn) editarBtn.style.display = "none";
                        if (salvarBtn) salvarBtn.style.display = "inline-block";
                    });
                });

            //Clique no botão salvar
            document.querySelectorAll(".icone-btn.salvar").forEach(botao => {
                botao.addEventListener("click", function () {
                    const campo = this.getAttribute("data-campo");
                    const row = this.closest("tr");
                    //const input = this.parentElement.querySelector(`input[data-campo="${campo}"]`);
                    const input = row.querySelector(`input[data-campo="${campo}"]`);
                    //const id = input.dataset.id;
                    //const valor = input.value;
                    //const editarBtn = this.parentElement.querySelector(`.editar[data-campo="${campo}"]`);

                    const editarBtn = row.querySelector(`.icone-btn.editar[data-campo="${campo}"]`);
                    const salvarBtn = row.querySelector(`.icone-btn.salvar[data-campo="${campo}"]`);

                    if (!input) {
                        alert("Nada para salvar.");
                        return;
                    }

                    const id = input.dataset.id;
                    const valor = input.value;

                    fetch("{{ route('consultas.updateCampo') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": csrfToken
                        },
                        credentials:"same-origin", //
                        //body: JSON.stringify({ id: id, campo: campo, valor: valor })
                        body: JSON.stringify({ id, campo, valor })
                    })

                    .then(async (response) => {
                        if (!response.ok) {
                            const txt = await response.text();
                            throw new Error(`HTTP ${response.status}: ${txt.slice(0,200)}`);
                        }
                        return response.json();
                    })
                    //.then(response => response.json())
                    .then(data => {
                        if (data && data.success) {

                            //Troca input de volta por span atualizado

                            const span = document.createElement("span");
                            span.className = `campo_${campo}`;
                            span.dataset.id = id;
                            //span.textContent = data.valor;
                            span.textContent = data.valor ?? "";

                            input.replaceWith(span);

                            //this.style.display = "none";
                            //editarBtn.style.display = "inline-block";

                            if(salvarBtn) salvarBtn.style.display = "none";
                            if(editarBtn) editarBtn.style.display = "inline-block";
                        } else {
                            alert("Erro ao salvar!");
                            console.error("Resposta inesperada:", data);
                        }
                    })
                    .catch((err) => {
                        alert("Erro na requisição!");
                        console.error(err);
                    });
                });
            });

        });
        //    function aplicaFiltroDinamico(inputId, selectId, tabelaId) {
        //        const input = document.getElementById(inputId);
        //        const select = document.getElementById(selectId);
        //        
        //        input.addEventListener('keyup', function () {
//
        //            const filtro = input.value.toLowerCase();
        //            const colunaIndex = parseInt(select.value);
        //            const linhas = document.querySelectorAll(`#${tabelaId} tbody tr`); 
//
        //            linhas.forEach(function (linha) {
        //                const celula = linha.cells[colunaIndex];
        //                if (celula) {
        //                    const texto = celula.textContent.toLowerCase();
        //                    linha.style.display = texto.includes(filtro) ? '' : 'none';
        //                }
        //            });
        //        });
        //    }
//
        //    aplicaFiltroDinamico('filtroAghu', 'filtroAghu_2', 'tabelaAghu');

        </script>



    </body>
</html>