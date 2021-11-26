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

        <form action="/action_page.php">
            
        <div class="container">
            <h1>Cadastre-se e ajude a salvar vidas!</h1>
            <p>
            Doar leite materno humano é um gesto que salva vidas. O leite materno é importante para todos os bebês, principalmente para os que estão 
            internados e não podem ser amamentados pela própria mãe. Todos os anos aproximadamente 150 mil litros de leite materno humano são coletados, 
            processados e distribuídos aos recém-nascidos de baixo peso que estão internados em unidades neonatais de todo o Brasil.

            Um litro de leite materno doado pode alimentar até 10 recém-nascidos por dia. Dependendo do peso do prematuro, 1 ml já é o suficiente para 
            nutri-lo cada vez em que ele for alimentado. Os bebês que estão internados e não podem ser amamentados pelas próprias mães têm a chance de receber 
            os benefícios do leite materno com a sua doação. Com ele, a criança se desenvolve com saúde, tem mais chances de recuperação e fica protegida de 
            infecções, diarreias e alergias.
            </p>
            <hr>

                <label for="nmUsuario"><b>Nome</b></label>
                <input id="nmUsuario" type="text" placeholder="Digite seu Nome" name="nmUsuario" required>

                <label for="nmSobrenome"><b>Sobrenome</b></label>
                <input id="nmSobrenome" type="text" placeholder="Digite seu Sobrenome" name="nmSobrenome" required>

                <label for="nrCpf"><b>CPF</b></label>
                <input id="nrCpf" type="text" placeholder="Digite seu CPF" name="nrCpf" required>

                <label for="dtNascimento"><b>Data de nascimento</b></label>
                <input id="dtNascimento" type="text" placeholder="Digite a data do seu nascimento" name="dtNascimento" required>

                <label for="dsEndereco"><b>Endereço</b></label>
                <input id="dsEndereco" type="text" placeholder="Digite seu Endereço" name="dsEndereco" required>

                <label for="dsSenha"><b>Senha</b></label>
                <input id="dsSenha" type="text" placeholder="Digite seu Endereço" name="dsSenha" required>
            
            <hr>
            <p>Ao criar uma conta, você concorda com nossos <a href="#">Termos</a>.</p>

            <button class="btnCadastro" id="registerbtn">Cadastrar</button>
        </div>
    
        <div class="container signin">
            <p>Já possui uma conta ? <a href="#">Login</a>.</p>
        </div>

    </body>

    <script>

        $(document).ready(function() {

            let variavel = $('#dtNascimento');

            variavel.mask('99/99/9999');

            $(".btnCadastro").click(function(event) {

                event.preventDefault();

                // let data = new FormData();

                // data.append("nome", $("#nome").val());
                // data.append("sobrenome", $("#sobrenome").val());
                // data.append("identidade", $("#identidade").val());
                // data.append("cpf", $("#cpf").val());
                // data.append("dtNascimento", $("#dtNascimento").val());
                // data.append("endereco", $("#endereco").val());

                console.log("result: ", verificaData($("#dtNascimento").val()));

                // $.ajax({
                //     url: "./control/function/insertUser.php",
                //     type: "POST",
                //     dataType: "json",
                //     data: data,
                //     processData: false,
                //     contentType: false
                // }).done(function(result) {
                //     console.log(result);

                // }).fail(function(jqXHR, textStatus ) {
                //     console.log("Request failed: " + textStatus);

                // }).always(function() {
                //     console.log("completou");
                // });

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

        });

    </script>

</html>
