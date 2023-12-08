<?php
    include_once 'BD/web/evento_online.php';
	
	// Obtém informações do usuário da resposta da consulta ao banco de dados.
	$evento = new Evento();
	$resposta = $evento->select(14);
    
    $nome = $resposta['nome'];
    $img = $resposta['src_img'];
    $privacidade = $resposta['privacidade_restrita'];
    $data_prevista = $resposta['data_prevista'];
    $plataforma = $resposta['nome_usuario'];
    $link = $resposta['nome_usuario'];
    $tipo_contato = $resposta['nome_usuario'];
    $contato = $resposta['nome_usuario'];


	$email = $resposta['email_usuario'];
	$nome = $resposta['nome_usuario'];
	$data_nasc = $resposta['data_nasc_usuario'];
	$telefone = $resposta['telefone_usuario'];
	$estado = $resposta['estado_usuario'];

    $resposta['id_evento'] = $evento['id_evento'];
    $resposta["nome"] = $evento['nome'];
    $resposta["privacidade_restrita"] = $evento['privacidade_restrita'];
    $resposta["src_img"] = $evento['src_img'];
    $resposta["data_prevista"] = $evento['data_prevista'];
    $resposta["horario"] = $evento['horario'];
    $resposta["objetivo"] = $evento['objetivo'];
    $resposta["atracoes"] = $evento['atracoes'];
    $resposta["link"] = $evento['link']; 
    $resposta['plataforma_evento'] = $plataforma['plataforma'];
    $resposta['tipo_contato_evento'] = $tipo_contato['tipo_contato'];
    $resposta["contato"] = $evento['contato'];
?>