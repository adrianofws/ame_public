<?php 
    session_start();
?>

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
        
        <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.min.css">
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous">
        </script>
        <script src="../semantic/dist/semantic.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    </head>
    
    <body>

    <div id="dimmer" class="ui active dimmer">
        <div class="ui text loader">Carregando...</div>
    </div>
        
        <div id="principal">
            
            <header class="hero">
                <img class="logotipo" src="imagens/logo_ame.jpg" alt="Logotipo ame">
                <nav class="buttons">
                    <ul>
                        <li id="login"><a class="login" href="../app/login/index.php">login</a></li>
                        <li id="cadastro" style="cursor: pointer;"><a class="cadastro" href="../app/cadastro/index.php">cadastro</a></li>
                        <li id="doe" style="cursor: pointer;" onclick="abrirDoe()"><a class="doe">Doe vida</a></li>
                        <li id="receberDoacao" style="cursor: pointer;" onclick="abrirReceberDoacao()"><a class="conheca">receba doações</a></li>
                        <li id="cadastros" style="cursor: pointer;" onclick="exibirModal1()"> <a class="contato">Doções Recebidas</a></li>
                        <li id="empresas" style="cursor: pointer;" onclick="exibirModal2()"> <a class="empresas">Empresas Cadastradas</a></li>
                        <li id="deslogar" onclick="deslogar()"><a class="duvidas" href="#duvidas">Sair</a></li>
                    </ul>
                </nav>
                
                <div class="hero-content">
                    <h1>Doe esperança<br>doe vida<br>doe amor</h1>
                </div>
                
            </header>
            <main>
                <section class="content-section-cards">
                    <div class="card card-1">
                        <img src="imagens/doe.jpg" alt="">
                        <p><a href="#comodoar" class="ame-cards">Como doar</a></p>
                    </div>
                    <div class="card card-2">
                        <img src="imagens/armazenar.jpg" alt="">
                        <p><a href="#comoarmazenar" class="ame-cards">Como armazenar</a></p>
                    </div>
                    <div class="card card-3">
                        <img src="imagens/mito_verdade.png" alt="">
                        <p><a href="#mitoseverdades" class="ame-cards">Mitos e verdades</a></p>
                    </div>
                </section>
                <section class="content-section">
                    <article id="conheca">
                        <header>
                            <h2>
                                Conheça
                            </h2>
                            <h3>Como funciona exatamente a doação de leite materno?</h3>
                        </header>
                        <img src="imagens/bebe1.png" class="img-bebe1" alt="bebe1">
                        <p>A doação de leite humano passa pelo processo de coleta, processamento e distribuição do leite humano para bebês prematuros internados de 
                            baixo peso (menos de 2,5 kg) e com patologias, principalmente do trato gastrointestinal, e que não podem ser alimentados diretamente pelas 
                            próprias mães. As evidências científicas indicam que bebês prematuros e/ou com patologias que se alimentam de leite humano no período de 
                            privação da amamentação possuem mais chances de recuperação e de terem uma vida mais saudável. Com o leite materno, o bebê prematuro ganha 
                            peso mais rápido, se desenvolve com mais saúde e fica protegido de infecções.</p>
                            
                        <p>Todo o leite doado é analisado, pasteurizado e submetido a um rigoroso controle de qualidade antes de ser ofertado a uma criança, conforme 
                            rege a legislação que regulamenta o funcionamento dos bancos de leite humano no Brasil, a RDC Nº 171. Após análises das suas características, 
                            o leite é distribuído de acordo com as necessidades específicas de cada recém-nascido internado.                            
                            O modelo brasileiro para Bancos de Leite Humano (BLH) é referência internacional e, desde 2005, o país exporta técnicas de baixo custo para 
                            implementar BLHs na América Latina, Caribe Hispânico, África, Península Ibérica e outros países.
                        </p><br>
                        
                        <h3>Quais são os benefícios do leite materno?</h3>
                        
                        <img src="imagens/bebe2.png" class="img-bebe2" alt="bebe2">
                        <p>A doação de leite humano passa pelo processo de coleta, processamento e distribuição do leite humano para bebês prematuros internados de 
                            baixo peso (menos de 2,5 kg) e com patologias, principalmente do trato gastrointestinal, e que não podem ser alimentados diretamente pelas 
                            próprias mães. As evidências científicas indicam que bebês prematuros e/ou com patologias que se alimentam de leite humano no período de 
                            privação da amamentação possuem mais chances de recuperação e de terem uma vida mais saudável. Com o leite materno, o bebê prematuro ganha 
                            peso mais rápido, se desenvolve com mais saúde e fica protegido de infecções.</p>
                            
                        <p>Todo o leite doado é analisado, pasteurizado e submetido a um rigoroso controle de qualidade antes de ser ofertado a uma criança, conforme 
                            rege a legislação que regulamenta o funcionamento dos bancos de leite humano no Brasil, a RDC Nº 171. Após análises das suas características, 
                            o leite é distribuído de acordo com as necessidades específicas de cada recém-nascido internado.                            
                            O modelo brasileiro para Bancos de Leite Humano (BLH) é referência internacional e, desde 2005, o país exporta técnicas de baixo custo para 
                            implementar BLHs na América Latina, Caribe Hispânico, África, Península Ibérica e outros países. 
                        </p><br>

                        <h3>Quem pode doar leite materno?</h3>
                        <p>
                        Toda mulher que amamenta é uma possível doadora de leite humano. Para doar, basta ser saudável e não tomar nenhum medicamento que interfira na amamentação.
                        Se este for o seu caso, entre em contato com o banco de leite mais próximo de sua casa ou ligue ao 136 para obter maiores informações de como e quando doar.
                        Os bancos de leite humano têm entre seus objetivos a promoção, proteção e apoio ao aleitamento materno. Neste sentido, desenvolvem trabalho para auxiliar as 
                        mulheres-mães no período da amamentação, tendo profissionais qualificados para também orientar sobre a saúde da criança.
                        </p>
                    </article>

                </section>
                <section class="content-section">
                    <!--<article id="duvidas">
                    <header>
                            <h2>
                                Dúvidas
                            </h2>
                        </header>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point 
                            of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', 
                            making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model 
                            text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, 
                            sometimes by accident, sometimes on purpose (injected humour and the like).
                        </p>
                    </article>-->
                            
                </section>
                <section class="content-section">
                    <article id="parceiros">
                    <header>
                            <h2>
                                Parceiros
                            </h2>
                        </header>
                            <p>O Brasil possui a maior e mais complexa Rede de Bancos de Leite Humano (rBLH) do mundo, segundo a Organização Mundial da Saúde (OMS), e é modelo para a 
                                cooperação internacional em mais de 20 países das Américas, Europa e África, estabelecida por meio da Agência Brasileira de Cooperação (ABC).O Ministério 
                                da Saúde e a Fundação Oswaldo Cruz criaram a Rede Brasileira de Bancos de Leite Humano (rBLH-BR) em 1998 com a missão de promover, proteger e apoiar o aleitamento 
                                materno, coletar e distribuir leite humano com qualidade certificada e contribuir para a diminuição da mortalidade infantil. Parte da Política Nacional de 
                                Aleitamento Materno, a rBLH é uma ação estratégica. Além de coletar, processar e distribuir leite humano a bebês prematuros e de baixo peso, os Bancos de 
                                Leite Humano (BLHs) realizam atendimento de orientação e apoio à amamentação. Atualmente, a Rede possui mais de 225 Bancos de Leite Humano distribuídos em 
                                todos os estados do território nacional, alguns com coleta domiciliar.  A rBLH-BR conta ainda com mais de 212 Postos de Coleta (PCs) de leite humano. Todos os 
                                estados e o Distrito Federal têm pelo menos 1 banco de leite, o que dá uma média de 45 bancos de leite por região do país. O modelo brasileiro alinha baixo 
                                custo e alta tecnologia. A tecnologia da Rede Brasileira de Banco de Leite Humano - RBLH é exportada para 22 países da América Latina, Caribe, Península Ibérica 
                                e alguns países da Europa. RBLH: promoção, proteção e apoio ao aleitamento materno até os dois anos de vida, sendo de forma exclusiva até os seis meses de idade
                                O modelo brasileiro é reconhecido mundialmente pelo desenvolvimento tecnológico inédito, que alia baixo custo à alta qualidade, além de distribuir o leite humano 
                                conforme as necessidades específicas de cada bebê, aumentando a eficácia da iniciativa para a redução da mortalidade neonatal.
                            </p><br>
                            <h3>Encontre um parceiro na sua região</h3><br>
                    </article>
                    <section class="content-section-cards1">
                        <div class="card1 card1-1">
                            <img src="imagens/norte.png" alt="">
                            <p><a href="#" class="ame-cards1">Norte</a></p>
                        </div>
                        <div class="card1 card1-2">
                            <img src="imagens/nordeste.png" alt="">
                            <p><a href="#" class="ame-cards1">Nordeste</a></p>
                        </div>
                        <div class="card1 card1-3">
                            <img src="imagens/centrooeste.png" alt="">
                            <p><a href="#" class="ame-cards1">Centro-Oeste</a></p>
                        </div>
                        <div class="card1 card1-4">
                            <img src="imagens/sudeste.png" alt="">
                            <p><a href="#" class="ame-cards1">Sudeste</a></p>
                        </div>
                        <div class="card1 card1-5">
                            <img src="imagens/sul.png" alt="">
                            <p><a href="#" class="ame-cards1">Sul</a></p>
                        </div>
                    </section> 
                </section>
                <section class="content-section">
                    <article id="comodoar">
                    <header>
                            <h2>
                                Como doar leite materno?
                            </h2>
                        </header>
                            <h3>Para doar leite materno, é só seguir este passo a passo:</h3>
                            <h4>Preparo do frasco para guardar o leite materno:</h4>
                                <ul>
                                    <li>Lave um frasco de vidro de boca larga com tampa de plástico (do tipo café solúvel), retirando o rótulo e o papel de dentro da tampa.</li>
                                    <li>Coloque o frasco e a tampa em uma panela, cobrindo-os com água</li>
                                    <li>Ferva-os por 15 minutos, contando o tempo a partir do início da fervura</li>
                                    <li>Escorra-os, com a abertura voltada para baixo, sobre um pano limpo até secar</li>
                                    <li>Feche o frasco sem tocar com a mão na parte interna da tampa</li>
                                    <li>O ideal é deixar vários frascos preparados</li>
                                </ul>
                            <h4>Higiene pessoal antes de iniciar a coleta do leite materno:</h4>
                                <ul>
                                    <li>Use uma touca ou um lenço para cobrir os cabelos</li>
                                    <li>Coloque uma fralda de pano ou uma máscara sobre o nariz e a boca</li>
                                    <li>Lave as mãos e os braços até o cotovelo com bastante água e sabão</li>
                                    <li>Lave as mamas apenas com água</li>
                                    <li>Seque as mãos e as mamas com toalha limpa</li>
                                </ul>
                            <h4>Local adequado para retirar o leite materno:</h4>
                                <ul>
                                    <li>Escolha um lugar confortável, limpo e tranquilo</li>
                                    <li>Forre uma mesa com pano limpo para colocar o frasco e a tamp</li>
                                    <li>Evite conversar durante a retirada do leite</li>
                                </ul>
                            <h4>Saiba como retirar o leite das mamas:</h4>
                                <ul>
                                    <li>Massageie as mamas com a ponta dos dedos, fazendo movimentos circulares no sentido da parte escura (aréola) para o corpo</li>
                                    <li>Coloque o polegar acima da linha em que acaba a aréola.</li>
                                    <li>Coloque os dedos indicador e médio abaixo da aréola.</li>
                                    <li>Firme os dedos e empurre para trás em direção ao corpo.</li>
                                    <li>Aperte o polegar contra os outros dedos até sair o leite.</li>
                                    <li>Despreze os primeiros jatos ou gotas.</li>
                                    <li>Em seguida, abra o frasco e coloque a tampa sobre a mesa, forrada com um pano limpo, com a abertura para cima.</li>
                                    <li>Colha o leite no frasco, colocando-o debaixo da aréola.</li>
                                    <li>Após terminar a coleta, feche bem o frasco</li>
                                </ul>
                    </article>
                </section>
                <section class="content-section">
                    <article id="comoarmazenar">
                        <header>
                            <h2>
                                Como armazenar?
                            </h2>
                        </header>
                            <h3>Como guardar o leite materno coletado?</h3>
                                <ul>
                                    <li>Anote na tampa a data e a hora em que realizou a primeira coleta do leite e guarde imediatamente no freezer ou no congelador o frasco fechado.</li>
                                    <li>Se o frasco não ficou cheio, você pode completá-lo em outro momento.</li>
                                    <li>Para completar o volume de leite no frasco já congelado, utilize um copo de vidro previamente fervido por 15 minutos. Após a fervura, escorra-o, 
                                        com a abertura voltada para baixo, sobre um pano limpo até secar.</li>
                                    <li>Coloque o leite recém-extraído sobre o que já estava congelado até faltarem dois dedos para encher o frasco.</li>
                                    <li>Guarde imediatamente o frasco no freezer ou no congelador.</li>
                                    <li>Após a extração em que o frasco de vidro esteja completo, a mãe deve ligar para o banco de leite humano. Se em 10 dias após congelar o primeiro 
                                        leite, o frasco não estiver completo, a mãe poderá ligar para o banco de leite humano e fazer a doação, pois qualquer quantidade é importante.</li>
                                </ul>
                            <h3>Como conservar o leite materno coletado?</h3>
                            <h4>O leite humano extraído para doação pode ficar no freezer ou no congelador da geladeira por até 10 dias. Nesse período, deverá ser transportado ao banco de leite humano.</h4>
                                <ul>
                                    <li>A produção do leite depende do esvaziamento da mama, por isso, quanto mais a mulher amamenta ou esvazia as mamas, mais leite ela produz.</li>
                                    <li>Todo leite doado é analisado, pasteurizado e submetido a rigoroso controle de qualidade antes de ser ofertado a uma criança.</li>
                                    <li>Todo leite descongelado não deve ser congelado novamente.</li>
                                    <li>1 litro de leite materno doado pode alimentar até 10 recém-nascidos por dia. Dependendo do peso do prematuro, 1 ml já é o suficiente para nutri-lo 
                                        cada vez em que ele for alimentado.</li>
                                    <li>Bebês que estão internados e não podem ser amamentados pelas próprias mães têm a chance de receber os benefícios do leite materno com a sua doação. 
                                        Com ele, a criança se desenvolve com saúde, tem mais chances de recuperação e fica protegida de infecções, diarreias e alergias.</li>
                                </ul>
                    </article>
                </section>
                <section class="content-section">
                    <article id="mitoseverdades">
                        <header>
                            <h2>
                                Mitos e verdades sobre a doação de leite materno
                            </h2>
                        </header>
                            <h3>Existe leite fraco?</h3>
                            <p><strong id="mito">MITO</strong>. Não existe leite fraco. Até uma mãe com desnutrição leve ou moderada é capaz de produzir um bom leite. Todos têm a mesma constituição. 
                                O que acontece é que o leite materno é mais ralo que o leite de vaca. Mas, lembre-se: o leite de vaca foi feito para o bezerro! Cada espécie 
                                se alimenta com o leite produzido pela sua mãe. O leite materno tem todas as substâncias na quantidade certa de que o bebê precisa para crescer 
                                e se desenvolver sadio. O leite do início da mamada é mais “ralo”, pois contém mais água, menos gordura e grande quantidade de fatores de defesa. 
                                Contém também mais vitaminas e sais minerais. O leite do fim da mamada é mais grosso, visto que tem mais gordura e engorda o bebê. O bebê precisa 
                                do leite do começo e do fim da mamada</p>
                            <h3>Só o meu leite não sustenta e o bebê chora com fome.</h3>
                            <p><strong id="mito">MITO</strong>. Nem sempre que o bebê chora é porque está com fome. Ele pode estar com cólica, frio ou calor, molhado, ou simplesmente querendo carinho (colo). 
                                Lembre-se de que o choro é a única forma de o bebê se comunicar nos primeiros meses de vida. O importante é que ele esteja crescendo bem, o que pode 
                                ser verificado pelos gráficos na Caderneta da Criança, e urinando mais do que seis vezes a cada 24 horas
                            </p>
                            <p>
                            <h3>Criança que nasceu prematura (antes do tempo) ou com baixo peso (menos de 2 quilos e meio) não deve mamar no peito.</h3>
                            <p><strong id="mito">MITO</strong>. Estes bebês podem ter dificuldades de sugar no início, mas são os que mais precisam da proteção do leite materno. Conforme eles crescem, sugam com 
                                maior facilidade. Se o bebê tiver dificuldade de sugar, retire o leite, coloque-o em um recipiente limpo e ofereça com colher ou na xícara de café/copinho
                            </p>
                            <h3>Dar de mamar faz os peitos caírem.</h3>
                            <p><strong id="mito">MITO</strong>. A queda do peito depende de vários fatores: hereditários, idade, aumento de peso, musculatura de sustentação das mamas. A própria gravidez causa 
                                mudança na sua forma e posição
                            </p>
                            <h3>A amamentação imediatamente após o parto é saudável.</h3>
                            <p><strong id="verdade">VERDADE</strong>. Alimentar os bebês imediatamente após o nascimento pode reduzir consideravelmente os riscos de mortalidade neonatal, 
                                além de contribuir para a recuperação da mulher. Quanto mais cedo acontecer a primeira mamada, maiores as chances de uma amamentação bem-sucedida, além de 
                                estimular e fortalecer o vínculo mãe e bebê
                            </p>
                            <h3>Seios pequenos produzem menos leite.</h3>
                            <p><strong id="mito">MITO</strong>. O que dá o tamanho dos seios é o tecido gorduroso e não a glândula produtora de leite, portanto, não depende do tamanho ou formato da mama. 
                                Afinal, tamanho não é documento!
                            </p>
                            <h3>Criança que arrota mamando faz o peito inflamar ou o leite secar.</h3>
                            <p><strong id="mito">MITO</strong>. Não há comprovação científica desta afirmação
                            </p>
                            <h3>Cerveja preta, canjica, água inglesa e outros alimentos aumentam a produção de leite.</h3>
                            <p><strong id="mito">MITO</strong>. É verdade que a cerveja aumenta a quantidade de leite por ser líquido, assim como a água e o suco. Mas bebidas alcoólicas não devem ser ingeridas, 
                                pois o álcool passa rapidamente para o leite e pode ser muito prejudicial ao bebê

                            </p>
                            <h3>A mulher que estiver amamentando pode ingerir bebidas ácidas como suco de laranja ou limão.</h3>
                            <p><strong id="verdade">VERDADE</strong>. Os alimentos ácidos não talham o leite. Não é necessário tomar mais leite de vaca para produzir mais leite. Recomenda-se que a mãe beba 
                                bastante água todos os dias. Café, chá preto e refrigerante em grande quantidade podem provocar cólicas no bebê
                             </p>

                             <h3>As mães que têm anemia podem amamentar.</h3>
                             <p><strong id="verdade">VERDADE</strong>. Mas devem procurar um tratamento. O médico poderá receitar a medicação adequada, orientar a dieta e a mãe continuar amamentando.
                             </p>
                             <h3>A amamentação ajuda a mulher a emagrecer.</h3>
                             <p><strong id="verdade">VERDADE</strong>. O aleitamento traz vários benefícios, além da perda de peso mais rápida após o parto, a amamentação ajuda o útero a recuperar seu tamanho 
                                normal, reduz o risco de hemorragia, anemia e câncer de mama e de ovário. Durante a gestação, a mulher acumula peso para formar uma reserva energética justamente para ser gasta no 
                                período da amamentação. Saiba que parte da gordura materna é transferida para o bebê pelo leite
                             </p>
                             <h3>O leite materno pode ser congelado.</h3>
                             <p><strong id="verdade">VERDADE</strong>. Na geladeira, o leite materno deve ser armazenado até 12 horas. No freezer, pode durar até 15 dias. Essa é uma boa notícia para as mães que 
                             precisam retornar às suas atividades profissionais, sem recorrer ao leite industrializado. Para descongelar, o leite deve ser mantido na geladeira ou em água corrente morna. Não se deve deixar em temperatura 
                                ambiente e nem esquentá-lo no fogão ou microondas
                             </p>
                             <h3>O tempo de amamentação depende de cada criança.</h3>
                             <p><strong id="verdade">VERDADE</strong>. Alguns bebês são rápidos e levam de 5 a 10 minutos para mamar. Outros, não têm pressa e levam até 40 minutos. A mãe deve continuar amamentando até o bebê perder o interesse, 
                                pois é ele quem vai determinar o tempo suficiente. A mãe deve buscar a melhor posição, seja sentada, em pé, deitada, e oferecer o seio à criança. Deve promover uma boa ‘pega’, com a 
                                criança abocanhando a maior parte possível da aréola, para evitar fissuras

                             </p>
                             <h3>Simpatias e crendices podem alterar o leite.</h3>
                             <p><strong id="mito">MITO</strong>. A maioria das simpatias ou crendices não alteram o leite. Por exemplo: o bebê arrotar no peito, o leite pingar no chão, beber água durante a amamentação, nada disso altera a 
                                quantidade e a qualidade do leite
                             </p>
                             <h3>Amamentar deixa os seios flácidos.</h3>
                             <p><strong id="mito">MITO</strong>. Amamentar não deixa os seios flácidos, a não ser que não haja cuidados básicos. A indicação é usar um sutiã de alças largas 
                                e que sustente as mamas
                             </p>
                             <h3>Mãe que está amamentando não pode trabalhar fora.</h3>
                             <p><strong id="mito">MITO</strong>. A mãe pode dar de mamar nos períodos em que estiver em casa. Pode retirar e guardar seu leite para ser oferecido ao bebê 
                                enquanto ela estiver fora
                             </p>
                             <h3>É preciso passar hidratantes ou pomadas medicinais para proteger o bico do peito.</h3>
                             <p><strong id="mito">MITO</strong>. O uso de hidratantes afina o tecido do bico do peito e da aréola (rodela escura do peito). A mãe deverá espremer um pouco de leite e passar ao redor 
                                da aréola e bico antes e depois de cada mamada, para eliminar bactérias, umedecer e manter a elasticidade e hidratação da pele, evitando assim a ocorrência de rachaduras (fissuras)

                             </p>
                             <h3>O bebê é quem faz o horário de amamentação.</h3>
                             <p><strong id="mito">MITO</strong>. Nos primeiros meses, o bebê ainda não tem um horário para mamar. Dê o peito ao seu filho sempre que ele demonstrar fome. Com o tempo, ele vai fazer seu horário de mamadas. 
                                Antes de começar a dar de mamar, lave as mãos. Sente-se em um local confortável e o ajude a pegar corretamente o peito. Após a mamada, passe o próprio leite no complexo mamilo 
                                areolar, antes e após a mamada
                             </p>
                             <h3>Existe uma posição ideal para amamentar.</h3>
                             <p><strong id="mito">MITO</strong>. A melhor posição é aquela mais confortável para a mãe e o seu bebê
                             </p>
    
                    </article>
                </section>

            </main>

            <footer style="padding: 10px;">
                <p>
                    Copyright Ame &copy; 2020
                </p>
            </footer>
        </div>

        <div id="modalDoacoes" style="background-color: white; padding: 15px; border-radius: 5px;" class="ui basic modal">

            <form class="ui form">
                
                <h1 class="ui dividing header">Doações Recebidas</h1>

                <table class="ui celled table">
                    <thead>
                        <tr>
                            <th>Nome do doador</th>
                            <th>O que foi doado</th>
                            <th>Empresa</th>
                            <th>Endereço da Empresa</th>
                        </tr>
                    </thead>
                    <tbody id="tbDoacoes"></tbody>
                </table>

                <button class="ui button" style="float: right;" onclick="fechaModal1();">
                    Voltar
                </button>

            </form>
        
        </div>

        <div id="modalEmpresas" style="background-color: white; padding: 15px; border-radius: 5px;" class="ui basic modal">

            <form class="ui form">
                
                <h1 class="ui dividing header">Empresas Cadastradas</h1>

                <table class="ui celled table">
                    <thead>
                        <tr>
                            <th>Nome da Empresa</th>
                            <th>Endereço</th>
                        </tr>
                    </thead>
                    <tbody id="tbEmpresas"></tbody>
                </table>

                <button class="ui button" style="float: right;" onclick="fechaModal2();">
                    Voltar
                </button>

            </form>
        
        </div>

    </body>

    <script>

        if(getUrlVar("idUsuario"))
            var idUsuario = window.atob(getUrlVar("idUsuario"));

        $(document).ready(function() {

            console.log("idUsuario: ", idUsuario);

            $("#modalDoacoes").hide();
            $("#dimmer").removeClass("active");

            $("#doe").hide();
            $("#receberDoacao").hide();
            $("#empresas").hide();
            $("#cadastros").hide();
            $("#deslogar").hide();

            if(idUsuario) {
                $("#doe").show();
                $("#receberDoacao").show();
                $("#empresas").show();
                $("#cadastros").show();
                $("#deslogar").show();
            }

        });

        function carregaTabela1(idUsuario) {

            let data = new FormData();

            data.append("idUsuario", idUsuario);

            $.ajax({
                url: "./control/pesquisarDoacoes.php",
                type: "POST",
                dataType: "json",
                data: data,
                processData: false,
                contentType: false
            }).done(function(result) {

                if(result.STATUS) {

                    let count = 1;
                    let doacoes = result.RESULT;
                    let tabelaDoacoes = $("#tbDoacoes");

                    doacoes.forEach((dados, indice) => {

                        let row = $("<tr class='row'></tr>").appendTo(tabelaDoacoes);

                        $('<td data-label="nmDoador"></td>').text(dados.NM_DOADOR).appendTo(row);
                        $('<td data-label="dsDoacao"></td>').text(dados.DS_DOACAO).appendTo(row);
                        $('<td data-label="nmEmpresa"></td>').text(dados.NM_EMPRESA).appendTo(row);
                        $('<td data-label="dsEndereco"></td>').text(dados.DS_ENDERECO).appendTo(row);
                        
                        count++;
                        
                    });

                }

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        }

        function carregaTabela2(idUsuario) {

            console.log("idUsuario 2 ", idUsuario);

            let data = new FormData();

            data.append("idUsuario", idUsuario);

            $.ajax({
                url: "./control/pesquisarEmpresas.php",
                type: "POST",
                dataType: "json",
                data: data,
                processData: false,
                contentType: false
            }).done(function(result) {

                if(result.STATUS) {

                    let count = 1;
                    let empresas = result.RESULT;
                    let tabelaEmpresas = $("#tbEmpresas");

                    empresas.forEach((dados, indice) => {

                        let row = $("<tr class='row'></tr>").appendTo(tabelaEmpresas);

                        $('<td data-label="nmEmpresa"></td>').text(dados.NM_EMPRESA).appendTo(row);
                        $('<td data-label="dsEndereco"></td>').text(dados.DS_ENDERECO).appendTo(row);
                        
                        count++;
                        
                    });

                }

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });

        }

        function abrirReceberDoacao() {
            location.href = '../app/receberDoacao/index.php?idUsuario=' + window.btoa(idUsuario);
        }

        function abrirDoe() {
            location.href = '../app/doacao/index.php?idUsuario=' + window.btoa(idUsuario);
        }

        function exibirModal1() {

            $("#dimmer").addClass("active");
            
            setTimeout(function() {

                $("#dimmer").removeClass("active");

                $('#modalDoacoes').modal('show');
                carregaTabela1(idUsuario);

            }, 1000);

        }

        function exibirModal2() {

            $("#dimmer").addClass("active");

            setTimeout(function() {

                $("#dimmer").removeClass("active");

                $('#modalEmpresas').modal('show');
                carregaTabela2(idUsuario);

            }, 1000);

        }

        function fechaModal1() {

            event.preventDefault();
                
            $("#tbDoacoes > tr").each(function() {
                $(this).remove();
            });

            $('#modalDoacoes').modal('hide');
        
        }

        function fechaModal2() {

            event.preventDefault();
                
            $("#tbEmpresas > tr").each(function() {
                $(this).remove();
            });

            $('#modalEmpresas').modal('hide');

        }

        function deslogar () {

            $("#dimmer").addClass("active");
            $("body").css("overflow", "hidden");

            setTimeout(function() {
                location.href = "./index.php";
            }, 1000);

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

    </script>
    
</html>