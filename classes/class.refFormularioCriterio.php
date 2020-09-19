<?php

    class RefFormularioCriterio
    {
      public $id_ref_formulario_creterio;
      public $fk_ref_formulario;
      public $fk_criterio;
      public $nome_criterio;
      public $valor_maximo;

      public function adicionar()
      {
        $sql = "INSERT INTO ref_formulario_criterio(fk_formulario_avaliacao,fk_criterio) values (:fk_formulario_avaliacao,:fk_criterio)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':fk_formulario_avaliacao',$this->fk_ref_formulario);
        $stmt->bindParam(':fk_criterio',$this->fk_criterio);
        $stmt->execute();
      }

      public static function listar(){
        try {
          $query = "SELECT criterio.id_criterio,
                           criterio.nome,
                           criterio.valor_maximo
                           from criterio
                           join ref_formulario_criterio on criterio.id_criterio = ref_formulario_criterio.fk_criterio";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      if($registros){
                        foreach($registros as $objeto){
                          $temporario = new RefFormularioCriterio();
                          $temporario->setNomeCriterio($objeto['nome']);
                          $temporario->setValorMaximoCriterio($objeto['valor_maximo']);
                          $itens[] = $temporario;
                        }
            return $itens;
        }
      }catch (PDOException $e){
        echo "ERROR".$e->getMessage();
      }
    }
    /* SELECT USADO PRA SELECIONAR formularios vinculados a turma
    select criterio.id_criterio, criterio.nome, criterio.valor_maximo,formulario_avaliacao.id_formulario_avaliacao,formulario_avaliacao.fk_turma from criterio join ref_formulario_criterio on criterio.id_criterio = ref_formulario_criterio.fk_criterio join formulario_avaliacao;
    */
  //   public static function listar(){
  //     try {
  //       $query = "SELECT criterio.id_criterio,
  //                        criterio.nome,
  //                        criterio.valor_maximo
  //                        from criterio
  //                        join ref_formulario_criterio on criterio.id_criterio = ref_formulario_criterio.fk_criterio";
  //                   $stmt = DB::conexao()->prepare($query);
  //                   $stmt->execute();
  //                   $registros = $stmt->fetchAll();
  //                   if($registros){
  //                     foreach($registros as $objeto){
  //                       $temporario = new RefFormularioCriterio();
  //                       $temporario->setNomeCriterio($objeto['nome']);
  //                       $temporario->setValorMaximoCriterio($objeto['valor_maximo']);
  //                       $itens[] = $temporario;
  //                     }
  //         return $itens;
  //     }
  //   }catch (PDOException $e){
  //     echo "ERROR".$e->getMessage();
  //   }
  // }
      public function setNomeCriterio($nome_criterio){
        $this->nome_criterio = $nome_criterio;
      }

      public function setValorMaximoCriterio($valor_maximo){
        $this->valor_maximo = $valor_maximo;
      }

      public function setFkFormulario($fk_formulario_avaliacao){
        $this->fk_ref_formulario = $fk_formulario_avaliacao;
      }

      public function setFkCriterio($fk_criterio){
        $this->fk_criterio = $fk_criterio;
      }

    }

?>
