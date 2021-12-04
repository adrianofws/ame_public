<?php
    include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/imports/imports.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image:linear-gradient( rgba(255,255,255,.95) 0%,rgba(255,255,255,.7) 500%), url(./imagens/ame_bg.jpg);
            background-attachment: fixed;
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }

        .row:hover {
            background-color: rgba(0, 0, 0, 0.04);
        }

        .row {
            cursor: pointer;
        }

        .content {
            margin: 0 auto;
            margin-top: 15px;
            width: 70%;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.04);
            border-radius: 5px;
        }

        #btnCadastro {
            width: 100%;
            margin-top: 10px;
        }

        #refLogin {
            margin: 10px 150px;
        }

    </style>

    <body>

        <section class="content">

            <h1>Realize aqui a sua doação!</h1>
            <p>
                Você pode usar esta funcionalidade para encontrar o colaborador mais próximo de sua casa para fazer doações.
            </p>

        </section>

        <div class="divider"> </div>

        <section class="content">

            <form class="ui form">
                
                <div class="two fields">
                    
                    <div class="field">
                        <label>Estado</label>
                        <select id="idEstado" class="ui fluid dropdown">
                            <option value="">Selecione seu estado</option>
                        </select>
                    </div>

                    <div class="field">
                        <label>Cidade</label>
                        <select id="idCidade" class="ui fluid dropdown">
                            <option value="">Selecione sua cidade</option>
                        </select>
                    </div>

                </div>
                
                <div class="two fields">
                    
                    <div class="field">
                        <label>Bairro</label>
                        <select id="idBairro" class="ui fluid dropdown">
                            <option value="">Selecione seu bairro</option>
                        </select>
                    </div>

                    <div class="field">
                        <label>Empresa</label>
                        <select id="idEmpresa" class="ui fluid dropdown">
                            <option value="">Selecione a empresa</option>
                        </select>
                    </div>
                    
                </div>

            </form>

        </section>

        <div class="divider"> </div>

        <section id="sectionAlertaVerde" class="content">
            <div id="alertaVerde" class="ui success message">
                <i class="close icon" onclick="$('#sectionAlertaVerde').css('display', 'none');"></i>
                <div class="header">
                    Sua doação foi concluída!
                </div>
                <p>Você acabou de deixar alguém muito feliz! :)</p>
            </div>
        </section>

        <div class="divider"> </div>
        
        <section class="content">

            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Endereço da Empresa</th>
                        <th>Nome do Beneficiado</th>
                        <th>Idade</th>
                    </tr>
                </thead>
                <tbody id="tbReceptores"></tbody>
            </table>

        </section>

        <div id="modal" style="background-color: white; padding: 15px; border-radius: 5px; height: 595px;" class="ui basic modal">

            <div id="dimmer" class="ui active dimmer">
                <div class="ui loader"></div>
            </div>

            <form class="ui form">

                <h2 id="empresaEndereco" class="ui dividing header"></h2>
                
                <div class="two fields">

                    <div class="field">
                        <label>Nome do Beneficiado</label>
                        <input type="text" id="nmReceptor" readonly>
                    </div>

                    <div class="field">
                        <label>Idade</label>
                        <input type="text" id="nrIdade" readonly>
                    </div>

                </div>

                <div class="field">
                    <label>Sobre o Beneficiado:</label>
                    <textarea id="dsMotivoDoacao" readonly></textarea>
                </div>

                <div class="field">
                    <label>O que será doado:</label>
                    <textarea id="dsDoacao"></textarea>
                </div>

                <div class="three fields">
                
                    <div class="field" style="width: 25%;">
                        <label>Data da Doação</label>
                        <input type="text" id="dtDoacao">
                    </div>

                    <div class="field" style="margin-top: 17px;">
                        <button id="btnDoacao" class="ui pink button">
                            Agendar Doação
                        </button>
                    </div>

                    <div class="field" style="margin-top: 17px; float: right; width: 41%;">
                        <button class="ui button" style="float: right;" onclick="fechaModal();">
                            Voltar
                        </button>
                    </div>
               
                </div>

            </form>
        
        </div>
        
    </body>

    <script>

        if(getUrlVar("idUsuario"))
            var idUsuario = window.atob(getUrlVar("idUsuario"));

        console.log("idUsuario ", idUsuario);

        $(document).ready(function() {
            init();
        });

        function init() {

            $("#dimmer").removeClass("active");

            let dtDoacao = $('#dtDoacao');
            dtDoacao.mask('99/99/9999');

            carregaEstados();

            $('#idEstado').change(function() {

                $('#idCidade').removeClass("disabled");

                let value = $(this).val();
                carregaCidades(value);
            
            });

            $('#idCidade').change(function() {

                $('#idBairro').removeClass("disabled");

                let value = $(this).val();
                carregaBairros(value);

            });

            $('#idBairro').change(function() {

                let idEstado = $('#idEstado').val();
                let idCidade = $('#idCidade').val();
                let idBairro = $('#idBairro').val();

                $('#idEmpresa').removeClass("disabled");

                carregaEmpresas(idEstado, idCidade, idBairro);

            });

            $('#idEmpresa').change(function() {

                let idEmpresa = $(this).val();
                carregaTabela(idEmpresa);

            });

            $('#idCidade').addClass("disabled");
            $('#idBairro').addClass("disabled");
            $('#idEmpresa').addClass("disabled");

            $('#loader').hide();
            $('#sectionAlertaVerde').css('display', 'none');
            $('#alertaVermelho').hide();
        
        }

        function getUrlVar(variavel) {
            
            let query = window.location.search.substring(1);
            let variaveis = query.split("&");
            let valor;
            
            for (let i = 0; i < variaveis.length; i++) {

                valor = variaveis[i].split("=");
                
                if (valor[0] == variavel) 
                    return valor[1];
            
            }
            
            return false;
        
        }

        function fechaModal() {
            event.preventDefault();
            $('.ui.basic.modal').modal('hide');
        }

        function carregaEstados() {

            $.ajax({
                url: "./control/carregaEstados.php",
                type: "POST",
                dataType: "json",
                processData: false,
                contentType: false
            }).done(function(result) {

                if(result.STATUS) {

                    let estados = result.RESULT;

                    estados.forEach((estado, indice) => {

                        $('#idEstado').append($("<option>", {
                            value: estado.idEstado,
                            text: estado.nmEstado
                        }));

                    });

                    $('#idEstado').dropdown('refersh');

                }

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        }

        function carregaCidades(idEstado) {

            let data = new FormData();

            data.append("idEstado", idEstado);

            $.ajax({
                url: "./control/carregaCidades.php",
                type: "POST",
                dataType: "json",
                data: data,
                processData: false,
                contentType: false
            }).done(function(result) {

                if(result.STATUS) {

                    let cidades = result.RESULT;

                    cidades.forEach((cidade, indice) => {

                        $('#idCidade').append($("<option>", {
                            value: cidade.idCidade,
                            text: cidade.nmCidade
                        }));

                    });

                    $('#idCidade').dropdown('refersh');

                }

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        }

        function carregaBairros(idCidade) {

            let data = new FormData();

            data.append("idCidade", idCidade);

            $.ajax({
                url: "./control/carregaBairros.php",
                type: "POST",
                dataType: "json",
                data: data,
                processData: false,
                contentType: false
            }).done(function(result) {

                if(result.STATUS) {

                    let bairros = result.RESULT;

                    bairros.forEach((bairro, indice) => {

                        $('#idBairro').append($("<option>", {
                            value: bairro.idBairro,
                            text: bairro.nmBairro
                        }));

                    });

                    $('#idBairro').dropdown('refersh');

                }

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        }

        function carregaEmpresas(idEstado, idCidade, idBairro) {

            let data = new FormData();

            data.append("idEstado", idEstado);
            data.append("idCidade", idCidade);
            data.append("idBairro", idBairro);

            $.ajax({
                url: "./control/carregaEmpresas.php",
                type: "POST",
                dataType: "json",
                data: data,
                processData: false,
                contentType: false
            }).done(function(result) {

                if(result.STATUS) {

                    let empresas = result.RESULT;

                    empresas.forEach((empresa, indice) => {

                        $('#idEmpresa').append($("<option>", {
                            value: empresa.idEmpresa,
                            text: empresa.nmEmpresa
                        }));

                    });

                    $('#idEmpresa').dropdown('refersh');

                }

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        }

        function carregaTabela(idEmpresa) {

            let data = new FormData();

            data.append("idEmpresa", idEmpresa);

            $.ajax({
                url: "./control/pesquisarReceptores.php",
                type: "POST",
                dataType: "json",
                data: data,
                processData: false,
                contentType: false
            }).done(function(result) {

                if(result.STATUS) {

                    let count = 1;
                    let dadosReceptores = result.RESULT;
                    let tabelaReceptores = $("#tbReceptores");

                    dadosReceptores.forEach((dados, indice) => {

                        let dtNascArray = dados.DT_NASCIMENTO.split("-");
                        let idade = calculaIdade(parseInt(dtNascArray[0]), parseInt(dtNascArray[1]), parseInt(dtNascArray[2]));
                        
                        let row = $("<tr class='row' onclick='modalDoacao("+dados.ID_RECEPTOR_EMPRESA+","+count+");'></tr>").appendTo(tabelaReceptores);

                        $('<td id="'+count+'_idReceptor" style="display: none" data-label="idReceptor"></td>').text(dados.ID_RECEPTOR).appendTo(row);
                        $('<td id="'+count+'_idEmpresa" style="display: none" data-label="idEmpresa"></td>').text(dados.ID_EMPRESA).appendTo(row);
                        $('<td id="'+count+'_dsMotivoDoacao" style="display: none" data-label="dsMotivoDoacao"></td>').text(dados.DS_MOTIVO_DOACAO).appendTo(row);
                        
                        $('<td id="'+count+'_nmEmpresa" data-label="nmEmpresa"></td>').text(dados.NM_EMPRESA).appendTo(row);
                        $('<td id="'+count+'_dsEndereco" data-label="dsEndereco"></td>').text(dados.DS_ENDERECO).appendTo(row);
                        $('<td id="'+count+'_nmReceptor" data-label="nmReceptor"></td>').text(dados.NM_RECEPTOR).appendTo(row);
                        $('<td id="'+count+'_nrIdade" data-label="nrIdade"></td>').text(idade).appendTo(row);
                        
                        count++;
                        
                    });

                }

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        }

        function modalDoacao(numero) {
            
            $('.ui.basic.modal').modal('show');
            
            $("#btnDoacao").click(function() {
                insereDoacao(numero);
            });

            let nmEmpresa = $("#"+numero+"_nmEmpresa").text();
            let dsEndereco = $("#"+numero+"_dsEndereco").text();
            let nmReceptor = $("#"+numero+"_nmReceptor").text();
            let nrIdade = $("#"+numero+"_nrIdade").text();
            let dsMotivoDoacao = $("#"+numero+"_dsMotivoDoacao").text();

            $("#empresaEndereco").text(nmEmpresa + " - " + dsEndereco);
            $("#nmReceptor").val(nmReceptor);
            $("#nrIdade").val(nrIdade);
            $("#dsMotivoDoacao").val(dsMotivoDoacao);

        }

        function insereDoacao(numero) {

            event.preventDefault();

            $("#dimmer").addClass("active");
            $("body").css("overflow", "hidden");

            let idDoador = idUsuario;
            let idReceptor = $("#"+numero+"_idReceptor").text();
            let idEmpresa = $("#"+numero+"_idEmpresa").text();
            
            let dtDoacaoArray = $("#dtDoacao").val().split("/");
            let dtDoacao = dtDoacaoArray[2] + "-" + dtDoacaoArray[1] +  "-" + dtDoacaoArray[0];

            let dsDoacao = $("#dsDoacao").val();

            let data = new FormData();

            data.append("idDoador", idDoador);
            data.append("idReceptor", idReceptor);
            data.append("idEmpresa", idEmpresa);
            data.append("dsDoacao", dsDoacao);
            data.append("dtDoacao", dtDoacao);

            $.ajax({
                url: "./control/inserirDoacao.php",
                type: "POST",
                dataType: "json",
                data: data,
                processData: false,
                contentType: false
            }).done(function(result) {

                setTimeout(function() {

                    $("#dimmer").removeClass("active");
                    $("body").css("overflow", "");

                    if(result.STATUS) {

                        $('.ui.basic.modal').modal('hide');
                        $('#sectionAlertaVerde').css('display', '');

                    } else {
                        console.log("deu ruim");
                    }

                }, 1000);

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        }

        function calculaIdade(ano, mes, dia) {
            var d = new Date,
                ano_atual = d.getFullYear(),
                mes_atual = d.getMonth() + 1,
                dia_atual = d.getDate(),

                ano = +ano,
                mes = +mes,
                dia = +dia,

                quantos_anos = ano_atual - ano;

            if (mes_atual < mes || mes_atual == mes && dia_atual < dia) {
                quantos_anos--;
            }

            return quantos_anos < 0 ? 0 : quantos_anos;
        }

    </script>

</html>
