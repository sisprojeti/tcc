<?php
include_once('class.db.php');

    class RefAlunoTurma
    {
        public $fk_aluno;
        public $fk_turma;

        public function adicionar(){
          try {
            $sql = "INSERT INTO ref_aluno_turma(fk_aluno,fk_turma) values (:fk_aluno,:fk_turma)";
            $conexao = DB::conexao();
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':fk_aluno',$this->fk_aluno);
            $stmt->bindParam(':fk_turma',$this->fk_turma);
            $stmt->execute();
          } catch (PDOException $e) {
            echo "error".$e->getMessage();
          }
        }

      public function setFkAluno($fk_aluno)
      {
        $this->fk_aluno = $fk_aluno;
      }

      public function setFkTurma($fk_turma)
      {
        $this->fk_turma = $fk_turma;
      }
    }
?>
