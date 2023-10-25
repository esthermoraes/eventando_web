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
    //Conexão
    include_once 'BD/web/usuario.php';
    //include_once 'BD/web/login_banco.php';

    // Iniciar a sessão
    session_start();

    // Função para limpar strings
    function sanitizeString($input) {
        return preg_replace("/[^a-zA-Z0-9 ]/", "", $input);
    }

    // Função para limpar endereços de e-mail
    function sanitizeEmail($input) {
        // Remove caracteres não permitidos
        return preg_replace('/[^a-zA-Z0-9.@]+/', '', $input);
    }   

    // Verifique se o formulário foi enviado
    if (isset($_POST["cadastrar"])):
        // Recupere os dados do formulário CADASTRAR e aplique a sanitização
        $nome = $_POST["txtNome"];
        $Nomesanitized = sanitizeString($nome);

        $dataNascimento = $_POST["date"];

        $estado = $_POST["sltEstado"];// Não é necessário sanitizar estado

        $telefone = filter_var($_POST["telTelefone"], FILTER_SANITIZE_NUMBER_INT);
        $telefone = preg_replace("/[^0-9]/", "", $_POST["telTelefone"]);

        $email = $_POST["emEmail2"];
        $Emailsanitized = sanitizeEmail($email);

        $senha = $_POST["pwdSenha2"];// Não é necessário sanitizar senhas
        $senhaSegura = password_hash($senha, PASSWORD_DEFAULT);

        $usuario = new Usuario();	
        
        //informa os dados do cliente
        $usuario->setNome($nome);
        $usuario->setSobrenome($sobrenome);
        $usuario->setEmail($email);
        $usuario->setIdade($idade);
        $usuario->setTipoCliente(1);
        
        //insere o cliente
        if($usuario->insert()):
            $_SESSION['mensagem'] = "Cadastro com sucesso!";
            header('Location: 30_consultar.php?sucesso');
        else:
            $_SESSION['mensagem'] = "Erro ao cadastrar!";		
            header('Location: 30_consultar?erro');
        endif;
    endif;	

    //     try{
    //         $estado = mysqli_real_escape_string($connect, $estado);
    //         $sql = "SELECT id_estado FROM ESTADO WHERE descricao = '$estado';";
    //         $result = mysqli_query($connect, $sql);
    //         if($result){
    //             if(mysqli_num_rows($result)>0){
    //                 $linha = mysqli_fetch_assoc($result);
    //                 $id_estado_db = $linha['id_estado'];
    //                 $Nomesanitized = mysqli_real_escape_string($connect, $Nomesanitized);
    //                 $Nomesanitized = strtoupper($Nomesanitized); // Converte o nome para maiúsculo
    //                 $Emailsanitized = mysqli_real_escape_string($connect, $Emailsanitized);
    //                 $dataNascimento = mysqli_real_escape_string($connect, $dataNascimento);
    //                 $sql = "INSERT INTO USUARIO(nome, email, data_nasc, senha, FK_ESTADO_id_estado) VALUE ('$Nomesanitized', '$Emailsanitized', 
    //                 '$dataNascimento', '$senhaSegura', '$id_estado_db');";
    //                 $result = mysqli_query($connect, $sql);
    //                 if($result){
    //                     $usuario_id = mysqli_insert_id($connect);
    //                     $telefone = mysqli_real_escape_string($connect, $telefone);
    //                     $sql = "INSERT INTO TEM_TIPO_CONTATO_USUARIO(fk_USUARIO_id_usuario, fk_TIPO_CONTATO_id_tipo_contato, descricao) 
    //                     VALUE ('$usuario_id', 2, '$telefone');";
    //                     $result = mysqli_query($connect, $sql);
    //                     if($result){
    //                         header('Location: login.php');
    //                     }
    //                 }
    //                 else{
    //                     $erro = "Desculpe, ocorreu um erro e não foi possível concluir o cadastro. Por favor, tente novamente.";
    //                     if (isset($erro)) {
    //                         echo "<script>alert('$erro')</script>";
    //                     };
    //                 }
    //             }
    //         }
    //         else{
    //             echo 'Conexão mal sucedida!';
    //         }
    //     }
    //     catch (Exception $erro) {
    //         // echo "Erro: " . $e->getMessage();
    //         $erro = "Desculpe, ocorreu um erro e não foi foi possível concluir o cadastro. Por favor, Tente novamente.";
    //         if (isset($erro)) {
    //             echo "<script>alert('$erro')</script>";
    //         };
    //     }
    // }

    // Esta condição verifica se o formulário de login foi enviado
    if (isset($_POST["entrar"])) {
        // Recupere os dados do formulário LOGIN e aplique a sanitização
        $email1 = $_POST["emEmail"];
        $Emailsanitized1 = sanitizeEmail($email1);
        
        $senha1 = $_POST["pwdSenha"]; // Não é necessário sanitizar senhas
    
        $Emailsanitized1 = mysqli_real_escape_string($connect, $Emailsanitized1);
        $sql = "SELECT senha, nome FROM USUARIO WHERE email = '$Emailsanitized1';";
        $result = mysqli_query($connect, $sql);
    
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $linha = mysqli_fetch_assoc($result);
                $senha_db = $linha['senha'];
                if (password_verify($senha1, $senha_db)) {
                    // $_SESSION['email_txt'] = $Emailsanitized1;
                    $_SESSION['nome_txt'] = $linha['nome'];

                    header('Location: menu.php?login_success=true');
                } 
                else {
                    echo "<script>alert('Lamentamos, ocorreu um erro. As credenciais de email ou senha que você forneceu são inválidas. 
                    Por favor, tente novamente.');</script>";
                }
            } 
            else {
                echo "<script>alert('Lamentamos, ocorreu um erro. As credenciais de email ou senha que você forneceu são inválidas. 
                Por favor, tente novamente.');</script>";
            }
        } 
        else {
            echo 'Conexão mal sucedida!';
        }
    }
    
    // Esta condição verifica se o formulário de recuperação de senha foi enviado
    if (isset($_POST["enviar"])){
        // Recupere os dados do formulário RECUPERAR e aplique a sanitização
        $email3 = $_POST["emEmail3"];
        $Emailsanitized3 = sanitizeEmail($email3);
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
                            <input class="form-control" type="text" id="txtNome" placeholder="Nome completo" name="txtNome" required>

                            <input class="form-control" type="text" id="date" name="date" placeholder="Data de Nascimento" onfocus="(this.type='date')" onblur="(this.type='text')" maxlength="8" required>

                            <select class="form-control" id="sltEstado" name="sltEstado" required>
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

                            <input class="form-control" type="tel" id="telTelefone" name="telTelefone" placeholder="Telefone" maxlength="15" required>

                            <input class="form-control" type="email" id="emEmail2" placeholder="Email" name="emEmail2" required>

                            <input class="form-control" type="password" id="pwdSenha2" name="pwdSenha2" placeholder="Senha" minlength="6" maxlength="20" required>

                            <input class="form-control" type="password" id="pwdConfSenha" placeholder="Confirmar Senha" required>

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