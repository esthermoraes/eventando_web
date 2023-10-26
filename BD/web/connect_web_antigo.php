<?php
    //Conexão com banco de dados
    $servername = "db4free.net"; //endereço do servidor
    $username = "eventando";
    $password = "eventando2023";
    $db_name = "eventando";

    //pdo - somente orientado objeto
    $connect = mysqli_connect($servername,$username,$password,$db_name);

    //codifica com o caracteres ao manipular dados do banco de dados
    //mysqli_set_charset($connect, "utf8");

    if(mysqli_connect_error()):
        echo "Falha na conexão: ". mysqli_connect_error();
    endif;
?>