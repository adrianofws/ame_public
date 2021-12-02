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
            width: 30%;
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
                
                <div class="field">
                    <label>Estado</label>
                    <select class="ui fluid dropdown">
                        <option value="">Selecione seu estado</option>
                        <option value="1">Pernambuco</option>
                    </select>
                </div>
                
                <div class="two fields">
                    
                    <div class="field">
                        <label>Cidade</label>
                        <select class="ui fluid dropdown">
                            <option value="">Selecione sua cidade</option>
                            <option value="1">Paulista</option>
                        </select>
                    </div>

                    <div class="field">
                        <label>Bairro</label>
                        <select class="ui fluid dropdown">
                            <option value="">Selecione seu bairro</option>
                            <option value="1">Janga</option>
                        </select>
                    </div>
                    
                </div>

                <div class="field">
                    <label>Empresa</label>
                    <select id="idEmpresa" class="ui fluid dropdown">
                        <option value="">Selecione a empresa</option>
                        <option value="4">Hospital Ame</option>
                    </select>
                </div>

            </form>

        </section>

        <div class="divider"> </div>

        <section class="content">

            <div class="ui form">
                <div class="field">
                    <b>Sobre Você</b>
                    <textarea id="dsMotivoDoacao"></textarea>
                </div>
            </div>

            <div id="loader" class="ui segment">
                <p></p>
                <div class="ui active dimmer">
                    <div class="ui loader">
                    </div>
                </div>
            </div>
            
            <button id="btnCadastro" class="positive ui button">Cadastrar</button>

            <div id="alertaVermelho" class="ui negative message">
                <i id="fechaAlertaVermelho" class="close icon" onclick="$('#alertaVermelho').hide();"></i>
                <div class="header">
                    Há algo de errado!
                </div>
                <p>Seu cadastro não foi efetuado.</p>
            </div>

            <div id="alertaVerde" class="ui positive message">
                <i id="fechaAlertaVerde" class="close icon" onclick="$('#alertaVerde').hide();"></i>
                <div class="header">
                    Tudo ok!
                </div>
                <p>Seu cadastro foi efetuado!</p>
            </div>

        </section>
        
    </body>

    <script>

        $(document).ready(function() {
            init();
        });

        function init() {

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

        

    </script>

</html>
