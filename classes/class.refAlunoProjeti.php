<?php

    class RefAlunoProjeti
    {
      public $id_ref_aluno_projeti;
      public $fk_projeti;
      public $fk_aluno;

      public function adicionar()
      {
        $sql = "INSERT INTO ref_aluno_projeti(fk_projeti,fk_aluno) values (:fk_projeti,:fk_aluno)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':fk_projeti',$this->fk_projeti);
        $stmt->bindParam(':fk_aluno',$this->fk_aluno);
        $stmt->execute();
      }

      public function listar()
      {
        $sql ="SELECT * FROM ref_aluno_projeti";
      }

      public function getFkAluno(){
        return $this->fk_aluno;
      }

      public function getFkProjeti(){
        return $this->fk_projeti;
      }

      public function setFkProjeti($fk_projeti){
        $this->fk_projeti = $fk_projeti;
      }

      public function setFkAluno($fk_aluno){
        $this->fk_aluno = $fk_aluno;
      }
    }

?>
