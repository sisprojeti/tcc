<?php

    class RefAvaliadorProjeti
    {
      public $id_avaliador_projeti;
      public $fk_professor;
      public $fk_projeti;

      public function adicionar()
      {
        $sql = "INSERT INTO avaliador_projeti(fk_professor,fk_projeti) values (:fk_professor,:fk_projeti)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':fk_professor',$this->fk_professor);
        $stmt->bindParam(':fk_projeti',$this->fk_projeti);
        $stmt->execute();
      }

      public function setFkProfessor($fk_professor){
        $this->fk_professor = $fk_professor;
      }

      public function setFkProjeti($fk_projeti){
        $this->fk_projeti = $fk_projeti;
      }

    }

?>
