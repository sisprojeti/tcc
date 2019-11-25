<?php
include_once('class.db.php');
    class RefCoordenadorCurso
    {
      public $curso_id;
      public $coordenador_id;

      public function adicionar()
      {
        try
        {
          $sql = "INSERT INTO ref_coordenador_curso (curso_id,coordenador_id) values (:curso_id,:coordenador_id)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':curso_id',$this->curso_id);
          $stmt->bindParam('coordenador_id',$this->coordenador_id);
          $stmt->execute();
        }catch(PDOException $e)
        {
          echo "ERROR".$e->getMessage();
        }
      }

      public function getCursoId()
      {
        return $this->curso_id;
      }

      public function setIdCurso($curso_id)
      {
        $this->curso_id = $curso_id;
      }

      public function getCoordenadorId()
      {
        return $this->coordenador_id;
      }

      public function setIdCoordenador()
      {
        return $this->coordenador_id;
      }
    }

?>
