<?php
	require_once('connect_mobile.php');
    require_once('autenticacao.php');
    
    // array de resposta
    $resposta = array();
    
    // verifica se o usuário conseguiu autenticar
    if(autenticar($db_con)){
        
        if (isset($_POST['nome_evento']) && isset($_POST['objetivo_evento']) && isset($_FILES['img_evento']) && 
        isset($_POST['data_prevista_evento']) && isset($_POST['horario_evento']) && isset($_POST['atracoes_evento']) 
        && isset($_POST['privacidade_evento']) && isset($_POST['criador_evento'])) {
	
		// o método trim elimina caracteres especiais/ocultos da string
		$nome_evento = trim($_POST['nome_evento']);
        $objetivo_evento = trim($_POST['objetivo_evento']);

        $filename = $_FILES['img_evento']['tmp_name'];
		$client_id="ce5d3a656e2aa51";
		$handle = fopen($filename, "r");
		$data = fread($handle, filesize($filename));
		$pvars   = array('image' => base64_encode($data));
		$timeout = 30;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
		curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
		$out = curl_exec($curl);
		curl_close ($curl);
		$pms = json_decode($out,true);
		$img_url=$pms['data']['link'];
        
		$data_prevista_evento = trim($_POST['nova_data_nasc']);
		$data_prevista_evento2 = str_replace("/", "-", $data_prevista_evento);
		$data_prevista_evento3 = date('Y-m-d', strtotime($data_prevista_evento2));

        $horario_evento = trim($_POST['horario_evento']);
		$privacidade_evento = trim($_POST['privacidade_evento']);
        $criador_evento = trim($_POST['criador_evento']);
        }
        else {
            // Se a requisição foi feita incorretamente, o cliente
            // recebe a chave "sucesso" com valor 0. A chave "erro" indica o
            // motivo da falha.
            $resposta["sucesso"] = 0;
            $resposta["erro"] = "Campos requeridos não preenchidos";
        }
    }
    else{
        // senha ou usuario nao confere
        $resposta["sucesso"] = 0;
        $resposta["error"] = "usuario ou senha não confere";
    }

    // Fecha a conexao com o BD
    $db_con = null;

    // Converte a resposta para o formato JSON.
    echo json_encode($resposta);
?>
