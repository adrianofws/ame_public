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

        #btnCadastrar {
            width: 100%;
        }

        #refLogin {
            margin: 10px 150px;
        }

    </style>

    <body>

        <section id="content">

            <form class="ui form">
                
                <h1 class="ui dividing header">Cadastre-se e ajude a salvar vidas!</h4>
                
                <div class="field">
                    <b>Nome</b>
                        <input type="text" id="nmUsuario" placeholder="Digite o seu nome">
                    </div>
                </div>

                <div class="field">
                    <b>Sobrenome</b>
                        <input id="nmSobrenome" type="text" placeholder="Digite o seu sobrenome">
                    </div>
                </div>

                <div class="field">
                    <b>CPF</b>
                        <input id="nrCpf" type="text" placeholder="Digite o seu CPF">
                    </div>
                </div>

                <div class="field">
                    <b>Data de Nascimento</b>
                        <input id="dtNascimento" type="text" placeholder="Digite a sua data de nascimento">
                    </div>
                </div>

                <div class="field">
                    <b>Endereço</b>
                        <input id="dsEndereco" type="text" placeholder="Digite o seu endereço">
                    </div>
                </div>

                <div class="field">
                    <b>Senha</b>
                        <input id="dsSenha" type="text" placeholder="Digite a sua senha">
                    </div>
                </div>

                <div class="field">
                    <b>Sobre Você</b>
                    <textarea id="dsDescricao"></textarea>
                </div>

                <div id="loader" class="ui segment">
                    <p></p>
                    <div class="ui active dimmer">
                        <div class="ui loader">
                        </div>
                    </div>
                </div>

                <button id="btnCadastrar" class="positive ui button">Cadastrar</button>
            
            </form>

            <div id="alertaVermelho" class="ui negative message">
                <i id="fechaAlertaVermelho" class="close icon" onclick="$('#alertaVermelho').hide();"></i>
                <div class="header">
                    Há algo de errado!
                </div>
                <p id="msgAlertVermelho">Nosso sistema não conseguiu efetuar o seu cadastro.</p>
            </div>

            <div id="alertaVerde" class="ui positive message">
                <i id="fechaAlertaVerde" class="close icon" onclick="$('#alertaVerde').hide();"></i>
                <div class="header">
                    Tudo ok!
                </div>
                <p>Agora você já está pronto para contribuir!</p>
            </div>

        </section>
        
    </body>

    <script>

        $(document).ready(function() {
            init();
        });

        function init() {

            $('#loader').hide();
            $('#alertaVermelho').hide();
            $('#alertaVerde').hide();

            let dtNascimento = $('#dtNascimento');
            dtNascimento.mask('99/99/9999');

        }

        $("#btnCadastrar").click(function(event) {

            event.preventDefault();

            $('#loader').show();
            $('#btnCadastrar').hide();

            let dtNascimento = $('#dtNascimento').val();

            let dataValida = verificaData(dtNascimento);

            if(!dataValida) {

                $('#loader').hide();
                $('#btnCadastrar').show();

                $('#msgAlertVermelho').html("Digite uma data de nascimento válida.");
                $('#alertaVermelho').show();

            }

            if(dataValida) {

                let data = new FormData();

                data.append("nmUsuario", $("#nmUsuario").val());
                data.append("nmSobrenome", $("#nmSobrenome").val());
                data.append("nrCpf", $("#nrCpf").val());
                data.append("dtNascimento", $("#dtNascimento").val());
                data.append("dsEndereco", $("#dsEndereco").val());
                data.append("dsSenha", $("#dsSenha").val());
                data.append("dsDescricao", $("#dsDescricao").val());

                $.ajax({
                    url: "./control/cadastrarUsuario.php",
                    type: "POST",
                    dataType: "json",
                    data: data,
                    processData: false,
                    contentType: false
                }).done(function(result) {

                    setTimeout(function() {

                        $('#loader').hide();
                        $('#btnCadastrar').show();

                        if(result.STATUS) {

                            $('#alertaVerde').show();
                            location.href = "../login/index.php";
                            
                        } else {

                            $('#msgAlertVermelho').html("Não foi possível efeturar o seu cadastro.");
                            $('#alertaVermelho').show();

                        }

                    }, 1000);


                }).fail(function(jqXHR, textStatus ) {
                    console.log("Request failed: " + textStatus);
                });
                
            } 

        });

        function verificaData(Data) {
        
            Data = Data.substring(0,10);

            var dma = -1;
            var data = Array(3);
            var ch = Data.charAt(0);
            for(i=0; i < Data.length && (( ch >= '0' &&
            ch <= '9' ) || ( ch == '/' && i != 0 ) ); ){
            data[++dma] = '';
            if(ch!='/' && i != 0) return false;
            if(i != 0 ) ch = Data.charAt(++i);
            if(ch=='0') ch = Data.charAt(++i);
            while( ch >= '0' && ch <= '9' ){
                data[dma] += ch;
                ch = Data.charAt(++i);
            }
            }
            if(ch!='') return false;
            if(data[0] == '' || isNaN(data[0]) || parseInt(data[0]) < 1) return false;
            if(data[1] == '' || isNaN(data[1]) || parseInt(data[1]) < 1 ||
            parseInt(data[1]) > 12) return false;
            if(data[2] == '' || isNaN(data[2]) || ((parseInt(data[2]) < 0 ||
            parseInt(data[2]) > 99 ) && (parseInt(data[2]) <
            1900 || parseInt(data[2]) > 9999))) return false;
            if(data[2] < 50) data[2] = parseInt(data[2]) + 2000;
            else if(data[2] < 100) data[2] = parseInt(data[2]) + 1900;
            switch(parseInt(data[1])){
            case 2: { if(((parseInt(data[2])%4!=0 ||
            (parseInt(data[2])%100==0 && parseInt(data[2])%400!=0))
            && parseInt(data[0]) > 28) || parseInt(data[0]) >
            29 ) return false; break; }
            case 4: case 6: case 9: case 11: { if(parseInt(data[0]) >
            30) return false; break;}
            default: { if(parseInt(data[0]) > 31) return false;}
            }
            return true;

        }

    </script>

</html>
