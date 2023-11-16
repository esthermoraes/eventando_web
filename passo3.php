<?php 
    // Define a variável $header como 3
    $header = 3;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_criarEventoP.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_criarEventoP.css" />';
    // Define a variável $js com um link para um arquivo JavaScript externo chamado 'js_criarEventoP.js' e com o atributo 'defer'
    $js = ' <script src="js/js_criarEventoP.js" defer></script>';
    // Define a variável $title como 'CRIAR EVENTO PRESENCIAL', que será o título da página
    $title = 'CRIAR EVENTO PRESENCIAL';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'header.php';
?>

    <div class="container-fluid mt-5 ms-0 d-flex justify-content-between titulo">
        <p class="ms-3">CRIAR CONVITE</p>
        <p class="me-3">Nome do Evento</p>
    </div>
    
    <div class="container-fluid d-flex p-0 bagulhete">
        <div class="div_passos">
            <div id="btn-passo1" class="passo1 mb-2">
                <p class="m-0">PASSO 1</p>
            </div>
            <div class="passo2 mb-2">
                <p class="m-0">PASSO 2</p>
            </div>
            <div class="passo3">
                <p class="m-0">PASSO 3</p>
            </div>
        </div>
       
        <div class="w-100 justify-content-center flex-wrap m-5">
            <div class="w-50 div-passo3"  style="background-color: #ebf6fc;">
                <p class="fs-2 ms-3">Estilo</p>
                <div class="d-flex">
                    <div class="p-3">
                        <img src="img/convite1.png" alt="foto convite" class="convite">
                    </div>
                    <div class="p-3">
                        <img src="img/convite2.png" alt="foto convite" class="convite">
                    </div>
                    <div class="p-3">
                        <img src="img/convite3.png" alt="foto convite" class="convite">
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="#">
                        <button type="submit" id="btn-passo2" class="botao2 m-3">&#10140; ESCOLHER COR</button>
                    </a>
                </div>
            </div>

            <div class="w-50 div-passo3" style="background-color: #ebf6fc;">
                <p class="fs-2 ms-3">Cores</p>
                <div class="d-flex m-3 p-3 justify-content-around">
                    <div class="p-3 convite" style="background-color: #D1593E">
                    </div>
                    <div class="p-3 convite" style="background-color: #B8294B">
                    </div>
                    <div class="p-3 convite" style="background-color: #7848AD">
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="#">
                        <button type="submit" id="btn-passo2" class="botao2 m-3"><i class="fa-solid fa-arrow-rotate-right me-2"></i>GERAR CONVITE</button>
                    </a>
                </div>
            </div>

            <div class="w-50 div-passo3" style="background-color: #ebf6fc;">
                <p class="fs-2 ms-3">Cores</p>
                <div class="d-flex m-3 p-3 justify-content-around">
                    <div class="p-3 convite" style="background-color: #246634">
                    </div>
                    <div class="p-3 convite" style="background-color: #49948F">
                    </div>
                    <div class="p-3 convite" style="background-color: #AB4100">
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="#">
                        <button type="submit" id="btn-passo2" class="botao2 m-3"><i class="fa-solid fa-arrow-rotate-right me-2"></i>GERAR CONVITE</button>
                    </a>
                </div>
            </div>

            <div class="w-50 div-passo3" style="background-color: #ebf6fc;">
                <p class="fs-2 ms-3">Cores</p>
                <div class="d-flex m-3 p-3 justify-content-around">
                    <div class="p-3 convite" style="background-color: #000">
                    </div>
                    <div class="p-3 convite" style="background-color: #FF6464">
                    </div>
                    <div class="p-3 convite" style="background-color: #A0B1FF">
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="#">
                        <button type="submit" id="btn-passo2" class="botao2 m-3"><i class="fa-solid fa-arrow-rotate-right me-2"></i>GERAR CONVITE</button>
                    </a>
                </div>
            </div>

            <div class="w-50 div-passo3"  style="background-color: #ebf6fc;">
                <p class="fs-2 ms-3">Convite</p>
                <div class="d-flex justify-content-start">
                    <div class="p-3">
                        <img src="img/convite3_3.png" alt="foto convite" class="convite">
                    </div>

                    <div class="">
                        <div class="mt-5">
                            <a href="#">
                                <button type="submit" id="btn-passo2" class="botao2 m-3"><i class="fa-solid fa-download me-2"></i>BAIXAR</button>
                            </a>
                        </div>
                        <div class="mt-5">
                            <a href="#">
                                <button type="submit" id="btn-passo2" class="botao2 m-3"><i class="fa-solid fa-share-nodes me-2"></i>COMPARTILHAR</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-2 mb-2">
                <a href="visualizarEventoP.php">
                    <button type="submit" id="btn-passo2" class="botao">
                        <i class="fa-solid fa-eye"></i>
                        VISUALIZAR EVENTO
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>