<!-- CONEXÃO MOBILE -->
<?php
    $host = 'localhost'; // Endereço do servidor PostgreSQL
    $port = '5432'; // Porta do servidor PostgreSQL (normalmente 5432)
    $dbname = 'seu_banco_de_dados'; // Nome do banco de dados PostgreSQL
    $user = 'seu_usuario'; // Nome de usuário do PostgreSQL
    $password = 'sua_senha'; // Senha do PostgreSQL

    try {
        $conexao = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
        // Configura o PDO para lançar exceções em caso de erros
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Conexão bem-sucedida';
    } catch (PDOException $e) {
        echo 'Erro na conexão: ' . $e->getMessage();
    }
?>

<!-- CONEXÃO WEB -->
<?php
    //Conexão com banco de dados
    $servername = "localhost"; //endereço do servidor
    $username="root";
    $password="usbw";
    $db_name="crud";

    //pdo - somente orientado objeto
    $connect = mysqli_connect($servername,$username,$password,$db_name);

    //codifica com o caracteres ao manipular dados do banco de dados
    //mysqli_set_charset($connect, "utf8");

    if(mysqli_connect_error()):
        echo "Falha na conexão: ". mysqli_connect_error();
    endif;
?>