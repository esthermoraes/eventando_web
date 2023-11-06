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
?>