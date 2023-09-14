<!-- Aqui iniciamos o código html, e já chamamos o arquivo css para estilizar -->
<html>
<head>
	<meta charset = "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin = "anonymous">
	<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin = "anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <!-- CSS externo-->
    <link rel="stylesheet" type="text/css" href="css/css_menu.css"/>
    <!-- JS externo-->
    <script src = 'js/js_menu.js' defer></script>
    <!-- Definimos o título da página -->
	<title> MENU </title>
    <!-- Definimos o ícone na aba da página-->
	<link rel="shortcut icon" type="image/png" href="img/schedule (2).png"/>
</head>

<body>
    <!-- Criamos a divMenu que dentro dela tem a logo, a barra de bucar, o botão de se cadastrar e o de logar. -->
    <header id="Cabecalho" name="Cabecalho" class="row">
        <div id="divLogoP" name="divLogoP" class="col ">
            <img id=logo src="img/logo.png">
        </div>
    
        <div class="divBuscar col-md-6 col-sm me-5">
            <input type="search" class="buscar" placeholder="Buscar eventos">
            <button class = "pesquisa">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    
        <div class="col d-flex align-items-center justify-content-end adicionais">
            <a href = "criarEventoP.php">
                <button class="criar" name="criar" onclick="CriarEvento()"> Criar Evento </button>
            </a>
    
            <button class="d-none short-criar criar" name="criar" onclick="CriarEvento()">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>

            <!-- Modal -->
            <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>  
    
        <nav class="col navbar d-inline">
            <div class="navbar-container container-fluid pt-4 bg-primaria align-items-end flex-column bd-highlight">
                
                <!-- Toggler do Modal -->
                <div class="divBtn">
                    <button type="button" name="btn" class="btn p-2 bd-highlight btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
        
                <!-- Logo -->
                <div class="modal" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen sidenav bg-primaria" role="document">
                        <div class="modal-content"> <!-- aberta -->
                            <div class="modal-header border-bottom-0 bg-primaria">
                                <div class="logo">
                                    <a href="#" class="navbar-brand logot">
                                        <img class="tamanhoLogo" src="img/logo.png" alt="">
                                    </a>
                                </div>
                                <button type="button" class=" btn-lg btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                
                            <div class="modal-body bg-secundaria">
                                <div class="container-fluid d-flex justify-content-start pe-5">
                                    <ul class="list-group list-group-flush modal-ul my-auto">
                                        <li id="opcao"class="list-group-item d-flex d-inline-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle option" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                            </svg> 
                                            <a class="fts-5 my-auto mx-2 nav-link" href="perfil.php" style="color: black; text-decoration: none;">PERFIL</a>
                                        </li>
                    
                                        <li  id="opcao" class="list-group-item d-flex d-inline-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-star-fill option" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg> 
                                            <a class="fts-5 my-auto mx-2"href="favoritos.php" style="color: black; text-decoration: none;">FAVORITOS</a>   
                                        </li>
                                        
                                        <li  id="opcao" class="list-group-item d-flex d-inline-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-info-circle option" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                            </svg> 
                                            <a class="fts-5 my-auto mx-2"href="sobreNos.php" style="color: black; text-decoration: none;">SOBRE NÓS</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="modal-footer">
                                <li id="sair" class=" w-auto p-3 list-group-item d-flex d-inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-box-arrow-right  " viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg> 
                                    <a id="sair" class="fts-5 my-auto mx-2" href="index.php" >ENCERRAR SESSÃO</a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </nav>             
    </header>
    
    <!-- Criamos uma div, onde nela vamos ter uma outra div onde tem as imagens de vários eventos -->
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col">
                <div class="container-fluid EventosR ps-5 mt-5" id="EventosR">
                    <label>EVENTOS RECENTES</label>
                    <div class="barraE">
                        <img id="eventoAparece" src="img/evento1.jpeg" alt="evento1">
                        <i class="fa-solid fa-angles-right d-none" id="seta" style="color: #1f003d;"></i>
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
                        <div id="barraMyE" class="row ms-1">
                            <div class="row teste mt-2 me-3">
                                <div class="row-sm col-md-3 mb-3">
                                    <img src="img/evento14.jfif" alt="Imagem 14" class="img-fluid mb-5 eventoAparece1">
                                    <img src="img/evento14.jfif" alt="Imagem 14" class="img-fluid evento1">
                                </div>
                                <div class="row-sm col-md-3 mb-3 my-3">
                                    <img src="img/evento15.jfif" alt="Imagem 15" class="img-fluid my-4 eventoAparece1">
                                    <img src="img/evento15.jfif" alt="Imagem 15" class="img-fluid evento1">
                                </div>
                                <div class="row-sm col-md-3 mb-3 my-3">
                                    <img src="img/evento16.jpeg" alt="Imagem 16" class="img-fluid my-4 eventoAparece1">
                                    <img src="img/evento16.jpeg" alt="Imagem 16" class="img-fluid evento1">
                                </div>
                                <div class="row-sm col-md-3 mb-3 my-3">
                                    <img src="img/evento17.jpeg" alt="Imagem 17" class="img-fluid my-4 eventoAparece1">
                                    <img src="img/evento17.jpeg" alt="Imagem 17" class="img-fluid evento1">
                                </div>   
                            </div>
    
                            <div class="row teste me-3">
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
    
                <div class="col-md-6 moment justify-content-aroun" >
                    <!-- Criamos uma div, onde nela vamos ter um slideShow com os principais eventos do momento -->
                    <p id="EventosM">EVENTOS DO MOMENTO</p>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" >
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="img/evento24.jpg" alt="evento24" class="img-fluid mx-auto" >
                            </div>
                    
                            <div class="item">
                                <img src="img/evento25.jpg" alt="evento25" class="img-fluid mx-auto estiloimagem" >
                            </div>
                        
                            <div class="item">
                                <img src="img/evento26.jpg" alt="evento26" class="img-fluid mx-auto estiloimagem" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Criamos um footer -->
	<footer>
		<div class="container-fluid mt-5">
			<div class="row align-items-center justify-content-between">
				<div class="col-4 mt-5 d-none d-sm-flex align-items-center justify-content-start">
					<p class="d-flex align-items-center ms-2 mt-5 mb-0" id="insta">
						<a href="https://www.instagram.com/eventando.nozes/" target="_blank" id="instagram">INSTAGRAM</a>
					</p>
				</div>
		
				<div class="col-4 mt-5 d-none d-sm-flex align-items-center justify-content-center">
					<img class="img-fluid" id="from" src="img/rodape.png" alt="from">
				</div>

				<div class="col-4 mt-5 d-none d-sm-flex flex-column align-items-end text-center">
					<p id="app" class="mb-0 mt-0 me-3"> Obtenha o aplicativo </p>
					<img class="img-fluid mt-3 my-0" id="baixar" src="img/baixar.png" alt="baixar">
				</div>
			</div>
		</div>
	</footer>	
</body>
</html>