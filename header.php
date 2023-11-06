<?php 
    session_start();
    
    // Verifica se a sessão 'nome_txt' não está definida e a define como 'PERFIL' se não estiver.
    if(!(isset($_SESSION['nome_txt']))){
        $_SESSION['nome_txt'] = 'PERFIL';
    }

    // Verifica o valor da variável $_seila
    // Se o valor da variável $_seila for igual a 1 incluirá esse header abaixo
    if($_seila == 1){
        echo '
        <!-- Aqui iniciamos o código html -->
        <html>
        <head>
            <meta charset = "utf-8">
            <meta name = "viewport" content = "width=device-width, initial-scale = 1, maximum-scale = 1">
            <!-- Icons -->
            <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
            <!-- Bootstrap -->
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin = "anonymous">
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin = "anonymous"></script>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
            <!-- CSS externo -->
            <link rel="stylesheet" href="css/css_header.css">
            <link rel = "stylesheet" type = "text/css" href = "css/css_index.css"/>
            <!-- Definimos o título da página -->
            <title> HOME </title>
            <!-- Definimos o ícone na aba da página-->
            <link rel="shortcut icon" type="image/png" href="img/calendar_icon.png"/>
        </head>
        
        <body>
            <header>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid row d-flex justify-content-around align-items-center">
                        <div class="div-img col-3 mt-xl-2 ms-0 navbar-brand d-flex justify-content-center align-items-center" href="#">
                            <img class="logo-header ms-md-0 mt-4 img-fluid" src="./img/logo.png">
                        </div>
        
                        <div class="col-3 navbar-brand d-md-none d-flex justify-content-end div-pesquisar">
                            <button class = "btn-pesquisar">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
        
                        <div class="col-6 navbar-brand d-md-flex d-none justify-content-center align-items-center" href="#">
                            <form class="d-flex mb-0 form-pesquisar">
                                <input class="form-control me-2" type="search" placeholder="Buscar eventos" aria-label="Search"/>
                                <button class="btn" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </div>
        
                        <button class="col-2 navbar-toggler btn-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="col-2 collapse navbar-collapse justify-content-end mt-0 mb-0" id="navbarNavAltMarkup">
                            <div class="navbar-nav teste-3">         
                                <div class="nav-link mt-0 mb-0">
                                    <a href = "login.php"> 
                                        <button class="btn-criar-evento"> 
                                        <i class="fa-regular fa-calendar-plus"></i>
                                        &nbsp;CRIAR EVENTO </button>
                                    </a>
                                </div>
                                <div class="nav-link">
                                    <a href = "login.php">
                                        <button class = "btn btn-login">
                                            <i class = "fa fa-arrow-right-to-bracket"></i> 
                                            &nbsp;LOGIN
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        ';
    }

    // Mas, se o valor da variável $_seila for igual a 2 incluirá esse header abaixo
    else if($_seila == 2){
        echo '
        <!-- Aqui iniciamos o código html, e já chamamos o arquivo css para estilizar -->
        <html>
        <head>
            <meta charset = "utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <!-- Icons -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
            <!-- Bootstrap -->
            <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin = "anonymous">
            <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin = "anonymous"></script>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
            <!-- CSS externo-->
            <link rel="stylesheet" href="css/css_header2.css">
            ' . $css . ' <!-- Inclui o CSS externo definido na variável $css -->
            <!-- JS externo-->
            ' . $js . ' <!-- Inclui o JS externo definido na variável $js -->
            <!-- Definimos o título da página -->
            <title> ' . $title . ' </title>
            <!-- Definimos o ícone na aba da página-->
            <link rel="shortcut icon" type="image/png" href="img/calendar_icon.png"/>
        </head>

        <body>
            <!-- Criamos a divMenu que dentro dela tem a logo, a barra de bucar, o botão de se cadastrar e o de logar. -->
            <header>
                <div class="container-fluid row d-flex justify-content-around align-items-center">
                    <div class="col-3 div-img d-flex justify-content-center align-items-center mt-1" href="#">
                        <a href="menu.php">
                            <img class="logo-header img-fluid" src="./img/logo.png" style="height: 8rem;">
                        </a>
                    </div>

                    <div class="div-pesquisar d-md-none d-flex">
                        <button class="btn-pesquisar">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="col-3 d-flex d-md-flex d-none align-self-center mb-4 ms-5 me-5">
                        <form class="d-flex form-pesquisar w-100">
                            <input class="form-control me-2" type="search" placeholder="Buscar eventos" aria-label="Search"/>
                            <button class="btn-pesquisar" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                    
                    <div class="col col-md-2 d-md-flex d-none flex-wrap align-self-center mb-5 mt-2 ms-5">
                        <a href = "criarEventoP.php"> 
                            <button class="btn-criar-evento">
                                <i class="fa-regular fa-calendar-plus"></i> 
                                &nbsp;CRIAR EVENTO
                            </button>
                        </a>
                    </div>
                    <div class="col-1 d-md-none d-flex justify-content-center flex-wrap">
                        <button class="short-criar">
                            <a href = "criarEventoP.php"> 
                                <i class="fa-regular fa-calendar-plus" aria-hidden="true"></i>
                            </a> 
                        </button>
                    </div>    
            
                    <nav class="col navbar align-self-center mb-5 mt-3">
                        <div class="container-fluid pt-0 align-items-end flex-column">
                            
                            <!-- Toggler do Modal -->
                            <div class="mt-0">
                                <button type="button" name="btn" class="btn p-2 pt-0 mt-0" data-bs-toggle="modal" data-bs-target="#modalId" style="background-color: transparent;">
                                    <i class="fa-solid fa-bars fs-2"></i>
                                </button>
                            </div>
                    
                            <!-- Logo -->
                            <div class="modal" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                <div class="modal-dialog sidenav modal-fullscreen" role="document">
                                    <div class="modal-content"> <!-- aberta -->
                                        
                                        <div class="modal-header border-bottom-0">
                                            <div class="logo">
                                                <a href="#" class="navbar-brand logout">
                                                    <img class="tamanhoLogo img-fluid ms-1 mt-4" src="img/logo.png" alt="">
                                                </a>
                                            </div>
                                            <button type="button" class="btn-close mb-5 align-self-baseline" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                            
                                        <div class="modal-body">
                                            <div class="container-fluid d-flex justify-content-start pe-5">
                                                <ul class="list-group list-group-flush modal-ul my-auto">
                                                    <li id="opcao"class="list-group-item d-flex d-inline-flex">
                                                        <i class="fa-solid fa-circle-user fs-1"></i>
                                                        <a class="fs-5 my-auto mx-2 nav-link ms-2" href="perfil.php" style="color: black; text-decoration: none;">'. $_SESSION['nome_txt'] .'</a> <!-- Se a pessoa tiver feito login com a sessão o local de PERFIL no menu estará com o email colocado no login -->
                                                    </li>
                                
                                                    <li  id="opcao" class="list-group-item d-flex d-inline-flex">
                                                        <i class="fa-solid fa-star fs-1"></i>
                                                        <a class="fs-5 my-auto mx-2 mt-2" href="favoritos.php" style="color: black; text-decoration: none;">FAVORITOS</a>   
                                                    </li>
                                                    
                                                    <li  id="opcao" class="list-group-item d-flex d-inline-flex">
                                                        <i class="fa-solid fa-circle-info fs-1"></i> 
                                                        <a class="fs-5 my-auto mx-2 mt-2" href="sobreNos.php" style="color: black; text-decoration: none;">SOBRE NÓS</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                
                                        <div class="modal-footer">
                                            <li id="sair" class="w-100 p-0 list-group-item d-flex d-inline-flex">
                                                <i class="fa-solid fa-arrow-right-from-bracket mt-1 ms-2"></i>
                                                <a id="sair" class="mx-2 mt-0 mb-1" href="logout.php">ENCERRAR SESSÃO</a>
                                            </li>
                                        </div>

                                    </div>
                                </div>
                            </div> 
                        </div>
                    </nav>
                </div>           
            </header>
        ';
    }
?>