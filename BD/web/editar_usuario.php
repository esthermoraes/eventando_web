<?php
	include_once 'BD/web/pegar_detalhes_usuario.php';

	if (isset($_POST['salvarEd'])) {
		// Recupera os dados do formulário
		$nome = $_POST['nome_usuario'];
		$data_nasc = $_POST['data_nasc_usuario']; 
		$estado = $_POST['estado_usuario']; 
		$telefone = $_POST['telefone_usuario']; 
	
		// Aqui você chama a função update passando os dados coletados
		$usuario = new Usuario($nome, $data_nasc, $estado, $telefone);
		// $resultado = $usuario->update($email);

		try{
			//Atualiza as informações do usuario
			$resultado = $usuario->update($email);
		}
		catch (Exception $e) {
			header("Location: perfil_editavel.php");
			exit;
		}
		if($resultado){
			header("Location: perfil.php");
			exit;
		}
	}
?>