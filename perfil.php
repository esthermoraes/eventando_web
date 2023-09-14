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
	<link rel = "stylesheet" type = "text/css" href = "css/css_perfil.css" />
	<!-- JS externo-->
    <script src = 'js/js_perfil.js' defer></script>
	<!-- Definimos o título da página -->
	<title> PERFIL </title>
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

	<div class="mae mt-5 mb-0">
		<div class="container-fluid row-2 col-11 ms-5">
			<!-- Upload profile -->
			<div class="d-flex">
				<div class="flex-grow-1 justify-content-md-start"> 
					<button class="btn mt-5 rounded-circle w-0 h-0 avatar">
						<i class="fa-solid fa-circle-user text-center avatarU"></i>
					</button>
				</div>
			</div>
		</div>	
		
		<div class = "row ms-5 me-5 mt-5 mb-5 teste">
			<div class="row ms-2 me-2 mt-5 mb-5 gx-5">
				<div class="col-xxl-6 mt-5 mb-5 mb-xxl-0">
					<div class="bg-secondary-soft mt-5 px-4 py-5 rounded">
						<div class="row g-3">
							<h2 class="mb-4 mt-0 infos"><i class="fa-solid fa-user me-2"></i>INFORMAÇÕES BÁSICAS</h2>
							
							<div class="col-md-12">
								<label class="form-label">Nome</label>
								<input type="text" class="form-control" placeholder="">
								<!-- <input type="text" class="form-control" value="TIAGO ROSA" placeholder=""> -->
							</div>
							
							<div class="col-md-12">
								<label class="form-label">Data de nascimento</label>
								<input class="form-control" type="text" id="date"  placeholder="" onfocus="(this.type='date')" onblur="(this.type='text')" required>
								<!-- <input class="form-control" type="text" id="date" value="12/11/1981" placeholder="" onfocus="(this.type='date')" onblur="(this.type='text')" required> -->
							</div>
							
							<div class="col-md-12">
								<label class="form-label">Estado</label>
								<select class="form-select" id="sltEstado" required>
									<option value=""> </option>
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapá</option>
									<option value="AM">Amazonas</option>
									<option value="BA">Bahia</option>
									<option value="CE">Ceará</option>
									<!-- <option value="CE" selected>Ceará</option> -->
									<option value="DF">Distrito Federal</option>
									<option value="ES">Espirito Santo</option>
									<option value="GO">Goiás</option>
									<option value="MA">Maranhão</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MT">Mato Grosso</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Pará</option>
									<option value="PB">Paraíba</option>
									<option value="PR">Paraná</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piauí</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rondônia</option>
									<option value="RR">Roraima</option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">São Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xxl-6 mt-5 mb-5 mb-xxl-0">
					<div class="bg-secondary-soft mt-5 px-4 py-5 rounded">
						<div class="row g-3">
							<h2 class="my-4 mb-4 mt-0 infos"><i class="fa-solid fa-phone me-2"></i>INFORMAÇÕES DE CONTATO</h2>
					
							<div class="col-md-12">
								<label for="exampleInputPassword2" class="form-label">Telefone</label>
								<input class="form-control" type="tel" id="telTelefone" placeholder="" maxlength="15" required>
								<!-- <input class="form-control" type="tel" id="telTelefone" value="(85) 99812-4767" placeholder="" maxlength="15" required> -->
							</div>
							
							<div class="col-md-12">
								<label for="exampleInputPassword3" class="form-label">E-mail</label>
								<input class="form-control" type="email" id="emEmail2" placeholder="" disabled>
								<!-- <input class="form-control" type="email" id="emEmail2" value="tiagorosa@gmail.com" placeholder="" disabled> -->
							</div>
						</div>
					</div>
					
					<div class="col-xxl-12">
						<button type="submit" class="botao btn mt-5 mb-0 text-center align-items-center">SALVAR EDIÇÕES</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Criamos um footer -->
	<footer class=" mt-0 d-none d-sm-flex">
		<div class="container-fluid mt-0">
			<div class="row align-items-center justify-content-between">
				<div class="col-4 mt-5 d-none d-sm-flex align-items-center justify-content-start">
					<p class="d-flex align-items-center ms-2 mt-5" id="insta">
						<a href="https://www.instagram.com/eventando.nozes/" target="_blank" id="instagram">
							INSTAGRAM
						</a>
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
