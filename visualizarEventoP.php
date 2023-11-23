<?php 
    // Define a variável $header como 3
    $header = 3;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_visualizarEventoP.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_visualizarEventoP.css" />';
    // Define a variável $js como vazia, ou seja, não inclui nenhum arquivo JavaScript
    $js = '';
    // Define a variável $title como 'VISUALIZAR EVENTO PRESENCIAL', que será o título da página
    $title = 'VISUALIZAR EVENTO PRESENCIAL';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'header.php';
?>

    <div class="container-fluid mt-5 ms-0 d-flex justify-content-between titulo">
        <p class="ms-3">VISUALIZAR EVENTO PRESENCIAL</p>
        <p class="me-3">Nome do Evento</p>
    </div>

    <div class="container-fluid d-flex p-0 bagulhete">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img src="img/evento25.jpg" alt="foto do evento" class="imagem m-2 ms-4">
            <p class="privacidade">PÚBLICO</p>
        </div>

        <div class="d-flex justify-content-end mt-2 mb-2">
            <a href="BD/web/salvar_evento.php">
                <button type="submit" id="btn-salvar" class="botaoS">
                    <i class="fa-regular fa-calendar-check"></i>
                    SALVAR EVENTO
                </button>
            </a>
            <button type="submit" id="btn-deletar" class="botaoD">
                <i class="fa-regular fa-calendar-xmark"></i>
                DELETAR EVENTO
            </button>
        </div>
    </div>

    
</body>
</html>
