<?php

    class RefAlunoTarefa
    {
      public $id_ref_aluno_tarefa;
      public $fk_tarefa;
      public $fk_ref_aluno_projeti;

      public function adicionar()
      {
        $sql = "INSERT INTO ref_aluno_tarefa(fk_tarefa,fk_ref_aluno_projeti) values (:fk_tarefa,:fk_ref_aluno_projeti)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':fk_tarefa',$this->fk_tarefa);
        $stmt->bindParam(':fk_ref_aluno_projeti',$this->fk_ref_aluno_projeti);
        $stmt->execute();
      }

      public function setFkTarefa($fk_tarefa){
        $this->fk_tarefa = $fk_tarefa;
      }

    }

?>
