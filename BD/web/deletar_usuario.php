<?php
    include_once 'BD/web/usuario.php';

	if (isset($_POST['tchau'])) {
		// Recupera os dados do formulário
        $email = $_POST['email_usuario'];
	
		// Aqui você chamaria sua função update passando os dados coletados
		// require_once 'BD/web/usuario.php';
		$usuario = new Usuario();
		$resultado = $usuario->delete($email);

		if($resultado){
			header('Location: index.php');
		}
		else{
			header('Location: perfil.php');
		}
	}
?>