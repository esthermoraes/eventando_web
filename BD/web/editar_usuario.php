<?php
    include_once 'BD/web/usuario.php';

	$usuario = new Usuario();
	$resposta = $usuario->select($_SESSION['email_txt']);
	$email = $resposta['email_usuario'];
	$nome = $resposta['nome_usuario'];
	$data_nasc = $resposta['data_nasc_usuario'];
	$telefone = $resposta['telefone_usuario'];
	$estado = $resposta['estado_usuario'];


	if (isset($_POST['salvarEd'])) {
		// Recupera os dados do formulário
		$nome = $_POST['nome_usuario']; // Exemplo de um campo de nome
		$data_nasc = $_POST['data_nasc_usuario']; // Exemplo de um campo de data de nascimento
		$estado = $_POST['estado_usuario']; // Exemplo de um campo de estado
		$telefone = $_POST['telefone_usuario']; // Exemplo de um campo de telefone
	
		// Aqui você chamaria sua função update passando os dados coletados
		// require_once 'BD/web/usuario.php';
		$usuario = new Usuario($nome, $data_nasc, $estado, $telefone);
		$resultado = $usuario->update($email);

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