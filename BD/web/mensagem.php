<?php
    //Se a sessão não existir, então inicia a sessão
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    //se a variável de sessão mensagem possuir existir, então deve mostrar a mensagem na tela.
    if(isset($_SESSION['mensagem'])): 
    ?>
        
    <script>
    //Mensagem de alerta javascript do materialize
        window.onload = function(){
            M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});
            
            
        };
    </script>

    <?php 	
    endif;
    session_unset(); //limpar a sessão
?>