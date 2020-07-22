<?php

    class RefFormularioCriterio
    {
      public $id_ref_formulario_creterio;
      public $fk_ref_formulario;
      public $fk_criterio;

      public function adicionar()
      {
        $sql = "INSERT INTO ref_formulario_criterio(fk_ref_formulario,fk_criterio) values (:fk_ref_formulario,:fk_criterio)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':fk_ref_formulario',$this->fk_ref_formulario);
        $stmt->bindParam(':fk_criterio',$this->fk_criterio);
        $stmt->execute();
      }

      public function setFkFormulario($fk_ref_formulario){
        $this->fk_ref_formulario = $fk_ref_formulario;
      }

      public function setFkCriterio($fk_criterio){
        $this->fk_criterio = $fk_criterio;
      }

    }

?>
