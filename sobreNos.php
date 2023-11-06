<?php 
    // Define a variável $_seila como 2
    $_seila = 2;
    // Define a variável $css com um link para um arquivo CSS externo chamado 'css_sobreNos.css'
    $css = ' <link rel = "stylesheet" type = "text/css" href = "css/css_sobreNos.css" />';
    // Define a variável $js como vazia, ou seja, não inclui nenhum arquivo JavaScript
    $js = '';
    // Define a variável $title como 'SOBRE NÓS', que será o título da página
    $title = 'SOBRE NÓS';
    // Inclui o arquivo 'header.php', que contém código HTML e PHP
    include_once 'header.php';
?>


    <div class="mae">
        <div class="col-xxl-6 mb-0 ms-5">
            <div class="bg-secondary-soft mt-5 px-4 py-5 rounded">
                <h1 class="titulo">
                    <i class="fa-solid fa-users me-2"></i>
                    SOBRE NÓS
                </h1>
            </div>
        </div>

        <div class = "row ms-5 me-5 mb-1 teste">
            <div class="row ms-2 me-2 mt-5 mb-5 gx-5">

                <div class="col-xxl-6 mb-5 mb-xxl-0">
                    <div class="bg-secondary-soft mt-2">
                        <div class="divSobre row mt-3 g-3">
                            <div class="row mt-0 mb-4 align-items-start sobre">
                                <p class="ms-1 mt-5 mb-4 fs-3 text-justify">
                                    A empresa EVENTANDO é especializada em planejamento de eventos que buscam criar memórias inesquecíveis. Fundada em 2023 como um projeto da instituição IFES. A empresa valoriza a personalização dos eventos, trabalhando em estreita colaboração com cada cliente para entender suas necessidades e objetivos.
                                    <br><br>
                                    Nosso time está sempre em busca de melhorias e ideias criativas para criar eventos exclusivos e personalizados que superem as expectativas de nossos clientes.
                                    <br><br> 
                                    Se você está procurando um parceiro para planejar seu próximo evento, estamos aqui para ajudá-lo. Entre em contato conosco para saber mais sobre nossos serviços e como podemos ajudá-lo a criar um evento único e memorável.
                                    <br><br>
                                </p>

                                <div class="justify-content-around container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="d-flex align-items-center">
                                                <p class="fs-3">
                                                    <a href="https://www.instagram.com/eventando.nozes/" class="insta" target="_blank">
                                                        <i id="insta2" class="fa-brands fa-instagram p-1 mt-2"></i>   
                                                        <p class="ms-1 mt-1">@eventando.nozes</p>
                                                    </a>
                                                </p> 
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="d-flex align-items-center">
                                                <p class="fs-3">
                                                    <a href="mailto:eventando.nozes@gmail.com" class="email" target="_blank">
                                                        <i id="email" class="fa-regular fa-envelope p-1 mt-2"></i>   
                                                        <p class="ms-1 mt-1">eventando.nozes@gmail.com</p>
                                                    </a>
                                                </p> 
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="d-flex align-items-center">
                                                <p class="fs-3 ms-xxl-5">
                                                    <a href="https://api.whatsapp.com/send?phone=5527998296191" class="whats" target="_blank">
                                                        <i id="whats" class="fa-brands fa-whatsapp p-1 mt-2"></i>   
                                                        <p class="ms-1 mt-1">(27) 99829-6191</p>
                                                    </a>
                                                </p> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 mb-5 mb-xxl-0">
                    <div class="card teste p-0">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/esther.jpeg" alt="foto da esther" class="rounded-circle img-fluid ms-xxl-5" style="width: 14.5rem; height: 14.5rem;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-0">
                                    <p class="card-title fs-2 titulo-card mt-4">ESTHER MORAES</p>
                                    <div class="text-dark card-text">
                                        <a href="https://instagram.com/esther.moraes_?igshid=NGExMmI2YTkyZg==" id="instaE" class="mt-4 d-flex" target="_blank">
                                            <i class="iconI fa-brands fa-instagram p-1 mt-1"></i>
                                            <p class="ms-1">@esther.moraes_</p> 
                                        </a>
                                        <a href="mailto:esther.ifes2021@gmail.com" id="emailE" class="mt-3 d-flex" target="_blank">
                                            <i class="iconE fa-regular fa-envelope p-1 mt-1"></i>
                                            <p class="ms-1">moraesesther16@gmail.com</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card teste p-0 mt-4">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/lorena.jpeg" alt="foto da lorena" class="rounded-circle img-fluid ms-xxl-5" style="width: 14.5rem; height: 14.5rem;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-0">
                                    <p class="card-title fs-2 titulo-card mt-4">LORENA TORAES</p>
                                    <div class="text-dark card-text">
                                        <a href="https://instagram.com/lorenatoraes?igshid=MzRlODBiNWFlZA==" id="instaL" class="col-4 mt-3 d-flex align-items-center justify-content-start" target="_blank">
                                            <i class="iconI fa-brands fa-instagram p-1"></i>
                                            <p class="ms-1 mt-3">@lorenatoraes</p> 
                                        </a>
                                        <a href="mailto:lorenatoraesdossantos@gmail.com" id="emailL" class="col-4 d-flex target="_blank">
                                            <i class="iconE fa-regular fa-envelope p-1 mt-3"></i>
                                            <p class="ms-1 mt-3">lorenatoraesdossantos@gmail.com </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card teste p-0 mt-5">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="img/sofia.jpeg" alt="foto da sofia" class="rounded-circle img-fluid ms-xxl-5" style="width: 14.5rem; height: 14.5rem;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-0">
                                    <p class="card-title fs-2 titulo-card mt-4">SOFIA ANDRADE</p>
                                    <div class="text-dark card-text">
                                        <a href="https://instagram.com/solfiee?igshid=MzRlODBiNWFlZA==" id="instaS" class="col-4 d-flex align-items-center justify-content-start" target="_blank">
                                            <i class="iconI fa-brands fa-instagram p-1 mt-1"></i>
                                            <p class="ms-1 mt-3">@solfiee</p> 
                                        </a>
                                        <a href="mailto:andradesoso17@gmail.com" id="emailS" class="col-4 d-flex align-items-center justify-content-start" target="_blank">
                                            <i class="iconE fa-regular fa-envelope p-1"></i>
                                            <p class="ms-1 mt-3">andradesoso17@gmail.com</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        // Inclui o arquivo 'footer.php', que geralmente contém código HTML e PHP relacionado ao rodapé da página
        include_once 'footer.php';
    ?>