<?php
    // Abre uma conexao com o BD.
    $host = "host = flora.db.elephantsql.com;"; // endereço do servidor PostgreSQL
    $port = "port = 5432;"; // A porta padrão do PostgreSQL
    $dbname = "dbname = iqtdtttt;"; // nome do banco de dados é o mesmo que o nome de usuário
    $dbuser = "iqtdtttt"; // nome de usuário
    $dbpassword = "mUCUlwPPX-APw6ctYt0SC_FgDxWvvOrv";


    // para conectar ao mysql, substitua pgsql por mysql
    $db_con= new PDO('pgsql:' . $host . $port . $dbname, $dbuser, $dbpassword);

    //alguns atributos de performance.
    $db_con->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $db_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>