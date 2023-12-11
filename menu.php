<?php 
    // Define a variável $header como 2
    $header = 2;
    // Define a variável $css com um link para um arquivo CSS externo
    $css = '<link rel="stylesheet" type="text/css" href="css/css_menu.css"/>';
    // Define a variável $js com um link para um arquivo JavaScript externo com atributo 'defer'
    $js = '<script src="js/js_menu.js" defer></script>';
    // Define a variável $title como 'MENU'
    $title = 'MENU';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'BD/web/header.php';
    include_once 'BD/web/evento.php';

    $evento = new Evento();
?>
    
    <!-- Criamos uma div, onde nela vamos ter uma outra div onde tem as imagens de vários eventos -->
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col">
                <div class="container-fluid EventosR ps-5 mt-5" id="EventosR">
                    <label>EVENTOS RECENTES</label>
                    <div class="barraE">
                        <?php
                        $eventos = $evento->selectEventosR();

                        // Verifica se há eventos para renderizar
                        if ($eventos["sucesso"] == 1 && !empty($eventos["eventos"])) {
                            // Chama a função para renderizar o carrossel
                            $evento->renderCarrossel($eventos);
                        } else {
                            // Caso não haja eventos, você pode lidar com isso conforme necessário
                            echo "<div> <center> Nenhum evento encontrado. </center> </div>";
                        }?>
                    </div>
                </div>
            </div>
        </div>    
    
        <!-- Criamos uma div, onde nela vamos ter uma outra div onde tem as imagens dos evetos criados pelo usuário -->
        <div class="row" >
            <div class="container-fluid row ps-5 mt-5">
                <div class="col-md-6">
                    <div class="barraMyE">
                        <label id="MyEventos"> MEUS <br> EVENTOS </label>
                        <br>
                        <div id="barraMyE" class="container">
                            <div class="row ms-1 me-0 mt-2 d-flex justify-content-between">
                                <?php
                                $eventosmY = $evento->selectMyEventos();
                                if ($eventosmY["sucesso"] == 1 && !empty($eventosmY["eventos"])) {
                                    foreach ($eventosmY["eventos"] as $evento) {
                                        ?>
                                        <div class="col-md-3 mb-3 my-1">
                                            <?php
                                            if ($evento['formato'] == 'presencial') {
                                                ?>
                                                <a href="./visualizarMyEventoP.php?id=<?php echo $evento["id"] ?>">
                                                    <img src="<?= $evento['img']; ?>" alt="Imagem do Evento" class="img-fluid evento1 mt-2">
                                                </a>
                                                <?php
                                            } 
                                            else {
                                                ?>
                                                <a href="./visualizarMyEventoO.php?id=<?php echo $evento["id"] ?>">
                                                    <img src="<?= $evento['img']; ?>" alt="Imagem do Evento" class="img-fluid evento1 mt-2">
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo "<div> <center>Você ainda não possui eventos!</center> </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
  
                <div class="col-md-6">
                    <p id="EventosM">EVENTOS DO MOMENTO</p>
                    <!-- <div class="scrollable-table-container"> -->
                        <table class="table table-hover scrollable-table mb-5" style="border-radius: 4px;">
                            <thead>
                                <tr>
                                    <th scope="col">Segunda-feira</th>
                                    <th scope="col">11 de Dezembro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>8:30</td>
                                    <td style="color: #b25abf; font-weight: bold;">Reunião de TCC</td>                            
                                </tr>
                            </tbody>

                            <thead>
                                <tr>
                                    <th scope="col">Terça-feira</th>
                                    <th scope="col">12 de Dezembro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>09:20</td>                            
                                    <td style="color: #b25abf; font-weight: bold;">Eventando</td>                            
                                </tr>
                            </tbody>

                            <thead>
                                <tr>
                                    <th scope="col">Quarta-feira</th>
                                    <th scope="col">13 de Dezembro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>19:00</td>                            
                                    <td style="color: #b25abf; font-weight: bold;">Formatura</td>                            
                                </tr>
                            </tbody>

                            <thead>
                                <tr>
                                    <th scope="col">Quinta-feira</th>
                                    <th scope="col">14 de Dezembro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>15:00</td>                            
                                    <td style="color: #b25abf; font-weight: bold;">Café com os aliados</td>                            
                                </tr>
                            </tbody>

                            <thead>
                                <tr>
                                    <th scope="col">Sexta-feira</th>
                                    <th scope="col">15 de Dezembro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>10:00</td>                            
                                    <td style="color: #b25abf; font-weight: bold;">UBU</td>                            
                                </tr>
                                <tr>
                                    <td>00:00</td>                            
                                    <td style="color: #b25abf; font-weight: bold;">Férias</td>                            
                                </tr>
                            </tbody>
                        </table>
                    <!-- </table> -->
                </div>
            </div>
        </div>
    </div>

	<?php
        // Inclui o arquivo 'footer.php', que geralmente contém código HTML e PHP relacionado ao rodapé da página
        include_once 'BD/web/footer.php';
    ?>