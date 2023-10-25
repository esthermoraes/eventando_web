<?php

require_once 'crud.php';

/*************************************************************
Objetivo: Classe responsável por representar todas as operações com o cliente do negócio.

Atributos:
$nome- nome do cliente
$sobrenome - sobrenome do cliente
$email - email do cliente
$idade - idade do cliente

Métodos:
insert - insere um cliente na tabela cliente
update - atualiza um cliente na tabela cliente

setNome - Atribui um nome ao cliente
getNome - Retorna o nome do cliente
setSobrenome - Atribui um sobrenome ao cliente
getSobrenome - Retorna o sobrenome ao cliente
setEmail - Atribui um email ao cliente
getEmail - Retorna o email do cliente
setIdade - Atribui uma idade ao cliente
getIdade - Retorn a idade do cliente
*************************************************************/

class Usuario extends CRUD
{
    protected $table = 'USUARIO';

    private $email;
    private $senha;
    private $nome;
    private $data_nasc;
    private $FK_ESTADO_id_estado;
    private $telefone;

    public function __construct($email, $senha, $nome, $data_nasc, $FK_ESTADO_id_estado, $telefone = null){
        $this->email = $email;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->data_nasc = $data_nasc;
        $this->FK_ESTADO_id_estado = $FK_ESTADO_id_estado;
        $this->telefone = $telefone;
    }

    public function insert(){
        $sql = "INSERT INTO $this->table (email, senha, nome, data_nasc, FK_ESTADO_id_estado) VALUES (:email, :senha, :nome, :data_nasc, 
        :FK_ESTADO_id_estado)";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':data_nasc', $this->data_nasc);
        $stmt->bindParam(':FK_ESTADO_id_estado', $this->FK_ESTADO_id_estado);

        $result = $stmt->execute();

        if ($result) {
            // Obtém o último ID inserido usando a instância PDO
            $pdo = Database::getInstance();
            $novo_id_usuario = $pdo->lastInsertId();

            $fk_TIPO_CONTATO_id_tipo_contato = 2;

            $sql = "INSERT INTO TEM_TIPO_CONTATO_USUARIO (fk_USUARIO_id_usuario, fk_TIPO_CONTATO_id_tipo_contato, descricao) 
            VALUES (:novo_id_usuario, :fk_TIPO_CONTATO_id_tipo_contato, :telefone)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':novo_id_usuario', $novo_id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':fk_TIPO_CONTATO_id_tipo_contato', $fk_TIPO_CONTATO_id_tipo_contato, PDO::PARAM_INT);
            $stmt->bindParam(':telefone', $this->telefone);

            return $stmt->execute();
        }

        return false;
    }

    public function update($id)
    {
        $sql = "UPDATE $this->table SET nome = :nome, FK_ESTADO_id_estado = :FK_ESTADO_id_estado, data_nasc = :data_nasc WHERE id = :id";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":data_nasc", $this->data_nasc);
        $stmt->bindParam(":FK_ESTADO_id_estado", $this->FK_ESTADO_id_estado);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>