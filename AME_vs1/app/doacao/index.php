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

        .content {
            margin: 0 auto;
            margin-top: 15px;
            width: 50%;
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

            <h1>Você também pode ser ajudado!</h1>
            <p>
                Você pode usar esta funcionalidade para encontrar um dos nosso colaboradores mais próximos de sua casa!
                Conte-nos sobre você, cadastre-se e receba doações.
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
                            <option value="1">Janga</option>
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

        <section class="content">

            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Endereço da Empresa</th>
                        <th>Nome do Receptor</th>
                        <th>Idade</th>
                    </tr>
                </thead>
                <tbody id="tbReceptores">
                    <!-- <tr>
                        <td data-label="nmEmpresa">Hospital Ame</td>
                        <td data-label="dsEndereco">Avenida Boa Vista</td>
                        <td data-label="nmReceptor">Gabriel Ewerton</td>
                        <td data-label="nrIdade">22</td>
                    </tr> -->
                </tbody>
            </table>

        </section>
        
    </body>

    <script>

        $(document).ready(function() {
            init();
        });

        function init() {

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
            $('#alertaVerde').hide();
            $('#alertaVermelho').hide();
        
        }

        $("#btnCadastro").click(function(event) {

            event.preventDefault();

            $('#loader').show();
            $('#btnCadastro').hide();

            let data = new FormData();

            data.append("idEmpresa", $("#idEmpresa").val());
            data.append("dsMotivoDoacao", $("#dsMotivoDoacao").val());

            $.ajax({
                url: "./control/receberDoacao.php",
                type: "POST",
                dataType: "json",
                data: data,
                processData: false,
                contentType: false
            }).done(function(result) {

                setTimeout(function() {

                    $('#loader').hide();
                    $('#btnCadastro').show();

                    if(result.STATUS) {
                        $('#alertaVerde').show();
                        location.href = "../../home/index.php";
                    } else {
                        $('#alertaVermelho').show();
                    }

                }, 1000);

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        });

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

        function carregaBairros($idCidade) {

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
                    
                        let row = $('<tr></tr>').appendTo(tabelaReceptores);

                        $('<td id="'+count+'_idReceptor" style="display: none" data-label="idReceptor"></td>').text(dados.ID_RECEPTOR).appendTo(row);
                        $('<td id="'+count+'_nmEmpresa" data-label="nmEmpresa"></td>').text(dados.NM_EMPRESA).appendTo(row);
                        $('<td id="'+count+'_dsEndereco" data-label="dsEndereco"></td>').text(dados.DS_ENDERECO).appendTo(row);
                        $('<td id="'+count+'_nmReceptor" data-label="nmReceptor"></td>').text(dados.NM_RECEPTOR).appendTo(row);
                        $('<td id="'+count+'_nrIdade" data-label="nrIdade"></td>').text(22).appendTo(row);
                        
                        count++;
                        
                    });

                }

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        }

    </script>

</html>
