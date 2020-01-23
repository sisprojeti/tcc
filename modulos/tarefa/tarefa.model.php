<?php

class Tarefa {
	private $id;
	private $id_status;
	private $tarefa;
	private $data_cadastro;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}

	public static function contarTarefas()
	    {
	      try {
	        $query = "select * from tb_tarefas";
	                    $stmt = DB::conexao()->prepare($query);
	                    $stmt->execute();
	                    $registros = $stmt->fetchAll();
	                    $totalTarefas = count($registros);
	                    return $totalTarefas;
	        }catch(Exception $e){
	            echo "ERROR".$e->getMessage();
	        }
	      }
}

?>
