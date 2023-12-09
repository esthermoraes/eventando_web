<?php
    include_once 'BD/web/evento_presencial.php';

	if (isset($_POST['deletar'])) {
		// Recupera os dados do formulário
		$id_evento = $_POST['id_evento'];

		// Cria uma instância da classe evento
		$evento = new EventoPresencial();

		try {
			// Deleta o usuário
			$resultado = $evento->delete($id_evento);
		
			// Se a exclusão for bem-sucedida, exibe um alerta e redireciona
			echo '<script>';
			echo 'var div = document.createElement("div");';
			echo 'div.innerHTML = "<strong>Seu evento foi deletado com sucesso!</strong>";';
			echo 'div.style.cssText = "position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #770089; color: white; padding: 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);";';
			echo 'document.body.appendChild(div);';
			echo 'setTimeout(function() { div.style.display = "none"; window.location.href = "menu.php"; }, 3000);';  // Oculta o alerta após 3 segundos
			echo '</script>';
			exit;
		} 
		catch (Exception $e) {
			// Se ocorrer uma exceção, exibe um alerta
			echo "<script>alert('Erro ao deletar o evento. Tente novamente.');</script>";
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