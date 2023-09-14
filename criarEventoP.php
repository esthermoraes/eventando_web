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
	<link rel="shortcut icon" type="image/png" href="img/schedule (2).png"/>
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
        <div class="w-100 div-passo1">
            <div class="div-form">
                <form class="d-flex flex-wrap">
                    <div class="div-img d-flex flex-wrap w-100">
                            <div>
                                <label class="imagem" for="file">FOTO DO EVENTO</label>
                                <input id="file" type="file"/>
                            </div>
                            <div class="infos-basicas">
                                <input placeholder="Objetivo do evento" class="obj form-control"/>
                                <div class="d-flex justify-content-between mt-5">
                                    <input class="form-control me-3" type="text" id="date" placeholder="Data Prevista" onfocus="(this.type='date')" onblur="(this.type='text')">
                                    <input class="form-control horario" type="text" id="time" placeholder="Horário" onfocus="(this.type='time')" onblur="(this.type='text')"/>
                                </div>
                            </div>
                            <!-- <div class="d-flex align-items-center datetime"></div> -->
                    </div>
                    <div class="lado1">
                        <div class="endereco">
                            <label for="cep" class="mb-3 localizacao">Localização:</label>
                            <div class="d-flex cep-estado">
                                <input id="cep" class="form-control" placeholder="CEP"/>
                                <select class="form-select uf me-5" id="sltEstado">
                                    <option value="">Estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
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
                            <div class="d-flex flex-column pe-5">
                                <input placeholder="Cidade" class="form-control" readonly/>
                                <input placeholder="Bairro" class="form-control" readonly/>
                            </div>
                            <div class="d-flex justify-content-between pe-5">
                                <input placeholder="Logradouro" class="form-control log" readonly/>
                                <input placeholder="N°" class="ms-2 form-control num"/>
                            </div>
                        </div>
                    </div>
                    <div class="ms-5 lado2">                
                        <div class = "">
                            <label class="mb-3 complemento" for="buffet">Complementos:</label>
                            <div class="mb-3 d-flex justify-content-between">
                                <textarea id = "buffet" placeholder="Buffet" class="form-control buffet"></textarea>
                                <textarea placeholder="Atrações" class="form-control atracoes"></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <select class="form-select info">
                                    <option>Tipo de Contato</option>
                                    <option>Telefone</option>
                                    <option>E-mail</option>
                                    <option>Instagram</option>
                                    <option>Tik Tok</option>
                                </select>
                                <input class="info form-control" placeholder="Contato"/>
                            </div>
                            <div id="privacidade" estado="publico" class="mt-4 d-flex publico_privado">
                                <i class="mt-2 fa-solid fa-unlock fa-flip-horizontal fa-xl" style="color: #b25abf;"></i>
                                <p class="ms-2 pp">Público</p>
                            </div>
                        </div>
                    </div>
                    <div class="b">
                        <a href = "passo2.php">
                            <button type="submit" id="btn-passo2" class="botao">&#10140; PRÓXIMO PASSO</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-100 div-passo2 d-none justify-content-center flex-wrap">
            <div class="w-100 d-flex justify-content-center mt-5">
                <form action="" class="form-convidado">
                    <input type="text" name="" id="" placeholder="Nome do Convidado">
                    <input type="email" name="" id="" placeholder="Email do Convidado">
                    <button type="submit">ADICIONAR</button>
                </form>
            </div>
            <div>
                <div class="lista">
                    <div class="d-flex header-lista align-items-center">
                        <p class="me-3">CONVIDADO</p>
                        <p>EMAIL</p>
                    </div>
                    <div class="body-lista">
                        <span>Ester Moras Nacimento</span>
                        <span>tete@hotmail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>