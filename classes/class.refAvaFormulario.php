<?php
  include_once('class.db.php');
    class RefAvaFormulario
    {
      public $id_avaliador_projeti;
      public $fk_professor;
      public $fk_projeti;
      public $fk_formulario_avaliacao;

      public function adicionar(){
        try {
          $sql = "INSERT INTO
          avaliador_projeti
          (fk_professor,fk_projeti,fk_formulario_avaliacao)
           values (:fk_professor,:fk_projeti,:fk_formulario_avaliacao)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':fk_professor',$this->fk_professor);
          $stmt->bindParam(':fk_projeti',$this->fk_projeti);
          $stmt->bindParam(':fk_formulario_avaliacao',$this->fk_formulario_avaliacao);
          $stmt->execute();
        } catch (PDOException $e) {
          echo "error".$e->getMessage();
        }
      }

      public function setFkTurma($fk_turma){
        $this->fk_turma = $fk_turma;
      }

      public function setFkProfessor($fk_professor){
        $this->fk_professor = $fk_professor;
      }

      public function setFkProjeti($fk_projeti){
        $this->fk_projeti = $fk_projeti;
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
