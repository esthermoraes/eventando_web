<?php
    include_once 'BD/web/evento_online.php';
	
	// Obtém informações do usuário da resposta da consulta ao banco de dados.
	$evento = new EventoOnline();
    $id_evento = $_GET['id'];
	$resposta = $evento->select($id_evento);
    
    $id_evento = $resposta['id_evento'];
    $nome = $resposta['nome'];

    $img = $resposta['src_img'];
    $privacidade = $resposta['tipo_privacidade'];
    $objetivo = $resposta['objetivo'];
    $data_prevista = $resposta['data_prevista'];
    $horario = $resposta['horario'];

    $plataforma = $resposta['plataforma_evento'];
    $link = $resposta['link'];

    $atracoes = $resposta['atracoes'];
    $tipo_contato = $resposta['tipo_contato'];
    $contato = $resposta['contato'];
?>