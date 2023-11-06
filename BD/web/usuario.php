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

    class Usuario extends CRUD{
        protected $table = 'USUARIO';
        private $nome;
        private $data_nasc;
        private $FK_ESTADO_id_estado;
        private $telefone;
        private $email;
        private $senha;

        public function __construct($nome = null, $data_nasc = null, $FK_ESTADO_id_estado = null, $telefone = null, $email = null, $senha = null){
            $this->nome = $nome;
            $this->data_nasc = $data_nasc;
            $this->FK_ESTADO_id_estado = $FK_ESTADO_id_estado;
            $this->telefone = $telefone;
            $this->email = $email;
            $this->senha = $senha;
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

            // $result;

            // try{
            //     $result = $stmt->execute();
            // }
            // catch (Exception $e) {
            //     echo "Ocorreu uma exceção: " . $e->getMessage();
            //     throw $e;
            //     return false;
            // }

            if ($result){
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

        public function update($id){
            $sql = "UPDATE $this->table SET nome = :nome, FK_ESTADO_id_estado = :FK_ESTADO_id_estado, data_nasc = :data_nasc 
            WHERE id = :id";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":data_nasc", $this->data_nasc);
            $stmt->bindParam(":FK_ESTADO_id_estado", $this->FK_ESTADO_id_estado);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public function update2($id) {
            // Consulta para obter o ID do registro antes do UPDATE
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("SELECT id FROM $this->table WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $originalId = $stmt->fetchColumn(); // Armazena o ID original
        
            $sql = "UPDATE $this->table SET nome = :nome, FK_ESTADO_id_estado = :FK_ESTADO_id_estado, data_nasc = :data_nasc 
            WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":data_nasc", $this->data_nasc);
            $stmt->bindParam(":FK_ESTADO_id_estado", $this->FK_ESTADO_id_estado);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $stmt->execute();
        
            if ($result) {
                // Use o ID original que foi armazenado previamente
                $sql = "UPDATE TEM_TIPO_CONTATO_USUARIO SET descricao = :telefone WHERE fk_USUARIO_id_usuario = :originalId";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':telefone', $this->telefone);
                $stmt->bindParam(":originalId", $originalId, PDO::PARAM_INT);
        
                return $stmt->execute();
            }
            return false;
        }

        public function select($email) {
            $sql = 'SELECT id_usuario, nome, email, data_nasc, FK_ESTADO_id_estado, senha FROM ' . $this->table . ' WHERE email = ?';
            $stmt = Database::prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user === false) {
                return false;
            }
            $user_id = $user['id_usuario'];
            $state_id = $user['fk_estado_id_estado'];

            $sql2 = 'SELECT descricao FROM TEM_TIPO_CONTATO_USUARIO WHERE fk_USUARIO_id_usuario = ' .$user_id;
            $stmt2 = Database::prepare($sql2);
            $stmt2->execute();
            $telefone = $stmt2->fetch(PDO::FETCH_ASSOC);

            $sql3 = 'SELECT descricao FROM ESTADO WHERE id_estado = ' .$state_id;
            $stmt3 = Database::prepare($sql3);
            $stmt3->execute();
            $estado = $stmt3->fetch(PDO::FETCH_ASSOC);

            $resposta = array();
            $resposta['id_usuario'] = $user_id;
            $resposta['nome_usuario'] = $user["nome"];
            $resposta["email_usuario"] = $user["email"];
            $resposta["senha_usuario"] = $user["senha"];
            $resposta["data_nasc_usuario"] = $user["data_nasc"];
            $resposta["telefone_usuario"] = $telefone["descricao"];
            $resposta["estado_usuario"] = $estado["descricao"];

            return $resposta;
        }
    }
?>