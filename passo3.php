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
    <link rel = "stylesheet" type = "text/css" href = "css/css_criarEventoP.css" />
    <!-- JS externo-->
    <script src="js/js_criarEventoP.js" defer></script>
    <!-- Definimos o título da página -->
    <title> CRIAR EVENTO PRESENCIAL </title>
    <!-- Definimos o ícone na aba da página-->
    <link rel="shortcut icon" type="image/png" href="img/calendar_icon.png"/>
</head>

<body>
    <header class="container-fluid">
        <div class="container-fluid row d-flex justify-content-around align-items-center">
            <div class="div-img criar-evento col-3 navbar-brand d-flex justify-content-center align-items-center" href="#">
                <img class="logo-header img-fluid ms-5 ms-md-0 mt-xl-4" src="./img/logo.png">
            </div>
            <div class="div-pesquisar col-6 navbar-brand d-md-flex d-none justify-content-center align-items-center" href="#">
                <form class="d-flex mb-0 form-pesquisar">
                    <input class="form-control me-2" type="search" placeholder="Buscar eventos" aria-label="Search"/>
                    <button class="btn" type="submit">
                        <i class="lupa fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <div class="div-home col-2 navbar-brand justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav teste-3">         
                    <div class="nav-link">
                        <a href = "menu.php">
                            <i class="fa-solid fa-house fa-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid mt-5 ms-0 d-flex justify-content-between titulo">
        <p class="ms-3">INFORMAÇÕES DO EVENTO</p>
        <p class="me-3">Nome do Evento</p>
    </div>
    <div class="container-fluid d-flex p-0 bagulhete">
        <div class="div_passos">
            <div id="btn-passo1" class="passo1 mb-2">
                <p class="m-0">PASSO 1</p>
            </div>
            <div class="passo2 mb-2">
                <p class="m-0">PASSO 2</p>
            </div>
            <div class="passo3">
                <p class="m-0">PASSO 3</p>
            </div>
        </div>
       
        <div class="w-100 justify-content-center flex-wrap m-5">
            <div class="w-50 div-passo3"  style="background-color: #ebf6fc;">
                <p class="fs-2 ms-3">Estilo</p>
                <div class="d-flex">
                    <div class="p-3">
                        <img src="img/convite1.jpg" alt="foto convite" class="convite">
                    </div>
                    <div class="p-3">
                        <img src="img/convite2.jpg" alt="foto convite" class="convite">
                    </div>
                    <div class="p-3">
                        <img src="img/convite3.jpg" alt="foto convite" class="convite">
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="#">
                        <button type="submit" id="btn-passo2" class="botao2 m-3">&#10140; ESCOLHER COR</button>
                    </a>
                </div>
            </div>

            <div class="w-50 div-passo3" style="background-color: #ebf6fc;">
                <p class="fs-2 ms-3">Cores</p>
                <div class="d-flex m-3 p-3 justify-content-around">
                    <div class="p-3 convite" style="background-color: #CE8C2A">
                    </div>
                    <div class="p-3 convite" style="background-color: #E4DEA6">
                    </div>
                    <div class="p-3 convite" style="background-color: #484E5C">
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="#">
                        <button type="submit" id="btn-passo2" class="botao2 m-3"><i class="fa-solid fa-arrow-rotate-right me-2"></i>GERAR CONVITE</button>
                    </a>
                </div>
            </div>

            <div class="w-50 div-passo3"  style="background-color: #ebf6fc;">
                <p class="fs-2 ms-3">Convite</p>
                <div class="d-flex justify-content-start">
                    <div class="p-3">
                        <img src="img/convite1.jpg" alt="foto convite" class="convite">
                    </div>

                    <div class="">
                        <div class="mt-5">
                            <a href="#">
                                <button type="submit" id="btn-passo2" class="botao2 m-3"><i class="fa-solid fa-download me-2"></i>BAIXAR</button>
                            </a>
                        </div>
                        <div class="mt-5">
                            <a href="#">
                                <button type="submit" id="btn-passo2" class="botao2 m-3"><i class="fa-solid fa-share-nodes me-2"></i>COMPARTILHAR</button>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>