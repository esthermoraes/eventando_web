<?php 
    // Define a variável $header como 3
    $header = 2;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_visualizarEventoP.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_visualizarEventoO.css" />';
    // Define a variável $js como vazia, ou seja, não inclui nenhum arquivo JavaScript
    $js = '';
    // Define a variável $title como 'VISUALIZAR EVENTO PRESENCIAL', que será o título da página
    $title = 'VISUALIZAR EVENTO ONLINE';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'BD/web/header.php';
    include_once 'BD/web/pegar_detalhes_evento_online.php';
?>

    <div class="container-fluid mt-5 ms-0 d-flex justify-content-center titulo">
        <p class="me-5">VISUALIZAR EVENTO ONLINE</p>
        <!-- <p class="ms-5"><?php echo htmlspecialchars($nome);?></p> -->
    </div>

    <div class="container-fluid d-flex p-0 bagulhete mb-4">
        <div class="col-8 d-flex flex-column ms-2 mt-2 justify-content-between align-items-start primeiraparte">
            <p><?php echo htmlspecialchars($nome);?></p>
            <img src="<?php echo $img;?>" alt="foto do evento" class="imagem">
            <p class="privacidade"><?php echo $privacidade;?></p>
            
            <div class="d-flex ms-2">
                <div class="form-floating">
                    <p>Objetivo: <?php echo $objetivo;?></p> 
                    <p>Dia e Hora: <?php echo $data_prevista;?> às <?php echo $horario;?></p>

                    <p><strong>Endereço</strong></p>
                    <p>Plataforma: <?php echo $plataforma;?></p>
                    <p>Link: <?php echo $link;?></p>

                    <p><strong>Complementos</strong></p>
                    <p> Atrações: <?php echo $atracoes;?> </p>
                    <p> Contato: <?php echo $tipo_contato;?> - <?php echo $contato;?> </p>

                    <button type="submit" id="btn-salvar" class="botaoS mt-2 mb-2 me-2">
                        <i class="fa-regular fa-calendar-check"></i>
                        SALVAR EDIÇÕES
                    </button>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>