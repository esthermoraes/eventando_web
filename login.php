<!-- Aqui iniciamos o código html -->
<html>
<head>
    <meta charset = "utf-8">
    <!-- Definição a escala da página para se adequar ao tamanho da tela do dispositivo -->
    <meta name = "viewport" content = "width = device-width, initial-scale = 1, maximum-scale = 1">
    <!-- Icons -->
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <!-- Bootstrap -->
    <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel = "stylesheet" integrity = "sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin = "anonymous">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity = "sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin = "anonymous"></script>
    <script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity = "sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin = "anonymous"></script>
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity = "sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin = "anonymous"></script>
    <link href = "https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel = "stylesheet">
    <!-- CSS externo-->
    <link rel = "stylesheet" type = "text/css" href = "css/css_login.css"/>
    <!-- JS externo-->
    <script src = 'js/js_login.js' defer></script>
    <!-- JS botão do google-->
    <script src = "https://accounts.google.com/gsi/client" async defer></script>
    <script src = "https://unpkg.com/jwt-decode/build/jwt-decode.js"></script>
    <title> LOGIN </title>
    <!-- Definimos o ícone na aba da página-->
    <link rel="shortcut icon" type="image/png" href="img/calendar_icon.png"/>
</head>

<?php
    include_once 'BD/web/cadastrar.php';
    include_once 'BD/web/entrar.php';

    if (isset($_GET["Cadastro"])){
        if($_GET["Cadastro"]){
            echo "<script> alert( 'Cadastro realizado com sucesso')</script>";
        }
        else{
            echo "<script>alert('Desculpe, ocorreu um erro e não foi possível concluir o cadastro. Por favor, tente novamente.')</script>";
        }
    }
?>

<body>
    <div class="container m-10">
        <div class="row">

            <div class="col-md-6">
                <a href="index.php" id="esquerda">
                    <button class="btn fs-5">
                        <i class="fa-solid fa-circle-left"></i>
                        <b>HOME</b>
                    </button>
                </a>

                <div class = "me-5" id="divLogo row" name="divLogo">
                    <div class="col-md-12">
                        <img class="w-100" id=logo src="img/logo_login.png">
                    </div>
                </div>
            </div>

            <div class="col-md-6" id="direita">
                <div id="divMain" name="divMain" class="container">

                    <div class="row" id="menu-login">
                        <div class="col-auto">
                            <button id="login" class="active" onclick="exibirLogin()"> LOGIN </button>
                        </div>
                        <div class="col-auto">
                            <button id="cadastro" onclick="exibirCadastro()"> CADASTRO </button>
                        </div>
                        <div class="col-auto d-none">
                            <button id="recuperar"> RECUPERAÇÃO DE SENHA</button>
                        </div>
                    </div>

                    <div id="divLogin" class="row">
                        <!-- Formulário LOGIN, com dois campos de entrada, um para o email e outro para a senha -->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="formulario">                        
                            <input class="form-control mt-4" type="email" id="emEmail" name="emEmail" placeholder="Email" required>

                            <input class="form-control mt-4" type="password" id="pwdSenha" name="pwdSenha" placeholder="Senha" required>

                            <div class="row mt-4">
                                <div class="col">
                                    <div class="checkbox">
                                        <input type="checkbox" id="ckb" name="ckb">
                                        <label id="txt_ckb" for="txt_ckb">Manter-se conectado</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <a href="#" id="recuperacao" onclick="exibirRecuperar()"> ESQUECI MINHA SENHA? </a>
                                </div>
                            </div>

                            <!-- botão "ENTRAR" que redireciona para uma página "menu.php" quando clicado -->
                            <button type="submit" class="botao mt-3" type="submit" id="entrar" name="entrar"> ENTRAR </button>

                            <div id="buttonG"></div>
                        </form>
                    </div>

                    <div id="divRecuperar" name="divRecuperar" class="d-none">
                        <!-- Formulário RECUPERAÇÃO DE SENHA, com um campo de entrada para o email-->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="formulario2" class="mt-4 d-flex flex-column justify-content-between">
                            <div>
                                <label id="txt_rec"> Para recuperarmos sua senha, informe seu endereço de e-mail. </label>
                                <br>
                                <br>

                                <input class="form-control" type="email" id="emEmail3" name="emEmail3" placeholder="Email" required>
                                <br>

                                <!-- botão "ENVIAR" que futuramente terá a funcionalidade de enviar um código de verificação para poder trocar a senha, quando clicado -->
                                <button class="botao" type="submit" id="enviar" name="enviar"> ENVIAR </button>
                            </div>

                            <div>
                                <button class="loginR mt-4" onclick="exibirLogin()">
                                    <i class="fa-solid fa-circle-left"></i>
                                    LOGIN
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div id="divCadastro" name="divCadastro"  class="d-none mt-4">
                        <!-- Formulário CADASTRO, com sete campos de entrada: nome, data de nascimento, estado, telefone, email, senha e confirmação de senha -->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="formulario3">
                            <input class="form-control" type="text" id="txtNome" placeholder="Nome completo" name="txtNome" value = "Nome Sobrenome Sobrenome" required>

                            <input class="form-control" type="number" id="date" name="date" placeholder="Data de Nascimento" onfocus="(this.type='date')" onblur="(this.type='text')" maxlength="8" value = "27112000" required>

                            <select class="form-control" id="sltEstado" name="sltEstado" required>
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
                                <option value="11" selected>Mato Grosso do Sul</option>
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

                            <input class="form-control" type="tel" id="telTelefone" name="telTelefone" placeholder="Telefone" maxlength="15" value = "(67) 98765-4321" required>

                            <input class="form-control" type="email" id="emEmail2" placeholder="Email" name="emEmail2" value = "nomesobrenome@gmail.com" required>

                            <input class="form-control" type="password" id="pwdSenha2" name="pwdSenha2" placeholder="Senha" minlength="6" maxlength="20" value = "Nome123" required>

                            <input class="form-control" type="password" id="pwdConfSenha" placeholder="Confirmar Senha" value = "Nome123" required>

                            <!-- botão "CADASTRAR" que redireciona para o login quando clicado -->
                            <button class="botao mt-3" type="submit" id="cadastrar" name="cadastrar" form="formulario3"> CADASTRAR </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>