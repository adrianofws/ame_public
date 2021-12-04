<?php

include_once(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/ame_public/AME_vs1/imports/imports.php');

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

        #content {
            margin: 0 auto;
            margin-top: 3%;
            width: 30%;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.04);
            border-radius: 5px;
        }

        #btnLogin {
            width: 100%;
        }

        #refLogin {
            margin: 10px 150px;
        }

    </style>

    <body>

        <section id="content">

            <h1>Ajude a salvar vidas!</h1>
            <p>
            Doar leite materno humano é um gesto que salva vidas. O leite materno é importante para todos os bebês, principalmente para os que estão 
            internados e não podem ser amamentados pela própria mãe. Todos os anos aproximadamente 150 mil litros de leite materno humano são coletados, 
            processados e distribuídos aos recém-nascidos de baixo peso que estão internados em unidades neonatais de todo o Brasil.

            Um litro de leite materno doado pode alimentar até 10 recém-nascidos por dia. Dependendo do peso do prematuro, 1 ml já é o suficiente para 
            nutri-lo cada vez em que ele for alimentado. Os bebês que estão internados e não podem ser amamentados pelas próprias mães têm a chance de receber 
            os benefícios do leite materno com a sua doação. Com ele, a criança se desenvolve com saúde, tem mais chances de recuperação e fica protegida de 
            infecções, diarreias e alergias.
            </p>

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

                <div>
                    <p id="refLogin" >Ainda não está cadastrado? <a href="../cadastro/index.php">Cadastre-se aqui!</a></p>
                </div>
            
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

                setTimeout(function() {

                    $('#loader').hide();
                    $('#btnLogin').show();

                    if(result.STATUS) {
                        location.href = "../../home/index.php?idUsuario="+window.btoa(result.ID_USUARIO_LOGADO);
                    } else {
                        $('#alerta').show();
                    }

                }, 1000);

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        });

        

    </script>

</html>
