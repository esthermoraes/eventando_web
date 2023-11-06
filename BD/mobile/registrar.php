<?php
	require_once('connect_mobile.php');

	// array de resposta
	$resposta = array();
	
	// verifica se todos os campos necessários foram enviados ao servidor
	if (isset($_POST['novo_nome']) && isset($_POST['nova_data_nasc']) && isset($_POST['novo_estado']) && isset($_POST['novo_telefone']) && isset($_POST['novo_email']) 
	&& isset($_POST['nova_senha'])) {
	
		// o método trim elimina caracteres especiais/ocultos da string
		$novo_nome = trim($_POST['novo_nome']);
		$nova_data_nasc = trim($_POST['nova_data_nasc']);
		$nova_data_nasc2 = str_replace("/", "-", $nova_data_nasc);
		$nova_data_nasc3 = date('Y-m-d', strtotime($nova_data_nasc2));
		$novo_estado = trim($_POST['novo_estado']);
		$novo_telefone = trim($_POST['novo_telefone']);
		$novo_email = trim($_POST['novo_email']);
		$nova_senha = trim($_POST['nova_senha']);
		
		// o bd não armazena diretamente a senha do usuário, mas sim 
		// um código hash que é gerado a partir da senha.
		$token = password_hash($nova_senha, PASSWORD_DEFAULT);
		
		// antes de registrar o novo usuário, verificamos se ele já
		// não existe.
		$consulta_usuario_existe = $db_con->prepare("SELECT email FROM USUARIO WHERE email ='$novo_email'");
		$consulta_usuario_existe->execute();
		if ($consulta_usuario_existe->rowCount() > 0) { 
			// se já existe um usuario para login
			// indicamos que a operação não teve sucesso e o motivo
			// no campo de erro.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Usuario ja cadastrado";
		}
		else {
			// se o usuário ainda não existe, inserimos ele no bd.
			$consulta = $db_con->prepare("INSERT INTO USUARIO(nome, data_nasc, email, FK_ESTADO_id_estado, senha) VALUES('$novo_nome',
			'$nova_data_nasc3', '$novo_email', '$novo_estado', '$token') RETURNING id_usuario");
		
			if ($consulta->execute()) {
				$novo_id_usuario = $db_con->lastInsertId();
		
				// usar $novo_id_usuario para inserir informações na tabela tem_tipo_contato_usuario
				$consulta2 = $db_con->prepare("INSERT INTO TEM_TIPO_CONTATO_USUARIO(FK_TIPO_CONTATO_id_tipo_contato, descricao, 
				FK_USUARIO_id_usuario) VALUES(2, '$novo_telefone', '$novo_id_usuario')");
		
				if ($consulta2->execute()) {
					$resposta["sucesso"] = 1;
				} 
				else {
					// se houve erro na consulta para a tabela de tem_tipo_contato_usuario, indicamos que não houve sucesso
					// na operação e o motivo no campo de erro.
					$resposta["sucesso"] = 0;
					$resposta["erro"] = "Erro na inserção na tabela TEM_TIPO_CONTATO_USUARIO: " . $consulta2->errorInfo()[2];
				}
			} 
			else {
				// se houve erro na consulta para a tabela de usuário, indicamos que não houve sucesso
				// na operação e o motivo no campo de erro.
				$resposta["sucesso"] = 0;
				$resposta["erro"] = "Erro na inserção na tabela USUARIO: " . $consulta->errorInfo()[2];
			}
		}
	}
	else {
		// se não foram enviados todos os parâmetros para o servidor, 
		// indicamos que não houve sucesso
		// na operação e o motivo no campo de erro.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "faltam parametros";
	}

	// A conexão com o bd sempre tem que ser fechada
	$db_con = null;

	// converte o array de resposta em uma string no formato JSON e 
	// imprime na tela.
	echo json_encode($resposta);
?>