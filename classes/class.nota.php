<?php

    class Nota
    {
      public $id_nota;
      public $valor;
      public $data_modificao;
      public $fk_criterio;
      public $fk_aluno;
      public $fk_professor;

      public function adicionar()
      {
        $sql = "INSERT INTO nota(valor,data_modificao,fk_criterio,fk_aluno,fk_professor) values (:valor,:data_modificao,:fk_criterio,:fk_aluno,:fk_professor)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':valor',$this->valor);
        $stmt->bindParam(':data_modificao',$this->data_modificao);
        $stmt->bindParam(':fk_criterio',$this->fk_criterio);
        $stmt->bindParam(':fk_aluno',$this->fk_aluno);
        $stmt->bindParam(':fk_professor',$this->fk_professor);
        $stmt->execute();
      }

      public function setValor($valor){
        $this->valor = $valor;
      }

      public function getValor(){
        return $this->valor;
      }

      public function setDataModificacao($data_modificacao){
        $this->data_modificacao = $data_modificacao;
      }

      public function getDataModificacao(){
        return $this->data_modificao;
      }

      public function setFkCriterio($fk_criterio){
        $this->fk_criterio = $fk_criterio;
      }

      public function getFkCriterio(){
        return $this->fk_criterio;
      }

      public function setFkAluno($fk_aluno){
        $this->fk_aluno = $fk_aluno;
      }

      public function getFkAluno(){
        return $this->fk_aluno;
      }

      public function setFkProfessor($fk_professor){
        $this->fk_professor = $fk_professor;
      }

      public function getFkProfessor(){
        return $this->fk_professor;
      }



    }

?>
