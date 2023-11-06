<?php 
    // Define a variável $_seila como 2
    $_seila = 2;
    // Define a variável $css com um link para um arquivo CSS externo
    $css = '<link rel="stylesheet" type="text/css" href="css/css_menu.css"/>';
    // Define a variável $js com um link para um arquivo JavaScript externo com atributo 'defer'
    $js = '<script src="js/js_menu.js" defer></script>';
    // Define a variável $title como 'MENU'
    $title = 'MENU';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'header.php';
?>

    
    <!-- Criamos uma div, onde nela vamos ter uma outra div onde tem as imagens de vários eventos -->
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col">
                <div class="container-fluid EventosR ps-5 mt-5" id="EventosR">
                    <label>EVENTOS RECENTES</label>
                    <div class="barraE">
                        <img class="evento" src="img/evento1.jpeg" alt="evento1">
                        <img class="evento" src="img/evento2.jpeg" alt="evento2">
                        <img class="evento" src="img/evento3.jpeg" alt="evento3">
                        <img class="evento" src="img/evento4.jpeg" alt="evento4">
                        <img class="evento" src="img/evento5.jpeg" alt="evento5">
                        <img class="evento" src="img/evento6.jpeg" alt="evento6">
                        <img class="evento" src="img/evento7.jpeg" alt="evento7">
                        <img class="evento" src="img/evento8.jpeg" alt="evento8">
                        <img class="evento" src="img/evento9.jpeg" alt="evento9">
                        <img class="evento" src="img/evento10.jpg" alt="evento10">
                        <img class="evento" src="img/evento11.jpg" alt="evento11">
                        <img class="evento" src="img/evento12.jfif" alt="evento12">
                        <img class="evento" src="img/evento13.jfif" alt="evento13">
                    </div>
                </div>
            </div>
        </div>    
    
        <!-- Criamos uma div, onde nela vamos ter uma outra div onde tem as imagens dos evetos criados pelo usuário -->
        <div class="row" >
            <div class="container-fluid row ps-5 mt-5">
                <div class="col-md-6">
                    <div class = "barraMyE">
                        <label id="MyEventos"> MEUS <br> EVENTOS </label>
                        <br>
                        <div id="barraMyE" class="row ms-1 me-1 mt-4 d-flex justify-content-between">
                            <div class="row teste mt-0">
                                <div class="row-sm col-md-3 mb-3 my-1">
                                    <img src="img/evento14.jfif" alt="Imagem 14" class="img-fluid evento1">
                                </div>
                                <div class="row-sm col-md-3 mb-3 my-1">
                                    <img src="img/evento15.jfif" alt="Imagem 15" class="img-fluid evento1">
                                </div>
                                <div class="row-sm col-md-3 mb-3 my-1">
                                    <img src="img/evento16.jpeg" alt="Imagem 16" class="img-fluid evento1">
                                </div>
                                <div class="row-sm col-md-3 mb-3 my-1">
                                    <img src="img/evento17.jpeg" alt="Imagem 17" class="img-fluid evento1">
                                </div>   
                            </div>
    
                            <div class="row teste">
                                <div class="col-md-3 mt-3">
                                    <img src="img/evento18.jpeg" alt="Imagem 18" class="img-fluid evento1">
                                </div> 
                                <div class="col-md-3 mt-3">
                                    <img src="img/evento19.jpeg" alt="Imagem 19" class="img-fluid evento1">
                                </div>
                                <div class="col-md-3 mt-3">
                                    <img src="img/evento20.jfif" alt="Imagem 20" class="img-fluid evento1">
                                </div>
                                <div class="col-md-3 mt-3">
                                    <img src="img/evento22.jpeg" alt="Imagem 22" class="img-fluid evento1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
  
                <div class="col-md-6">
                    <p id="EventosM">EVENTOS DO MOMENTO</p>
                    <table class="table table-striped" style="border-radius: 4px;">
                        <thead>
                            <tr>
                                <th scope="col">Segunda-feira</th>
                                <th scope="col">18 de setembro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>14h00</td>
                                <td style="color: #b25abf; font-weight: bold;">Nome do Evento</td>
                            </tr>
                            <tr>
                                <td>16h00</td>
                                <td style="color: #b25abf; font-weight: bold;">Nome do Evento</td>                            
                            </tr>
                            <tr>
                                <td>19h30</td>
                                <td style="color: #b25abf; font-weight: bold;">Nome do Evento</td>                            
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col">Terça-feira</th>
                                <th scope="col">20 de setembro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>8h30</td>
                                <td style="color: #b25abf; font-weight: bold;">Nome do Evento</td>                            
                            </tr>
                            <tr>
                                <td>13h30</td>
                                <td style="color: #b25abf; font-weight: bold;">Nome do Evento</td>                            
                            </tr>
                            <tr>
                                <td>22h00</td>                            
                                <td style="color: #b25abf; font-weight: bold;">Nome do Evento</td>                            
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col">Quarta-feira</th>
                                <th scope="col">21 de setembro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10h45</td>                            
                                <td style="color: #b25abf; font-weight: bold;">Nome do Evento</td>                            
                            </tr>
                            <tr>
                                <td>15h30</td>                            
                                <td style="color: #b25abf; font-weight: bold;">Nome do Evento</td>                           
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