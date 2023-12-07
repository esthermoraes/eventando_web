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
    include_once 'header.php';
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
                        <div id="barraMyE" class="row ms-1 me-1 mt-4 d-flex justify-content-between">
                            <?php
                            $eventosmY = $evento->selectMyEventos();
                            // Verifica se há eventos para exibir
                            if ($eventosmY["sucesso"] == 1 && !empty($eventosmY["eventos"])) {
                                foreach ($eventosmY["eventos"] as $evento) {
                                    ?>
                                    <div class="row-sm col-md-3 mb-3 my-1">
                                        <img src="<?= $evento['img']; ?>" alt="Imagem do Evento" class="img-fluid evento1">
                                    </div>
                                    <?php
                                }
                            } else {
                                // Caso não haja eventos, você pode lidar com isso conforme necessário
                                echo "<div>
                                <center>Você ainda não possui eventos!</center>
                                </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
  
                <div class="col-md-6">
                    <p id="EventosM">EVENTOS DO MOMENTO</p>
                    <table class="table table-hover" style="border-radius: 4px;">
                        <thead>
                            <tr style="background: #d9d5d4">
                                <th scope="col">Segunda-feira</th>
                                <th scope="col">27 de Novembro</th>
                            </tr>
                        </thead>
                        <tbody style="background: #ededed">
                            <tr>
                                <td>14h00</td>
                                <td style="color: #b25abf; font-weight: bold;">Fantasia Fest</td>
                            </tr>
                            <tr>
                                <td>16h00</td>
                                <td style="color: #b25abf; font-weight: bold;">Inovação Insights</td>                            
                            </tr>
                            <tr>
                                <td>19h30</td>
                                <td style="color: #b25abf; font-weight: bold;">Conexão Cultural</td>
                            </tr>
                        </tbody>

                        <thead>
                            <tr>
                                <th scope="col">Terça-feira</th>
                                <th scope="col">28 de Novembro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>8h30</td>
                                <td style="color: #b25abf; font-weight: bold;">Aventura Arte</td>                            
                            </tr>
                            <tr>
                                <td>13h30</td>
                                <td style="color: #b25abf; font-weight: bold;">Exploração Express</td>                            
                            </tr>
                            <tr>
                                <td>22h00</td>                            
                                <td style="color: #b25abf; font-weight: bold;">Criativa com Classe</td>                            
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col">Quarta-feira</th>
                                <th scope="col">29 de Novembro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10h45</td>                            
                                <td style="color: #b25abf; font-weight: bold;">Radiante Reunião</td>                            
                            </tr>
                            <tr>
                                <td>15h30</td>                            
                                <td style="color: #b25abf; font-weight: bold;">Inspirar Interação</td>                           
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

	<?php
        // Inclui o arquivo 'footer.php', que geralmente contém código HTML e PHP relacionado ao rodapé da página
        include_once 'footer.php';
    ?>