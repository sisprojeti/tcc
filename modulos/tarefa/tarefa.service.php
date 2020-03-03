<?php


//CRUD
class TarefaService {

	private $conexao;
	private $tarefa;

	public function __construct(Conexao $conexao, Tarefa $tarefa) {
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}

	public function inserir() { //create
		$query = 'insert into tb_tarefas(tarefa)values(:tarefa)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$stmt->execute();
	}

	public function inserirTeste(){
			$query = 'insert into tarefa(titulo,descricao,data_inicio,data_fim,data_conclusao,data_cadastro,status,responsavel) values (:titulo,:descricao,:data_inicio,:data_fim,data_conclusao,:data_cadastro,:status,:responsavel)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':titulo',$this->tarefa->__get('titulo'));
		$stmt->bindValue(':data_inicio',$this->tarefa->__get('data_inicio'));
		$stmt->bindValue(':data_fim',$this->tarefa->__get('data_fim'));
		$stmt->bindValue(':data_conclusao',$this->tarefa->__get('data_conclusao'));
		$stmt->bindValue(':descricao',$this->tarefa->__get('descricao'));
		$stmt->bindValue(':data_cadastro',$this->tarefa->__get('data_cadastro'));
		$stmt->bindValue(':responsavel',$this->tarefa->__get('responsavel'));
		$stmt->bindValue(':fk_projeti',$this->tarefa->__get('fk_projeti'));
		$stmt->bindValue(':fk_status_tarefa',$this->tarefa->__get('fk_status_tarefa'));
		$stmt->execute();
	}

	public function recuperar() { //read
		$query = '
			select
				t.id, s.status, t.tarefa
			from
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar() { //update

		$query = "update tb_tarefas set tarefa = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('tarefa'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute();
	}

	public function remover() { //delete

		$query = 'delete from tb_tarefas where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->execute();
	}

	public function marcarRealizada() { //update

		$query = "update tb_tarefas set id_status = ? where id = ?";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id_status'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute();
	}
}

?>
