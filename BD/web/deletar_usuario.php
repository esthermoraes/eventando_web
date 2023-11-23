<?php
include_once 'BD/web/usuario.php';

	if (isset($_POST['tchau'])) {
		// Recupera os dados do formulário
		$email = $_POST['email_usuario'];

		// Cria uma instância da classe Usuario
		$usuario = new Usuario();
		//$resultado = $usuario->delete($email);

		try{
			//deleta o usuario
			$resultado = $usuario->delete($email);
		}
		catch (Exception $e) {
			header("Location: index.php");
			exit;
		}
		if($resultado){
			header("Location: perfil.php");
			exit;
		}
	}
?>