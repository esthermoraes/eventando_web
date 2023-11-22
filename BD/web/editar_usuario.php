<?php
	include_once 'BD/web/pegar_detalhes_usuario.php';

	if (isset($_POST['salvarEd'])) {
		
		$nome = $_POST['nome_usuario'];
		$data_nasc = $_POST['data_nasc_usuario']; 
		$estado = $_POST['estado_usuario']; 
		$telefone = $_POST['telefone_usuario']; 
	
		// Aqui você chamaria sua função update passando os dados coletados
		// require_once 'BD/web/usuario.php';
		$usuario = new Usuario($nome, $data_nasc, $estado, $telefone);
		$resultado = $usuario->update($email);

		// try{
		// 	$resultado = $usuario->update($email);
		// }
		// catch (Exception $e) {
		// 	header("Location: perfil_editavel.php");
		// 	exit;
		// }
		// if($resultado){
		// 	header("Location: perfil.php");
		// 	exit;
		// }
	}
?>