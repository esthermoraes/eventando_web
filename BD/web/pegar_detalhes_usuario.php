<?php
    include_once 'BD/web/usuario.php';
	
	// Obtém informações do usuário da resposta da consulta ao banco de dados.
	$usuario = new Usuario();
	$resposta = $usuario->select($_SESSION['email_txt']);
	$email = $resposta['email_usuario'];
	$nome = $resposta['nome_usuario'];
	$data_nasc = $resposta['data_nasc_usuario'];
	$telefone = $resposta['telefone_usuario'];
	$estado = $resposta['estado_usuario'];
?>