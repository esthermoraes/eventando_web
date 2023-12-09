<?php 
    // Define a variável $header como 3
    $header = 2;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_visualizarEventoP.css'
    $css = '<link rel = "stylesheet" type = "text/css" href = "css/css_visualizarEventoO.css" />';
    // Define a variável $js como vazia, ou seja, não inclui nenhum arquivo JavaScript
    $js = '';
    // Define a variável $title como 'VISUALIZAR EVENTO PRESENCIAL', que será o título da página
    $title = 'VISUALIZAR EVENTO PRESENCIAL';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'BD/web/header.php';
    require_once 'BD/web/pegar_detalhes_evento_presencial.php';
?>

<div class="container-fluid mt-5 ms-0 d-flex justify-content-center titulo">
    <center><p class="me-5">VISUALIZAR EVENTO PRESENCIAL</p></center>
    </div>

    <div class="container-fluid d-flex p-0 bagulhete mb-4">
        <div class="col-8 d-flex flex-column ms-2 mt-2 justify-content-between align-items-start primeiraparte">
            <p><?php echo htmlspecialchars($nome);?></p>
            <img src="<?php echo $img;?>" alt="foto do evento" class="imagem">
            <p class="privacidade"><?php echo $privacidade;?></p>
            
            <div class="d-flex ms-2">
                <div class="form-floating">
                    <p><?php echo $objetivo;?></p> 
                    <p><?php echo $data_prevista;?> às <?php echo $horario;?></p>

                    <p><strong>Localização</strong></p>
                    <p> <?php echo $tipoLogradouro;?> <?php echo $logradouro;?>, <?php echo $numero;?> </p>
                    <p> <?php echo $bairro;?> - <?php echo $cidade;?> - <?php echo $estado;?> </p>
                    <p>CEP <?php echo $cep;?> </p>
                    

                    <p><strong>Complementos</strong></p>
                    <p><?php echo $atracoes;?> </p>
                    <p><?php echo $buffet;?> </p>
                    <p><?php echo $tipo_contato;?> - <?php echo $contato;?> </p>
                </div>  
            </div>
        </div>
    </div>
</body>
</html>