<?php
  include_once('class.db.php');
    class RefFormAvaTurma
    {
      public $id_ref_formulario_avaliacao_turma;
      public $fk_turma;
      public $fk_formulario_avaliacao;

      public function adicionar(){
        try {
          $sql = "INSERT INTO
          ref_formulario_avaliacao_turma
          (fk_turma,fk_formulario_avaliacao)
           values (:fk_turma,:fk_formulario_avaliacao)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':fk_turma',$this->fk_turma);
          $stmt->bindParam(':fk_formulario_avaliacao',$this->fk_formulario_avaliacao);
          $stmt->execute();
        } catch (PDOException $e) {
          echo "error".$e->getMessage();
        }
      }

      public function setFkTurma($fk_turma){
        $this->fk_turma = $fk_turma;
      }

      public function setFkFormularioAvaliacao($fk_formulario_avaliacao){
        $this->fk_formulario_avaliacao = $fk_formulario_avaliacao;
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
