<?php
    include_once 'BD/web/usuario.php';

	if (isset($_POST['deletarP'])) {
		// Recupera os dados do formulário
		$nome = $_POST['nome_usuario']; 
		$data_nasc = $_POST['data_nasc_usuario']; 
		$estado = $_POST['estado_usuario']; 
		$telefone = $_POST['telefone_usuario']; 
        $email = $_POST['email_usuario'];
        $senha = $_POST['senha_usuario'];
	
		// Aqui você chamaria sua função update passando os dados coletados
		// require_once 'BD/web/usuario.php';
		$usuario = new Usuario($nome, $data_nasc, $estado, $telefone, $email, $senha);
		$resultado = $usuario->delete($email);

		// try{
		// 	$resultado = $usuario->update($email);
		// }
		// catch (Exception $e) {
		// 	header("Location: perfil_editavel.php?");
		// }
		// if($resultado):
		// 	header("Location: perfil.php?");
		// endif;
	}
?>