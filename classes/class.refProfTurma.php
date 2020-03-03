<?php
  include_once('class.db.php');
    class RefProfTurma
    {
      public $id_ref_prof_turma;
      public $fk_turma;
      public $fk_professor;

      public function adicionar(){
        try {
          $sql = "INSERT INTO ref_prof_turma (fk_turma,fk_professor) values (:fk_turma,:fk_professor)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':fk_turma',$this->fk_turma);
          $stmt->bindParam(':fk_professor',$this->fk_professor);
          $stmt->execute();
        } catch (PDOException $e) {
          echo "error".$e->getMessage();
        }
      }

      public function getIdRefProfTurma(){
        return $this->id_ref_prof_turma;
      }

      public function setIdRefProfTurma($id_ref_prof_turma){
        $this->id_ref_prof_turma = $id_ref_prof_turma;
      }

      public function getTurmaId(){
        return $this->turma_id;
      }

      public function setIdTurma($fk_turma){
        $this->fk_turma = $fk_turma;
      }

      public function getIdProfessor(){
        return $this->professor_id;
      }

      public function setIdProfessor($fk_professor){
        $this->fk_professor = $fk_professor;
      }
    }

?>
