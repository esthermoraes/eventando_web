<!-- Aqui iniciamos o código html -->
<html>
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale = 1, maximum-scale = 1">
	<!-- Icons -->
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin = "anonymous">
	<script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity = "sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin = "anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
	<!-- CSS externo -->
	<link rel = "stylesheet" type = "text/css" href = "css/css_favoritos.css" />
	<!-- Definimos o título da página -->
	<title> FAVORITOS </title>
	<!-- Definimos o ícone na aba da página-->
	<link rel="shortcut icon" type="image/png" href="img/schedule (2).png"/>
</head>

<body>
	<header class="row p-0 m-0 d-flex flex-wrap justify-content-center align-content-center">
        <div class="col-2">
			<a href="menu.php">
				<img class="logo-header img-fluid mt-5" src="./img/logo.png">
				<img class="logo-short d-none img-fluid mt-sm-4 mt-5" src="./img/logo_short.png" alt="">
			</a>
		</div>

        <div class="col-6 col-lg-6 d-flex flex-wrap justify-content-center align-content-center">
			<div class="area-pesquisar">
                <input type="search" class="me-2" placeholder="Buscar eventos">
                <button class = "btn-pesquisar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
		</div>

        <div class="col col-md-2 d-flex flex-wrap align-content-center justify-content-end criar">
			<a href = "#"> 
			<button class="btn-criar-evento">
				<i class="fa-regular fa-calendar-plus"></i>
				&nbsp;CRIAR EVENTO </button>
			</a>
		</div>

        <div class="col-1 d-none justify-content-center flex-wrap align-content-center short-criar">
            <button class="">
                <a href = "#"> 
                    <i class="fa fa-plus mais" aria-hidden="true"></i>
                </a> 
            </button>
        </div> 
    
        <nav class="col-2 col-md-2 navbar d-inline">
            <div class="navbar-container container-fluid pt-4 bg-primaria align-items-end flex-column bd-highlight">
                
                <!-- Toggler do Modal -->
                <div class="divBtn">
					<button type="button" name="btn" class="btn p-2 bd-highlight btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
						<span class="navbar-toggler-icon mt-4"></span>
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
                                <button type="button" class="btn-lg btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
	
	<div class="mae">
		<div class="row">
			<div class="col-5 ms-5 mt-5 py-5">
				<h1 class="titulo">
					<i class="fa-solid fa-star me-2" style="color: #f5d742;"></i>
					FAVORITOS
				</h1>
			</div>

			<div class="col-5 ms-5 mt-5 py-4 d-block d-sm-flex d-md-flex justify-content-end">
				<!-- <i class="fa-solid fa-filter filtro mt-3 me-3 d-none d-sm-flex" style="color: #770089;"></i> -->
				<select class="form-select mt-3" id="sltFiltros">
					<option value="">&#xf0b0; Todos Eventos</option>
					<option value="ME">&#xf274; Meus Eventos</option>
					<option value="ER">&#xf073; Eventos Recentes</option>
					<option value="EP">&#xf3c5; Eventos Presenciais</option>
					<option value="EO">&#xf0c1;	Eventos Online</option>
					<option value="OA">&#xf15d; Ordem Alfabética</option>
				</select>
			</div>
		</div>

        <div class="ms-5 me-5 mb-1 teste">
            <div class="ms-2 me-2 mt-5 mb-5 gx-5">
				<div class="row m-2 justify-content-center">
					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento1.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento2.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento3.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento4.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento5.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento6.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento7.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento8.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento9.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento10.jpg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento11.jpg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento12.jfif" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento13.jfif" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento14.jfif" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento15.jfif" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento16.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento17.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento18.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento19.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento20.jfif" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
						</div>
					</div>

					<div class="card bg-transparent config-card mt-4 m-4 mb-4 p-0">
						<img src="img/evento21.jpeg" class="card-img-top config-img" alt="foto evento">
						<div class="card-img-overlay d-flex">
							<i class="fa-solid fa-star ms-0 mt-2 me-2 fs-5" style="color: #f5d742;"></i>
							<p class="card-title titulo-card fs-3 ms-0 fs-4">Título</p>
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