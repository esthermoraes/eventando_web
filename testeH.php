<!-- Aqui iniciamos o código html, e já chamamos o arquivo css para estilizar -->
<html>
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <!-- Bootstrap -->
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin = "anonymous">
	<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin = "anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <!-- CSS externo-->
    <!-- <link rel="stylesheet" href="css/css_header.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/css_menu.css"/> -->
    <link rel="stylesheet" href="css/testeH.css">
    <!-- JS externo-->
    <script src = 'js/js_menu.js' defer></script>
    <!-- Definimos o título da página -->
	<title> MENU </title>
    <!-- Definimos o ícone na aba da página-->
	<link rel="shortcut icon" type="image/png" href="img/schedule (2).png"/>
</head>

<body>
    <!-- Criamos a divMenu que dentro dela tem a logo, a barra de bucar, o botão de se cadastrar e o de logar. -->
    <header>
        <div class="container-fluid row d-flex justify-content-between align-items-center">
            <!-- FOTO DO HEADER -->
            <a href="menu.php" class="col-2 d-none d-md-flex justify-content-center ms-5">
                <div class="d-none d-md-flex">
                    <img class="img-responsive logo-header" src="./img/logo.png">
                </div>
                <div class="col-md-1 d-md-none d-flex justify-content-center flex-wrap">
                    <img class="img-responsive logo-header" src="./img/logo.png">
                </div>
            </a>
            <!-- PARTE DE PESQUISAR -->
            <div class="col-3 d-none d-md-flex justify-content-center mb-3 ms-3">
                <form class="d-flex mb-0" style="width:30rem;">
                    <input class="form-control me-2" type="search" placeholder="Buscar eventos" aria-label="Search"/>
                    <button class="btn" type="submit">
                        <i class="fa-solid fa-magnifying-glass mb-3"></i>
                    </button>
                </form>
            </div>
            <div class="col-md-1 d-md-none d-flex justify-content-center flex-wrap">
                <button class="btn-pesquisar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            <!-- PARTE DE CRIAR EVENTO -->
            <div class="col-2 d-none d-md-flex justify-content-center mb-4 me-1">
                <a href = "criarEventoP.php"> 
                    <button class="btn-criar-evento">
                        <i class="fa-regular fa-calendar-plus"></i> 
                        &nbsp;CRIAR EVENTO
                    </button>
                </a>
            </div>
            <div class="col-md-1 d-md-none d-flex justify-content-center flex-wrap">
                <button class="short-criar">
                    <a href = "criarEventoP.php"> 
                        <i class="fa-regular fa-calendar-plus" aria-hidden="true"></i>
                    </a> 
                </button>
            </div> 
            <!-- NAV COM MENU -->
            <nav class="col-2 d-none d-md-flex justify-content-center navbar mb-4 ms-5">
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
                                                <a class="fs-5 my-auto mx-2 nav-link ms-2" href="perfil.php" style="color: black; text-decoration: none;">PERFIL</a>
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
                                        <a id="sair" class="mx-2 mt-0 mb-1" href="index.php">ENCERRAR SESSÃO</a>
                                    </li>
                                </div>

                            </div>
                        </div>
                    </div> 
                </div>
            </nav>           
        </div>
        <div></div>

    </header>
</body>
</html>