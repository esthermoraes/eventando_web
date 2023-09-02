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
    <link rel = "stylesheet" type = "text/css" href = "css/css_passo2.css" />
    <!-- JS externo-->
    <script src="js/js_criarEventoP.js" defer></script>
	<!-- Definimos o título da página -->
	<title> CRIAR EVENTO PRESENCIAL </title>
    <!-- Definimos o ícone na aba da página-->
	<link rel="shortcut icon" type="image/png" href="img/schedule (2).png"/>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid row d-flex justify-content-around align-items-center">
                <div class="div-img col-3 navbar-brand d-flex justify-content-center align-items-center" href="#">
                    <img class="logo-header img-fluid ms-5 ms-md-0 mt-xl-4" src="./img/logo.png">
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
                <div class="col-2 navbar-brand justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav teste-3">         
                        <div class="nav-link">
                            <a href = "menu.php">
                                <i class="fa-solid fa-house fa-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

	<div class="container-fluid mt-5 ms-0 d-flex justify-content-start titulo">
		<p class="ms-3">LISTA DE CONVIDADOS</p>
	</div>

    <div class="container-fluid d-flex p-0 bagulhete">
        <div class="div_passos">
            <div class="passo1 mb-2">
                <p class="m-0">PASSO 1</p>
            </div>
            <div class="passo2 mb-2">
                <p class="m-0">PASSO 2</p>
            </div>
            <div class="passo3">
                <p class="m-0">PASSO 3</p>
            </div>
        </div>
        
        <div class="w-100">
            <div class="div-form">
                <form class="d-flex">
                    <div class= "row justify-content-between ms-2 mt-4 w-100">
                        <div class = "inserir ms-5 col-3">
                            <input type= "text" class = "form-control" placeholder = "Nome do convidado">
                        </div>
                        <div class="col-3 ms-2">
                            <input type= "email" class = "form-control" placeholder = "E-mail do convidado">
                        </div>
                        <div class="col-4">
                            <button class = "btn-add mt-1"> ADICIONAR </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</html>