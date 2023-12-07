<?php
require_once('connect_mobile.php');
require_once('autenticacao.php');

// array de resposta
$resposta = array();

// verifica se o usuário conseguiu autenticar
if (autenticar($db_con)) {

    if (isset($_GET["evento_id"])) {

        $evento_id = $_GET['evento_id'];

        // Certifique-se de que o evento_id não está vazio antes de prosseguir
        if (!empty($evento_id)) {

            // Use parâmetros vinculados para evitar problemas de segurança e interpolação
            $consulta = $db_con->prepare("SELECT * FROM EVENTO_ONLINE
                INNER JOIN EVENTO ON EVENTO_ONLINE.FK_EVENTO_id_evento = EVENTO.id_evento
                INNER JOIN POSSUI_TIPO_CONTATO_EVENTO ON EVENTO.id_evento = POSSUI_TIPO_CONTATO_EVENTO.FK_EVENTO_id_evento
                WHERE EVENTO_ONLINE.FK_EVENTO_id_evento = :evento_id");

            $consulta->bindParam(':evento_id', $evento_id, PDO::PARAM_INT);

            if ($consulta->execute()) {
                // Restante do código permanece inalterado
                // ...
            } else {
                $resposta["sucesso"] = 0;
                $resposta["erro"] = "Erro no BD: " . $consulta->errorInfo()[2];
            }
        } else {
            // Se o evento_id está vazio
            $resposta["sucesso"] = 0;
            $resposta["erro"] = "Campo evento_id está vazio";
        }
    } else {
        // Se a requisição foi feita incorretamente
        $resposta["sucesso"] = 0;
        $resposta["erro"] = "Campo requerido não preenchido";
    }
} else {
    // Se a autenticação falhar
    $resposta["sucesso"] = 0;
    $resposta["erro"] = "Email ou senha não confere";
}

// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>

