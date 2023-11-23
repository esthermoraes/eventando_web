<?php
error_reporting(0);

include_once 'header.php';

// AQUI NA SESSION TERÁ OS DADOS DOS FORMULARIOS, TODOS SEPARADOS EM $SESSION[passo_1] + $SESSION[passo_2] + $SESSION[passo_3]
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// AQUI PRECISA FAZER AS INSERÇÕES NO BANCO DE DADOS (vai precisar criar umas colunas no banco de dados)


// DELETA VARIAVEIS QUE NÃO SERÃO MAIS UTILIZADAS
unset($_SESSION['passo_1']);

unset($_SESSION['passo_2']);

unset($_SESSION['passo_3']);

header("Location: ./menu.php");


?>