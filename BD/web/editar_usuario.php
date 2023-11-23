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

		try {
			// Atualiza as informações do usuário
			$resultado = $usuario->update($email);
	
			// Se a atualização for bem-sucedida, redireciona usando JavaScript
			echo '<script>window.location.href = "perfil.php";</script>';
			exit;
		} 
		catch (Exception $e) {
			// Se ocorrer uma exceção, redireciona usando JavaScript
			echo '<script>window.location.href = "perfil_editavel.php";</script>';
			exit;
		}
	}
?>