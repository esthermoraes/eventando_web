<?php
	require_once('connect_mobile.php');
    require_once('autenticacao.php');
    
    // array de resposta
    $resposta = array();
    
    // verifica se o usuário conseguiu autenticar
    if(autenticar($db_con)){
        // Verifica se o parametro email foi enviado na requisicao
        if (isset($_GET["evento_id"])){
            
            // Aqui sao obtidos os parametros
            $evento_id = $_GET['evento_id'];

            $consulta = $db_con->prepare("SELECT * FROM EVENTO_PRESENCIAL
            INNER JOIN EVENTO ON EVENTO_PRESENCIAL.FK_EVENTO_id_evento = EVENTO.id_evento
            INNER JOIN POSSUI_TIPO_CONTATO_EVENTO ON EVENTO.id_evento = POSSUI_TIPO_CONTATO_EVENTO.FK_EVENTO_id_evento
            WHERE EVENTO_PRESENCIAL.FK_EVENTO_id_evento = '$evento_id';");
            if ($consulta->execute()) {
                $linha = $consulta->fetch(PDO::FETCH_ASSOC);
                $nome = $linha['nome'];
                $privacidade_restrita = $linha['privacidade_restrita'];
                $src_img = $linha['src_img'];
                $data_prevista = $linha['data_prevista'];
                $horario = $linha['horario'];
                $objetivo = $linha['objetivo'];
                $atracoes = $linha['atracoes'];
                $FK_LOCALIZACAO_id_localizacao = $linha['fk_localizacao_id_localizacao'];
                $FK_buffet_buffet_PK = $linha['fk_buffet_buffet_pk'];
                $contato = $linha['contato'];
                $fk_TIPO_CONTATO_id_tipo_contato = $linha['fk_tipo_contato_id_tipo_contato'];

                if($nome == 'NULL' || $nome == ""){
                    $consulta = $db_con->prepare("SELECT * FROM EVENTO_PRESENCIAL
                    INNER JOIN EVENTO ON EVENTO_PRESENCIAL.FK_EVENTO_id_evento = EVENTO.id_evento
                    WHERE EVENTO_PRESENCIAL.FK_EVENTO_id_evento = '$evento_id';");

                    if ($consulta->execute()) {
                        $linha = $consulta->fetch(PDO::FETCH_ASSOC);
                        $nome = $linha['nome'];
                        $privacidade_restrita = $linha['privacidade_restrita'];
                        $src_img = $linha['src_img'];
                        $data_prevista = $linha['data_prevista'];
                        $horario = $linha['horario'];
                        $objetivo = $linha['objetivo'];
                        $atracoes = $linha['atracoes'];
                        $FK_LOCALIZACAO_id_localizacao = $linha['fk_localizacao_id_localizacao'];
                        $FK_buffet_buffet_PK = $linha['fk_buffet_buffet_pk'];

                        $consulta2 = $db_con->prepare("SELECT * FROM LOCALIZACAO WHERE id_localizacao = '$FK_LOCALIZACAO_id_localizacao'");
                        if($consulta2->execute()){
                            $linha2 = $consulta2->fetch(PDO::FETCH_ASSOC);
                            $numero = $linha2['numero'];
                            $logradouro = $linha2['logradouro'];
                            $cep = $linha2['cep'];
                            $FK_TIPO_LOGRADOURO_id_tipo_logradouro = $linha2['fk_tipo_logradouro_id_tipo_logradouro'];
                            $FK_BAIRRO_id_bairro = $linha2['fk_bairro_id_bairro'];

                            $consulta3 = $db_con->prepare("SELECT tipo_logradouro FROM TIPO_LOGRADOURO WHERE id_tipo_logradouro = 
                            '$FK_TIPO_LOGRADOURO_id_tipo_logradouro'");
                            if($consulta3->execute()){
                                $linha3 = $consulta3->fetch(PDO::FETCH_ASSOC);
                                $tipo_logradouro = $linha3["tipo_logradouro"];

                                $consulta4 = $db_con->prepare("SELECT bairro FROM BAIRRO WHERE id_bairro = '$FK_BAIRRO_id_bairro'");
                                if($consulta4->execute()){
                                    $linha4 = $consulta4->fetch(PDO::FETCH_ASSOC);
                                    $bairro = $linha4["bairro"];

                                    $consulta5 = $db_con->prepare("SELECT FK_CIDADE_id_cidade FROM POSSUI_BAIRRO_CIDADE WHERE 
                                    FK_BAIRRO_id_bairro = '$FK_BAIRRO_id_bairro'");
                                    if($consulta5->execute()){
                                        $linha5 = $consulta5->fetch(PDO::FETCH_ASSOC);
                                        $cidade_id = $linha5["FK_CIDADE_id_cidade"];
					                    echo $cidade_id;
                                        $consulta6 = $db_con->prepare("SELECT cidade FROM CIDADE WHERE id_cidade = :cidade_id");
					                    $consulta6->bindParam(':cidade_id', $cidade_id, PDO::PARAM_INT);
                                        if($consulta6->execute()){
                                            $linha6 = $consulta6->fetch(PDO::FETCH_ASSOC);
                                            $cidade = $linha6["cidade"];

                                            $consulta7 = $db_con->prepare("SELECT FK_ESTADO_id_estado FROM POSSUI_CIDADE_ESTADO WHERE FK_CIDADE_id_cidade = :cidade_id");
					                        $consulta7->bindParam(':cidade_id', $cidade_id);
                                            if($consulta7->execute()){
                                                $linha7 = $consulta7->fetch(PDO::FETCH_ASSOC);
                                                $estado_id = $linha7["FK_ESTADO_id_estado"];

                                                $consulta8 = $db_con->prepare("SELECT estado FROM ESTADO WHERE id_estado = :estado_id");
                                                $consulta8->bindParam(':estado_id', $estado_id, PDO::PARAM_INT);
                                                if ($consulta8->execute()) {
                                                    $linha8 = $consulta8->fetch(PDO::FETCH_ASSOC);
                                                    $estado = $linha8["estado"];
                                                    $contato = "sem contato";
                                                    $tipo_contato = "sem tipo";
                                                    $atracoes = "sem atrações";
                                                    $buffet = "sem buffet";
                                                    $resposta["sucesso"] = 1;
                                                    $resposta["nome"] = $nome;
                                                    $resposta["privacidade_restrita"] = $privacidade_restrita;
                                                    $resposta["src_img"] = $src_img;
                                                    $resposta["data_prevista"] = $data_prevista;
                                                    $resposta["horario"] = $horario;
                                                    $resposta["objetivo"] = $objetivo;
                                                    $resposta["atracoes"] = $atracoes;
                                                    $resposta["numero"] = $numero;
                                                    $resposta["logradouro"] = $logradouro;
                                                    $resposta["cep"] = $cep;
                                                    $resposta["tipo_logradouro"] = $tipo_logradouro;
                                                    $resposta["bairro"] = $bairro;
                                                    $resposta["cidade"] = $cidade;
                                                    $resposta["estado"] = $estado;
                                                    $resposta["buffet"] = $buffet;
                                                    $resposta["tipo_contato"] = $tipo_contato;
                                                    $resposta["contato"] = $contato;
                                                }
                                                else{
                                                    $resposta["sucesso"] = 0;
                                                    $resposta["erro"] = "Erro no BD: " . $consulta8->errorInfo()[2];
                                                }
                                            }
                                            else{
                                                $resposta["sucesso"] = 0;
                                                $resposta["erro"] = "Erro no BD: " . $consulta7->errorInfo()[2]; 
                                            }
                                        }
                                        else{
                                            $resposta["sucesso"] = 0;
                                            $resposta["erro"] = "Erro no BD: " . $consulta6->errorInfo()[2];
                                        }
                                    }
                                    else{
                                        $resposta["sucesso"] = 0;
                                        $resposta["erro"] = "Erro no BD: " . $consulta5->errorInfo()[2];
                                    }
                                }
                                else{
                                    $resposta["sucesso"] = 0;
                                    $resposta["erro"] = "Erro no BD: " . $consulta4->errorInfo()[2];
                                }
                            }
                            else{
                                $resposta["sucesso"] = 0;
                                $resposta["erro"] = "Erro no BD: " . $consulta3->errorInfo()[2];
                            }
                        }
                        else{
                            $resposta["sucesso"] = 0;
                            $resposta["erro"] = "Erro no BD: " . $consulta2->errorInfo()[2];
                        }
                    }
                    else{
                        $resposta["sucesso"] = 0;
                        $resposta["erro"] = "Erro no BD: " . $consulta->errorInfo()[2];
                    }
                }
                else {
                    $consulta2 = $db_con->prepare("SELECT
                        E.id_evento,
                        E.nome,
                        CAST(E.privacidade_restrita AS BOOLEAN) AS privacidade_restrita,
                        E.src_img,
                        E.data_prevista,
                        E.horario,    
                        E.objetivo,   
                        E.atracoes,   
                        EP.FK_LOCALIZACAO_id_localizacao AS evento_presencial,
                        L.logradouro,
                        L.numero,
                        TL.tipo_logradouro,
                        BC.bairro,
                        C.cidade,
                        ES.estado,
                        PTC.FK_TIPO_CONTATO_id_tipo_contato AS id_tipo_contato,
                        TC.tipo_contato,
                        B.buffet,
                        L.cep,
                        PTC.contato
                    FROM
                        EVENTO E
                    LEFT JOIN 
                        EVENTO_PRESENCIAL EP ON E.id_evento = EP.FK_EVENTO_id_evento
                    LEFT JOIN 
                        POSSUI_TIPO_CONTATO_EVENTO PTC ON E.id_evento = PTC.FK_EVENTO_id_evento
                    LEFT JOIN 
                        TIPO_CONTATO TC ON PTC.FK_TIPO_CONTATO_id_tipo_contato = TC.id_tipo_contato
                    LEFT JOIN 
                        LOCALIZACAO L ON EP.FK_LOCALIZACAO_id_localizacao = L.id_localizacao
                    LEFT JOIN 
                        TIPO_LOGRADOURO TL ON L.FK_TIPO_LOGRADOURO_id_tipo_logradouro = TL.id_tipo_logradouro
                    LEFT JOIN 
                        POSSUI_BAIRRO_CIDADE PBC ON L.FK_BAIRRO_id_bairro = PBC.FK_BAIRRO_id_bairro
                    LEFT JOIN 
                        BAIRRO BC ON PBC.FK_BAIRRO_id_bairro = BC.id_bairro
                    LEFT JOIN 
                        POSSUI_CIDADE_ESTADO PCE ON PBC.FK_CIDADE_id_cidade = PCE.FK_CIDADE_id_cidade
                    LEFT JOIN 
                        CIDADE C ON PCE.FK_CIDADE_id_cidade = C.id_cidade
                    LEFT JOIN 
                        ESTADO ES ON PCE.FK_ESTADO_id_estado = ES.id_estado
                    LEFT JOIN 
                        BUFFET B ON EP.fk_buffet_buffet_pk = B.buffet_pk
                    WHERE 
                        E.id_evento = ?");
                
                    $consulta->bindParam(1, $id);
                
                    if ($consulta->execute()) {
                        $evento = $consulta->fetch(PDO::FETCH_ASSOC);
                
                        if ($evento === false) {
                            return false;
                        }
                
                        $resposta['id_evento'] = $evento['id_evento'];
                        $resposta["nome"] = $evento['nome'];
                        $resposta["privacidade_restrita"] = $evento['privacidade_restrita'];
                        $resposta["src_img"] = $evento['src_img'];
                        $resposta["data_prevista"] = $evento['data_prevista'];
                        $resposta["objetivo"] = $evento['objetivo'];
                        $resposta["horario"] = $evento['horario'];
                        $resposta["atracoes"] = !empty($evento['atracoes']) ? $evento['atracoes'] : 'sem atrações';
                        $resposta['buffet'] = !empty($evento['buffet']) ? $evento['buffet'] : 'sem buffet';
                        $resposta['cep'] = $evento['cep'];
                        $resposta['estado'] = $evento['estado'];
                        $resposta['cidade'] = $evento['cidade'];
                        $resposta['bairro'] = $evento['bairro'];
                        $resposta['tipo_logradouro'] = $evento['tipo_logradouro'];
                        $resposta['logradouro'] = $evento['logradouro'];
                        $resposta['numero'] = $evento['numero'];
                        $resposta['tipo_contato'] = isset($evento['tipo_contato']) ? $evento['tipo_contato'] : 'sem tipo';
                        $resposta["contato"] = isset($evento['contato']) ? $evento['contato'] : 'sem contato';
                    }
                    else{
                        $resposta["sucesso"] = 0;
                        $resposta["erro"] = "Erro no BD: " . $consulta2->errorInfo()[2];
                    }
                }  
            }
            else{
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Erro no BD: " . $consulta->errorInfo()[2];
            }
        }
        else{
            // Se a requisicao foi feita incorretamente, ou seja, os parametros 
            // nao foram enviados corretamente para o servidor, o usuario 
            // recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
            // motivo da falha.
            $resposta["sucesso"] = 0;
            $resposta["erro"] = "Campo requerido nao preenchido";
        }
}
    else{
        //senha ou email nao confere
        $resposta["sucesso"] = 0;
        $resposta["error"] = "Email ou senha nao confere";
    }

    // Fecha a conexao com o BD
    $db_con = null;

    // Converte a resposta para o formato JSON.
    echo json_encode($resposta);

?>
