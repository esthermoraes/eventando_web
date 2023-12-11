<?php 
    // Define a variável $header como 3
    $header = 2;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_visualizarEventoP.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_visualizarEventoO.css" />';
    // Define a variável $js como vazia, ou seja, não inclui nenhum arquivo JavaScript
    $js = '<script src = "js/js_favorito.js" defer></script>';
    // Define a variável $title como 'VISUALIZAR EVENTO PRESENCIAL', que será o título da página
    $title = 'VISUALIZAR MEU EVENTO PRESENCIAL';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'BD/web/header.php';
    include_once 'BD/web/pegar_detalhes_evento_presencial.php';
    include_once 'BD/web/deletar_evento_presencial.php';
?>



<div class="container-fluid mt-5 ms-0 d-flex justify-content-center titulo">
        <center> <p>VISUALIZAR MEU EVENTO PRESENCIAL</p> </center>
    </div>

    <div class="container-fluid d-flex p-0 bagulhete mb-4">
        <div class="col-8 d-flex flex-column ms-2 mt-2 justify-content-between align-items-start primeiraparte">
            <form method="post" action="visualizarMyEventoP.php">
                <p class="ms-2"><?php echo htmlspecialchars($nome);?></p>
                <!-- <div class="d-flex align-items-center justify-content-between ms-2">
                    <p><?php echo htmlspecialchars($nome);?></p>
                    <div id="favoritar" estado="desfavoritado" class="d-flex publico_privado">
                        <i class="mb-3 me-2 fa-regular fa-star fa-lg" style="color: #ebcb00;"></i>
                        <input type="hidden" name="favoritar" id="favoritado"/>
                    </div>
                </div> -->
                <img src="<?php echo $img;?>" alt="foto do evento" class="imagem ms-2">
                <p class="ms-2"><?php echo $privacidade;?></p>
                
                <div class="d-flex ms-2">
                    <div class="form-floating">
                        <p><?php echo $objetivo;?></p> 
                        <p><?php echo $data_prevista;?> às <?php echo $horario;?></p>

                        <p><strong>Localização</strong></p>
                        <p> <?php echo $tipoLogradouro;?> <?php echo $logradouro;?>, <?php echo $numero;?> </p>
                        <p> <?php echo $bairro;?> - <?php echo $cidade;?> - <?php echo $estado;?> </p>
                        <p> CEP <?php echo $cep;?> </p>
                        
                        <p><strong>Complementos</strong></p>
                        <p><?php echo $atracoes;?> </p>
                        <p><?php echo $buffet;?> </p>
                        <p><?php echo $tipo_contato;?> - <?php echo $contato;?> </p>

                        <div class="d-flex">
                            <a href="eventoP_editavel.php" class="me-1">
                                <button type="submit" id="btn-salvar" class="botaoS mt-2 mb-2">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    EDITAR EVENTO
                                </button>
                            </a>
                            
                            <button type="submit" id="btn-deletar" name="deletar" class="botaoD mt-2 mb-2 me-2">
                                <i class="fa-regular fa-calendar-xmark"></i>
                                DELETAR EVENTO
                            </button>
                        </div>
                    </div>  
                </div>
            </form>
        </div>
    </div>
</body>
</html>