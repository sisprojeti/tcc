<?php
  include_once('class.db.php');
    class Matricula
    {
      public $id;
      public $turma_id;
      public $aluno_id;

      public function adicionar(){
        try {
          $sql = "INSERT INTO matricula (turma_id,aluno_id) values (:turma_id,:aluno_id)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':turma_id',$this->turma_id);
          $stmt->bindParam(':aluno_id',$this->aluno_id);
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
        return $this->turma_id;
      }

      public function setTurmaId($turma_id){
        $this->turma_id = $turma_id;
      }

      public function getAlunoId(){
        return $this->aluno_id;
      }

      public function setAlunoId($aluno_id){
        $this->aluno_id = $aluno_id;
      }
    }

?>
