<?php
  include_once('class.db.php');
    class RefProfTurma
    {
      public $id;
      public $turma_id;
      public $professor_id;

      public function adicionar(){
        try {
          $sql = "INSERT INTO ref_prof_turma (professor_id,turma_id) values (:professor_id,:turma_id)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':professor_id',$this->professor_id);
          $stmt->bindParam(':turma_id',$this->turma_id);
          $stmt->execute();
        } catch (PDOException $e) {
          echo "error".$e->getMessage();
        }

      }

      public function getIdRefProfTurma(){
        return $this->id;
      }

      public function setIdRefProfTurma($id){
        $this->id = $id;
      }

      public function getTurmaId(){
        return $this->turma_id;
      }

      public function setIdTurma($turma_id){
        $this->turma_id = $turma_id;
      }

      public function getIdProfessor(){
        return $this->professor_id;
      }

      public function setIdProfessor($professor_id){
        $this->professor_id = $professor_id;
      }
    }

?>
