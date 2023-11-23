<?php
include_once 'BD/web/usuario.php';

	if (isset($_POST['tchau'])) {
		// Recupera os dados do formulário
		$email = $_POST['email_usuario'];

		// Cria uma instância da classe Usuario
		$usuario = new Usuario();

		try {
			//deleta o usuario
			$resultado = $usuario->delete($email);
	
			// Se o delete for bem-sucedido, redireciona usando JavaScript
			echo '<script>window.location.href = "index.php";</script>';
			exit;
		} 
		catch (Exception $e) {
			// Se ocorrer uma exceção, redireciona usando JavaScript
			echo '<script>window.location.href = "perfil.php";</script>';
			exit;
		}
	}
?>