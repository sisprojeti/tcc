<?php
  include_once('class.db.php');
    class Matricula
    {
      public $id_matricula;
      public $fk_turma;
      public $fk_aluno;

      public function adicionar(){
        try {
          $sql = "INSERT INTO ref_aluno_turma(fk_turma,fk_aluno) values (:fk_turma,:fk_aluno)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':fk_turma',$this->fk_turma);
          $stmt->bindParam(':fk_aluno',$this->fk_aluno);
          $stmt->execute();
        } catch (PDOException $e) {
          echo "error".$e->getMessage();
        }
      }

      public function getIdMatricula(){
        return $this->id;
      }

      public function setIdMatricula($id){
        $this->id = $id;
      }


      public function getTurmaId(){
        return $this->fk_turma;
      }

      public function setTurmaId($fk_turma){
        $this->fk_turma = $fk_turma;
      }

      public function getAlunoId(){
        return $this->fk_aluno;
      }

      public function setAlunoId($fk_aluno){
        $this->fk_aluno = $fk_aluno;
      }
    }

?>
