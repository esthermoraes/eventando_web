<?php
    //Conexão
    include_once 'usuario.php';

    // Esta condição verifica se o formulário de login foi enviado
    if (isset($_POST["entrar"])) {
        // recupera os valores dos campos preenchidos e sanitiza o email
        $email1 = $_POST["emEmail"];
        $Emailsanitized1 = filter_var($email1, FILTER_SANITIZE_EMAIL);
        $senha1 = $_POST["pwdSenha"];

        // Cria uma instância da classe Usuario
        $usuario = new Usuario();
        // seleciona o usuario a partir do email
        $tabela_usuario = $usuario->select($Emailsanitized1);
    
        if ($tabela_usuario !== false) {
            $senha_db = $tabela_usuario['senha_usuario'];
            // Verifica se a senha fornecida pelo usuário corresponde à senha armazenada no banco de dados (após a aplicação de hash).
            if (password_verify($senha1, $senha_db)) {
                $_SESSION['email_txt'] = $Emailsanitized1;
                $_SESSION['nome_txt'] = $tabela_usuario['nome_usuario'];
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
    
    // Esta condição verifica se o formulário de recuperação de senha foi enviado
    if (isset($_POST["enviar"])){
        // Recupere os dados do formulário RECUPERAR e aplique a sanitização
        $email3 = $_POST["emEmail3"];
        $Emailsanitized3 = sanitizeEmail($email3);
    }
?>