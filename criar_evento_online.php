<?php
    include_once 'BD/web/evento_online.php';

    //Se a sessão não existir, então inicia a sessão
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    function sanitizeString($input) {
        return preg_replace("/[^a-zA-Z0-9 ]/", "", $input);
    }

    // Verifica se foi enviado um arquivo
    if (isset($_POST["proximo_passo"])){
        $user = $_SESSION['email_txt'];
        // echo ("User: " . $user . "<br>");

        //$nome = $_POST["nome"];
        $nome = 'THE TOWN';
        // echo ("Nome: " . $nome . "<br>");

        $img_url = 'https://imgur.com/XQTprnS.jpg';
        // echo ("Imagem: " . $img_url . "<br>");

        $privacidade = $_POST["privacidade"];
        // echo ("Privacidade: " . $privacidade . "<br>");

        $objetivo = $_POST["objetivo"];
        // echo ("Objetivo: " . $objetivo . "<br>");

        $dataPrevista = $_POST["data_prevista"];
        // echo ("Data: " . $dataPrevista . "<br>");

        $horario = $_POST["hotario"];
        // echo ("Horario: " . $horario . "<br>");

        $atracoes = $_POST["atracoes"];
        // echo ("Atracoes: " . $atracoes . "<br>");

        $plataforma = $_POST["plataforma"];
        // echo ("Plataforma: " . $plataforma . "<br>");

        $link = $_POST["link"];
        // echo ("Link: " . $link . "<br>");

        $tipoContato = $_POST["tipo_contato"];
        // echo ("Tipo Contato: " . $tipoContato . "<br>");

        $contato = $_POST["contato"];
        // echo ("Contato: " . $contato . "<br>");

        $eventoO = new EventoOnline($nome, $objetivo, $dataPrevista, $horario, $img_url, $atracoes, $user, $link, $plataforma, $tipoContato, $contato);
        $eventoO->insert();
    }
    
    echo '<script>window.location.href = "visualizarEventoO.php";</script>';
    exit();
?>