<?php
    include_once 'BD/web/evento_presencial.php';
	
	// Obtém informações do usuário da resposta da consulta ao banco de dados.
	$evento = new EventoPresencial();
	$resposta = $evento->select(167);
    
    $nome = $resposta['nome'];

    $img = $resposta['src_img'];
    $privacidade = $resposta['privacidade_restrita'];
    $objetivo = $resposta['objetivo'];
    $data_prevista = $resposta['data_prevista'];
    $horario = $resposta['horario'];

    $cep = $resposta['cep'];
    $estado = $resposta['estado'];
    $cidade = $resposta['cidade'];
    $bairro = $resposta['bairro'];
    $tipoLogradouro = $resposta['tipo_logradouro'];
    $logradouro = $resposta['logradouro'];
    $numero = $resposta['numero'];

    $atracoes = $resposta['atracoes'];
    $buffet = $resposta['buffet'];
    $tipo_contato = $resposta['tipo_contato_evento'];
    $contato = $resposta['contato'];
?>