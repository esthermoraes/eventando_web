<?php
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['txtNome'];
        $telefone = $_POST['telTelefone'];
        $email = $_POST['emEmail2'];

        $erros = [];

        $nome = filter_input(INPUT_POST, 'txtNome', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefone = filter_input(INPUT_POST, 'telTelefone', FILTER_SANITIZE_REGEXP);
        $email = filter_input(INPUT_POST, 'emEmail2', FILTER_SANITIZE_EMAIL);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erros[] = "E-mail inválido";
        }

        if(!filter_var($telefone, FILTER_VALIDATE_REGEXP)){
            $erros[] = "Telefone inválido";
        }

        if(!empty($erros)){
            foreach($erros as $erro){
                echo "<p>$erro<p>";
            }
        } 
        else {
            echo "<p>Dados corretos.</p>";
        }
    }
    else{
        echo "<p>Não encontrou</p>" . $_POST['txtNome'];
    }
?>

<?php
    if (isset($_POST['cadastrar'])):
        echo "Enviou <br>";
        
        $nome = $_POST['txtNome'];
        echo $_POST['txtNome'];
    endif;
?>

<?php
    if(isset($_POST['entrar'])){
        $email = $_POST['emEmail'];

        $erros = [];

        $email = filter_input(INPUT_POST, 'emEmail', FILTER_SANITIZE_EMAIL);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erros[] = "E-mail inválido";
        }

        if(!empty($erros)){
            foreach($erros as $erro){
                echo "<script type='javascript'>alert('Bem vindo ao Eventando!');";
                echo "javascript:window.location='menu.php';</script>";
            }
        } 
        else {
            echo "<script type='javascript'>alert('Dados incorretos, favor tentar novamente!!');";
            echo "javascript:window.location='login.php';</script>";
        }
    }
    else{
        echo "<script type='javascript'>alert('Não encontrou!');";
        echo "javascript:window.location='login.php';</script>";
    }
?>