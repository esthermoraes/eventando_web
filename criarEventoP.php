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
        <div class="w-100 div-passo1">
            <div class="div-form">
                <form class="d-flex flex-wrap">
                    <div class="div-img d-flex flex-wrap w-100">
                        <div class="col-5">
                            <label class="imagem" for="file">FOTO DO EVENTO</label>
                            <input id="file" type="file"/>
                        </div>
                        <div class="col-5 ms-5 w-50">
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
                                    <option value="1">Acre</option>
                                    <option value="2">Alagoas</option>
                                    <option value="3">Amapá</option>
                                    <option value="4">Amazonas</option>
                                    <option value="5">Bahia</option>
                                    <option value="6">Ceará</option>
                                    <option value="7">Distrito Federal</option>
                                    <option value="8">Espirito Santo</option>
                                    <option value="9">Goiás</option>
                                    <option value="10">Maranhão</option>
                                    <option value="11">Mato Grosso do Sul</option>
                                    <option value="12">Mato Grosso</option>
                                    <option value="13">Minas Gerais</option>
                                    <option value="14">Pará</option>
                                    <option value="15">Paraíba</option>
                                    <option value="16">Paraná</option>
                                    <option value="17">Pernambuco</option>
                                    <option value="18">Piauí</option>
                                    <option value="19">Rio de Janeiro</option>
                                    <option value="20">Rio Grande do Norte</option>
                                    <option value="21">Rio Grande do Sul</option>
                                    <option value="22">Rondônia</option>
                                    <option value="23">Roraima</option>
                                    <option value="24">Santa Catarina</option>
                                    <option value="25">São Paulo</option>
                                    <option value="26">Sergipe</option>
                                    <option value="27">Tocantins</option>
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
                        <div class = "col- w-100">
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

                            <div class="d-flex justify-content-end">
                                <a href="passo2.php" >
                                    <button type="submit" id="btn-passo2" class="botao">&#10140; PRÓXIMO PASSO</button>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-100 div-passo2 d-none justify-content-center flex-wrap">
            <div class="w-100 d-flex justify-content-center mt-5">
                <form action="" class="d-flex form-convidado ms-4">
                    <input type="text" name="" id="" class="p-2 m-2" placeholder="Nome do Convidado">
                    <input type="email" name="" id="" class="p-2 m-2" placeholder="Email do Convidado">
                    <button type="submit"class="m-2">ADICIONAR</button>
                </form>
            </div>
            <div class="">
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
                <div class="d-flex justify-content-end mt-2 mb-2">
                    <a href="#">
                        <button type="submit" id="btn-passo2" class="botao">&#10140; PRÓXIMO PASSO</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-100 div-passo2 d-none justify-content-center flex-wrap">
            <div class="" style="background-color: #ebf6fc;">
                <p>CONVITE</p>
            </div>
        </div>
    </div>
</body>
</html>