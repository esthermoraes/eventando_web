<?php
include_once 'BD/web/usuario.php';

	if (isset($_POST['tchau'])) {
		// Recupera os dados do formulário
		$email = $_POST['email_usuario'];

		// Cria uma instância da classe Usuario
		$usuario = new Usuario();
		$resultado = $usuario->delete($email);

		// if ($resultado) {
		// 	header('Location: index.php');
		// } else {
		// 	header('Location: perfil.php');
		// }
	}
?>