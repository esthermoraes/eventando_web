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
    require_once 'BD/web/evento_online.php';
?>

    <div class="container-fluid mt-5 ms-0 d-flex justify-content-between titulo">
        <p class="ms-3">VISUALIZAR EVENTO ONLINE</p>
        <p class="me-3">Nome Do Evento</p>
    </div>

    <div class="container-fluid d-flex justify-content-around p-0 bagulhete">
        <div class="col-3 d-flex flex-column justify-content-between align-items-start">
            <img src="img/evento25.jpg" alt="foto do evento" class="imagem m-2 ms-4">
            <p class="privacidade">PÚBLICO</p>
            <p class="justify-content-start">Objetivo do evento</p>
            <div class="d-flex">
                <p class="m-2">dia/mes/ano</p>
                <p class="m-2" style="background-color: #f8f8f8;">hora</p>
                <p class="m-2">:</p>
                <p class="m-2" style="background-color: #f8f8f8;">min</p>
            </div>
            <div class="">
                <p class="font-weight-bold">Endereço</p>
                <p>Plataforma</p>
                <p>Link</p>
            </div>
        </div>
        <div class="col-4 d-flex flex-column justify-content-between align-items-start mt-4">
            <p class="font-weight-bold">Complementos</p>
            <p>aleatorio aleatorio aleatorio</p>
            <div class="d-flex">
                <select class="w-50" disabled>
                    <option>Telefone</option>
                    <option>E-mail</option>
                    <option>Instagram</option>
                    <option>Tiktok</option>
                </select>
                <p class="mt-3 ms-2">contato</p>
            </div>
            <table class="table table-hover mt-3" id="">
                <thead>
                    <tr style="background: #bedef2">
                        <th scope="col">N°</th>
                        <th scope="col">Convidado</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody style="background: #ededed">
                    <tr>
                        <td colspan="3">
                            <center><i>Não há convidados</i></center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-center m-2">
                <a href="salvar_evento.php">
                    <button type="submit" id="btn-salvar" class="botaoS m-2">
                        <i class="fa-regular fa-calendar-check"></i>
                        SALVAR EVENTO
                    </button>
                </a>
                <button type="submit" id="btn-deletar" class="botaoD m-2">
                    <i class="fa-regular fa-calendar-xmark"></i>
                    DELETAR EVENTO
                </button>
            </div>
        </div>
    </div>
    
</body>
</html>
