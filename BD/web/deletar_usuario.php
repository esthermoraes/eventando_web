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
			echo 'var div = document.createElement("div");';
			echo 'div.innerHTML = "<strong>Seu perfil foi deletado com sucesso!</strong>";';
			echo 'div.style.cssText = "position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #770089; color: white; padding: 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);";';
			echo 'document.body.appendChild(div);';
			echo 'setTimeout(function() { div.style.display = "none"; window.location.href = "index.php"; }, 3000);';  // Oculta o alerta após 3 segundos
			echo '</script>';
			exit;
		} 
		catch (Exception $e) {
			// Se ocorrer uma exceção, exibe um alerta
			echo "<script>alert('Erro ao deletar o perfil. Tente novamente.');</script>";
			/*echo '<script>';
			echo 'var div = document.createElement("div");';
			echo 'div.innerHTML = "<strong>Erro ao deletar o perfil. Tente novamente.</strong>";';
			echo 'div.style.cssText = "position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #c23934; color: white; padding: 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);";';
			echo 'document.body.appendChild(div);';
			echo 'setTimeout(function() { div.style.display = "none"; window.location.href = "perfil.php"; }, 3000);';  // Oculta o alerta após 3 segundos
			echo '</script>';*/
			exit;
		}		
	}
?>