<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/imports/imports.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>

        <header class="register_header">
            <img class="logotipo" src="imagens/logo_ame.jpg" alt="Logotipo ame">
        </header>

        <section id="content">

            <form class="ui form">
                
                <h1 class="ui dividing header">Login Ame</h4>
                
                <div class="field">
                    <b>CPF</b>
                        <input type="text" id="nrCpf" placeholder="Digite o seu CPF">
                    </div>
                </div>

                <div class="field">
                    <b>Senha</b>
                        <input id="dsSenha" type="password" laceholder="Digite sua senha">
                    </div>
                </div>

                <div id="loader" class="ui segment">
                    <p></p>
                    <div class="ui active dimmer">
                        <div class="ui loader">
                        </div>
                    </div>
                </div>
                
                <button id="btnLogin" class="positive ui button">Login</button>
            
            </form>

            <div id="alerta" class="ui negative message">
                <i id="fechaAlerta" class="close icon" onclick="$('#alerta').hide();"></i>
                <div class="header">
                    Há algo de errado!
                </div>
                <p>CPF ou Senha estão incorretos.</p>
            </div>

        </section>
        
    </body>

    <script>

        $(document).ready(function() {
            init();
        });

        function init() {

            $('#loader').hide();
            $('#alerta').hide();
        
        }

        $("#btnLogin").click(function(event) {

            event.preventDefault();

            $('#loader').show();
            $('#btnLogin').hide();

            let data = new FormData();

            data.append("nrCpf", $("#nrCpf").val());
            data.append("dsSenha", $("#dsSenha").val());

            $.ajax({
                url: "./control/login.php",
                type: "POST",
                dataType: "json",
                data: data,
                processData: false,
                contentType: false
            }).done(function(result) {

                $('#loader').hide();
                $('#btnLogin').show();

                if(result.STATUS) {
                    location.href = "../../home/index.php";
                } else {
                    $('#alerta').show();
                }
                
            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        });

        

    </script>

</html>
