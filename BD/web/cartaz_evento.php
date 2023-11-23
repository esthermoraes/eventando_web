<?php
// print_r($_GET);
error_reporting(0);

$cor = $_GET['cor'];
$modelo = $_GET['modelo'];
$dados = $_SESSION['dados']

//$_SESSION  => os dados do evento estarão salvos na Session, caso esteja visualizando em um outro momento com o Banco de Dados, então recomendo o ID e fazer a consulta das informações no banco de dados

/*
 $_GET['id];
 BancoDados -> id -> consulta 
 */




?>

<div class="sopinha" style="display:flex;justify-content:center;align-items:center;">
    Prévia
</div>

<style>
    .sopinha {
        background: url('./img/convite1.png');
        height: 100%;
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>