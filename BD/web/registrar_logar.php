<?php
    //Conexão
    include_once 'usuario.php';
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

        $usuario = new Usuario($Nomesanitized, $dataNascimento, $estado, $telefone, $Emailsanitized, $senhaSegura);	

        //insere o usuario

        try{
           $result =  $usuario->insert();
        }
        catch (Exception $e) {
             header('Location: login.php?Cadastro=false');
        }
        if($result):
           header('Location: login.php?Cadastro=true');
        endif;
    endif;	

    // Esta condição verifica se o formulário de login foi enviado
    if (isset($_POST["entrar"])) {
        $email1 = $_POST["emEmail"];
        $Emailsanitized1 = filter_var($email1, FILTER_SANITIZE_EMAIL);
        $senha1 = $_POST["pwdSenha"];
    
        $usuario = new Usuario();
        $tabela_usuario = $usuario->select($Emailsanitized1);
    
        if ($tabela_usuario !== false) {
            $linha = $tabela_usuario->fetch(PDO::FETCH_ASSOC);
            if ($linha) {
                $senha_db = $linha['senha'];
                if (password_verify($senha1, $senha_db)) {
                    $_SESSION['email_txt'] = $Emailsanitized1;
                    $_SESSION['nome_txt'] = $linha['nome'];
                    header('Location: menu.php?login_success=true');
                } 
                else {
                    echo "<script>alert('Credenciais de email ou senha inválidas. Tente novamente.');</script>";
                }
            } 
            else {
                echo "<script>alert('Credenciais de email ou senha inválidas. Tente novamente.');</script>";
            }
        } 
        else {
            echo "<script>alert('Erro no banco de dados. Tente novamente mais tarde.');</script>";
        }
    }
    
    // Esta condição verifica se o formulário de recuperação de senha foi enviado
    if (isset($_POST["enviar"])){
        // Recupere os dados do formulário RECUPERAR e aplique a sanitização
        $email3 = $_POST["emEmail3"];
        $Emailsanitized3 = sanitizeEmail($email3);
    }
?>