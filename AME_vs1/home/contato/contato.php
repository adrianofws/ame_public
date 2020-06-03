<!doctype html>
<html>
    <head>
        <title>Entre em contato</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/contato.css">      
          
    </head>
    
    <body>
        <header class="hero">
            <img class="logotipo" src="imagens/logo_ame.jpg" alt="Logotipo ame">
        </header>
        
        <div class="container">

            <h1>Entre em contato com a Ame</h1>

                <label for="nome"><b>Nome</b></label>
                <input id="nome" type="text" placeholder="Digite seu Nome" name="nome" required>

                <label for="sobrenome"><b>Sobrenome</b></label>
                <input id="sobrenome" type="text" placeholder="Digite seu Sobrenome" name="sobrenome" required>

                <label for="email"><b>e-mail</b></label>
                <input id="email" type="text" placeholder="Digite seu e-mail" name="email" required>
            
                <textarea id="msg" cols="70" rows="10" maxlength="500" placeholder="Digite sua mensagem"></textarea>
            
            <div id="restaContainer" style="display: none;">Restam <span id="resta"></span> caracteres</div>
            
            <div id="btn">
                <button type="submit" class="enviarbtn" id="enviarbtn">Enviar mensagem</button>
            </div>
            
            
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            
            (function(){
                'use strict';


                var $txtMsg = document.getElementById('msg');
                var $restaContainer = document.getElementById('restaContainer');
                var $resta = document.getElementById('resta');
                var maxima = $txtMsg.maxLength;
                
                function mostrarContainerResta(){
                    $restaContainer.style.display = 'block';
                }
                
                mostrarContainerResta();
                mostrarCaracteresRestantes(maxima);
                $txtMsg.addEventListener('input', checkLength);


                function checkLength(e){
                    var numeroLetrasDigitadas = this.value.length;
                    var caracteresRestantes = parseInt(maxima) - parseInt(numeroLetrasDigitadas);
                    mostrarCaracteresRestantes(caracteresRestantes);
                }
                
                function mostrarCaracteresRestantes(n){
                    $resta.textContent = n;
                }

            })()

            $(document).ready(function() {

                $("#registerbtn").click(function(event) {

                    event.preventDefault();

                    let data = new FormData();

                    data.append("nome", $('#nome').val());
                    data.append("sobrenome", $('#sobrenome').val());
                    data.append("email", $('#email').val());
                    data.append("msg", $('#msg').val());

                    $.ajax({
                        url: "./control/function/instertContactCall.php",
                        type: "POST",
                        dataType: "json",
                        data: data,
                        processData: false,
                        contentType: false
                    }).done(function(result) {
                        console.log("done!");
                    }).fail(function(jqXHR, textStatus ) {
                        console.log("Request failed: " + textStatus);
                    });

                });

            });
            
        </script>
        
    </body>
</html>