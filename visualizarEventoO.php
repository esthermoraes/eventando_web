<?php 
    // Define a variável $header como 3
    $header = 3;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_visualizarEventoP.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_visualizarEventoO.css" />';
    // Define a variável $js como vazia, ou seja, não inclui nenhum arquivo JavaScript
    $js = '';
    // Define a variável $title como 'VISUALIZAR EVENTO PRESENCIAL', que será o título da página
    $title = 'VISUALIZAR EVENTO ONLINE';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'header.php';
    //include_once 'BD/web/pegar_detalhes_evento_online.php';
?>

<div class="container-fluid mt-5 ms-0 d-flex justify-content-between titulo">
        <p class="ms-3">VISUALIZAR EVENTO ONLINE</p>
        <p class="me-3">Nome Do Evento</p>
    </div>

    <div class="container-fluid d-flex p-0 bagulhete">
        <div class="col-4 d-flex flex-column justify-content-between align-items-start primeiraparte">
            <img src="img/evento25.jpg" alt="foto do evento" class="imagem">
            <p class="privacidade">PÚBLICO</p>
            <p class="justify-content-start"></p>
            <div class="d-flex">
                <div class="form-floating">
                <p for="dataEvento">Data do Evento</p>  
                <p><strong>Localização</strong></p>
                <p class="font-weight-bold">Plataforma</p>
                <p placeholder= "Plataforma"></p>
                <p>Link</p>
                </div>  
            </div>
            
            <div class="">
                
                
            </div>
        </div>
        
            <div class="col-4 d-flexflex-column align-items-center-start mt-4">
                <p class="font-weight-bold">Complementos</p>
                <p id=""> Complemento aqui</p>
                <div class="d-flex mt-4">
                    <p id=""> Tipo de contato</p>
                </div>
            
            <div class="botoesev d-flex flex-column align-items-center m-2 mt-5">
                <a href="salvar_evento.php">
                    <button type="submit" id="btn-salvar" class="botaoS m-2">
                        <i class="fa-regular fa-calendar-check"></i>
                        SALVAR EVENTO
                    </button>
                </a>
                <button type="submit" id="btn-deletar" class="botaoD m-1">
                    <i class="fa-regular fa-calendar-xmark"></i>
                    DELETAR EVENTO
                </button>
            </div>
            </div>
        
        <div class="col-4 d-flex flex-column justify-content-between align-items-start mt-4">
        </div>
    </div>
    
</body>
</html>