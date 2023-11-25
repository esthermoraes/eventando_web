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
		
			// Se a atualização for bem-sucedida, exibe um alerta e redireciona
			echo '<script>';
			echo 'var div = document.createElement("div");';
			echo 'div.innerHTML = "<strong>Seu perfil foi atualizado com sucesso!</strong>";';
			echo 'div.style.cssText = "position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #770089; color: white; padding: 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);";';
			echo 'document.body.appendChild(div);';
			echo 'setTimeout(function() { div.style.display = "none"; window.location.href = "perfil.php"; }, 3000);';  // Oculta o alerta após 3 segundos
			echo '</script>';
			exit;
		} 
		catch (Exception $e) {
			// Se ocorrer uma exceção, exibe um alerta
			echo "<script>alert('Erro ao atualizar. Tente novamente.');</script>";
			/*echo '<script>';
			echo 'var div = document.createElement("div");';
			echo 'div.innerHTML = "<strong>Erro ao atualizar. Tente novamente.</strong>";';
			echo 'div.style.cssText = "position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #c23934; color: white; padding: 20px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);";';
			echo 'document.body.appendChild(div);';
			echo 'setTimeout(function() { div.style.display = "none"; window.location.href = "perfil_editavel.php"; }, 3000);';  // Oculta o alerta após 3 segundos
			echo '</script>';*/
			exit;
		}
	}
?>