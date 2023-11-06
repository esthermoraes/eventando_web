<?php
	require_once 'connect_web.php';
	
	/*************************************************************
	Objetivo: Classe responsável por representar uma tabela genérica do banco de dados.


	Atributos:
	$table- nome do tabela

	Métodos:
	insert - insere um registro na tabela
	update - atualiza um registro na tabela cliente
	find - consulta pelo id
	findAll - consulta e retorna todos os registros da tabela
	delete - exclui um registro pelo id
	*************************************************************/
	
	abstract class CRUD extends Database{
		
		protected $table;

		abstract public function insert();
		abstract public function update($id);
		
		/***************
		Objetivo: Método que consulta pelo id
		Parâmetro de saída: Retorna o registro da tabela. Em caso de falha na consulta ou não existir o registro, retorna falso.
		***************/
		public function  find($id){
			$sql = "SELECT * FROM $this->table WHERE id = :id";
			$stmt = Database::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_BOTH);
			
		}
		
		/***************
		Objetivo: Método que consulta todos clientes
		Parâmetro de saída: Retorna a tabela com registros. Em caso de falha na consulta, retorna falso.
		***************/		
		public function findAll(){
			$sql = "SELECT * FROM $this->table ";
			$stmt = Database::prepare($sql);			
			$stmt->execute();
			//retorna um array com os registros da tabela indexado pelo nome da coluna da tabela e por um número
			return $stmt->fetchAll(PDO::FETCH_BOTH );
			
		}
		
		/***************
		Objetivo: Exclui um cliente pelo id
		Parâmetro de entrada: $id - id do cliente
		Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
		***************/
		public function delete($id){
			$sql="DELETE FROM $this->table WHERE id = :id";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			return $stmt->execute();
		}
		
	}
?>