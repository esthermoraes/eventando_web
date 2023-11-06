<?php 
    // Define a variável $_seila como 1
    $_seila = 1;
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'header.php';
?>



    <div class="m-5">
        <p class="eventosR">EVENTOS RECENTES</p>
        <div class = "barraE">
            <img class="img-fluid evento" src="img/evento1.jpeg" alt="evento1">
            <img class="img-fluid evento" src="img/evento2.jpeg" alt="evento2">
            <img class="img-fluid evento" src="img/evento3.jpeg" alt="evento3">
            <img class="img-fluid evento" src="img/evento4.jpeg" alt="evento4">
            <img class="img-fluid evento" src="img/evento5.jpeg" alt="evento5">
            <img class="img-fluid evento" src="img/evento6.jpeg" alt="evento6">
            <img class="img-fluid evento" src="img/evento7.jpeg" alt="evento7">
            <img class="img-fluid evento" src="img/evento8.jpeg" alt="evento8">
            <img class="img-fluid evento" src="img/evento9.jpeg" alt="evento9">
            <img class="img-fluid evento" src="img/evento10.jpg" alt="evento10">
            <img class="img-fluid evento" src="img/evento11.jpg" alt="evento11">
            <img class="img-fluid evento" src="img/evento12.jfif" alt="evento12">
            <img class="img-fluid evento" src="img/evento13.jfif" alt="evento13">
        </div>
    </div>

    <!-- Criamos uma div, onde colocamos na label o slogan e um pouco sonbre o site -->
    <div class = "container-fluid row ps-5 mt-5">
        <div class = "col-4 mt-3">
            <p id = "slogan"> CRIE AGORA<br>O SEU<br>EVENTO &rarr;</p>
            <p id = "sobre" class="mt-4"> Organize seus eventos de maneira prática!<br>Essa ferramenta te ajuda a PLANEJAR, <br>GERENCIAR e EXECUTAR seus eventos <br>PRESENCIAIS ou VIRTUAIS.</p>
        </div>

        <div class = "col-8 mt-3">
            <!-- adicionamos uma imagem "estética" -->	
            <img class = "img-fluid" id = "fotosIniciais" src = "img/fotosIniciais.png" alt = "fotosIniciais">
        </div>
    </div>

    <?php
        // Inclui o arquivo 'footer.php', que geralmente contém código HTML e PHP relacionado ao rodapé da página
        include_once 'footer.php';
    ?>
