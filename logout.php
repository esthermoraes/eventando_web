<?php
    // Inicia a sessão ou recupera uma sessão existente
    session_start();
    // Destrói a sessão, removendo todas as variáveis de sessão
    session_destroy();
    // Redireciona o usuário para a página 'index.php'
    header('Location: index.php');
?>
