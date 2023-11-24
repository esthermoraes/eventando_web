<?php
include_once 'BD/web/usuario.php';

	if (isset($_POST['tchau'])) {
		// Recupera os dados do formulário
		$email = $_POST['email_usuario'];

		// Cria uma instância da classe Usuario
		$usuario = new Usuario();

		try {
			// Deleta o usuário
			$resultado = $usuario->delete($email);
		
			// Se a exclusão for bem-sucedida, exibe um alerta e redireciona
			echo '<script>';
			echo 'alert("Seu perfil foi deletado com sucesso!");';
			echo 'window.location.href = "index.php";';
			echo '</script>';
			exit;
		} 
		catch (Exception $e) {
			// Se ocorrer uma exceção, exibe um alerta e redireciona
			echo '<script>';
			echo 'alert("Erro ao deletar o perfil. Tente novamente.");';
			echo 'window.location.href = "perfil.php";';
			echo '</script>';
			exit;
		}		
	}
?>