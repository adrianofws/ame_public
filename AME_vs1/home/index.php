
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Projeto Ame</title>
        <meta charset="UTF-8">
        <meta name="author" content="Adriano, Gabriel e Brunno">
        <meta name="description" content="lista de documentos">
        <meta name="keywords" content="leite materno, amamentação, doação de leite"> 
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    </head>
    <body>
        
        <div id="principal">
            
            <header class="hero">
                <img class="logotipo" src="imagens/logo_ame.jpg" alt="Logotipo ame">
                <nav class="buttons">
                    <ul>
                        <li><a class="login" href="#">Login</a></li>
                        <li><a class="conheca" href="#">Conheça</a></li>
                        <li><a class="duvidas" href="#">Dúvidas</a></li>
                        <li><a class="doe" href="#">Doe vida</a></li>
                        <li><a class="cadastro" href="#">Cadastro</a></li>
                        <li><a class="parceiros" href="#">Parceiros</a></li>
                        <li><a class="contato" href="contato/contato.html">Contato</a></li>
                    </ul>
                </nav>
                
                <div class="hero-content">
                    <h1>Doe esperança<br>doe vida<br>doe amor</h1>                
                </div>
                <div id="social-media-div">
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-youtube"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-reddit"></a>
                </div>
            </header>
            <main>
                <section class="content-section-cards">
                    <div class="card card-1">
                        <img src="imagens/doe.jpg" alt="">
                        <p><a href="#" class="comodoar">Como doar</a></p>
                    </div>
                    <div class="card card-2">
                        <img src="imagens/armazenar.jpg" alt="">
                        <p><a href="#" class="comodoar">Como armazenar</a></p>
                    </div>
                    <div class="card card-3">
                        <img src="imagens/fases.jpg" alt="">
                        <p><a href="#" class="comodoar">Saiba mais</a></p>
                    </div>
                </section>
                <section class="content-section">
                    <article>
                        <header>
                            <h2>
                                Como funciona exatamente a doação de leite humano?
                            </h2>
                        </header>
                        <p>A doação de leite humano passa pelo processo de coleta, processamento e distribuição do leite humano para bebês prematuros internados de 
                            baixo peso (menos de 2,5 kg) e com patologias, principalmente do trato gastrointestinal, e que não podem ser alimentados diretamente pelas 
                            próprias mães. As evidências científicas indicam que bebês prematuros e/ou com patologias que se alimentam de leite humano no período de 
                            privação da amamentação possuem mais chances de recuperação e de terem uma vida mais saudável. Com o leite materno, o bebê prematuro ganha 
                            peso mais rápido, se desenvolve com mais saúde e fica protegido de infecções.                       
                            Todo o leite doado é analisado, pasteurizado e submetido a um rigoroso controle de qualidade antes de ser ofertado a uma criança, conforme 
                            rege a legislação que regulamenta o funcionamento dos bancos de leite humano no Brasil, a RDC Nº 171. Após análises das suas características, 
                            o leite é distribuído de acordo com as necessidades específicas de cada recém-nascido internado.                            
                            O modelo brasileiro para Bancos de Leite Humano (BLH) é referência internacional e, desde 2005, o país exporta técnicas de baixo custo para 
                            implementar BLHs na América Latina, Caribe Hispânico, África, Península Ibérica e outros países.</p>

                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point 
                            of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', 
                            making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model 
                            text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, 
                            sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    </article>
                </section>
            </main>
            <footer>
                <p>
                    Copyright Ame &copy; 2020
                </p>
            </footer>
        </div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>

        $(document).ready(function() {

            $(".cadastro").click(function() {

                location.href = "./register/register.php";

            });

        });

    </script>

</html>