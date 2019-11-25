<?php

    class RefAlunoProjeti
    {
      public $id_ref_aluno_projeti;
      public $fk_projeti;
      public $fk_matricula;

      public function adicionar()
      {
        $sql = "INSERT INTO ref_aluno_projeto(fk_projeti,fk_matricula) values (:fk_projeti,:fk_matricula)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':fk_projeti',$this->fk_projeti);
        $stmt->bindParam(':fk_matricula',$this->fk_matricula);
        $stmt->execute();
      }

      public function listar()
      {
        $sql ="SELECT * FROM ref_aluno_projeti";
      }

      public function getFkMatricula(){
        return $this->fk_matricula;
      }

      public function getFkProjeti(){
        return $this->fk_projeti;
      }

      public function setFkProjeti($fk_projeti){
        $this->fk_projeti = $fk_projeti;
      }

      public function setFkMatriculoa($fk_matricula){
        $this->fk_matricula = $fk_matricula;
      }
    }

?>
