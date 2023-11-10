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
    <link rel = "stylesheet" type = "text/css" href = "css/css_visualizarEventoP.css" />
    <!-- JS externo-->
    <script src="js/js_criarEventoP.js" defer></script>
    <!-- Definimos o título da página -->
    <title> VISUALIZAR EVENTO PRESENCIAL </title>
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
        <p class="ms-3">VISUALIZAR  EVENTO</p>
        <p class="me-3">EVENTO 1</p>
    </div>
    <div class="container-fluid d-flex p-0 bagulhete">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img src="./img/convite1.jpg" alt="foto do evento" class="imagem m-2">
            <p class="">PÚBLICO</p>
        </div>
    </div>
</body>
</html>
