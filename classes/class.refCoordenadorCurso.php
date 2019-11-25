<?php
include_once('class.db.php');
    class RefCoordenadorCurso
    {
      public $id_ref_coordenador_curso;
      public $fk_curso;
      public $fk_coordenador;
      public $nome_curso;
      public $nome_coordenador;

      public function adicionar(){
        try {
          $sql = "INSERT INTO ref_coordenador_curso(fk_curso,fk_coordenador) values (:fk_curso,:fk_coordenador)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':fk_curso',$this->fk_curso);
          $stmt->bindParam(':fk_coordenador',$this->fk_coordenador);
          $stmt->execute();
        } catch (PDOException $e) {
          echo "error".$e->getMessage();
        }
      }

      public function listar(){
        try {
          $sql = "select pessoa.nome nome_coordenador,curso.nome nome_curso from pessoa join coordenador on coordenador.id_coordenador = pessoa.id_pessoa join curso on curso.id_curso = coordenador.id_coordenador join ref_coordenador_curso on coordenador.id_coordenador = ref_coordenador_curso.fk_curso";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->execute();
          $registros = $stmt->fetchAll();
          if($registros){
            foreach($registros as $objeto){
              $temporario = new RefCoordenadorCurso();
              $temporario->setId($objeto['id_ref_coordenador_curso']);
              $temporario->setNomeCoordenador($objeto['nome_coordenador']);
              $temporario->setNomeCurso($objeto['nome_curso']);
              $itens[] = $temporario;
            }
            return $itens;
          }
        } catch (PDOException $e) {
          echo "Deu erro".$e->getMessage();
        }
      }

      public function getId($id_coordenador_curso){
        return $this->id_coordenador_curso;
      }

      public function setId($id_ref_coordenador_curso)
      {
        $this->id_ref_coordenador_curso = $id_ref_coordenador_curso;
      }

      public function getNomeCoordenador()
      {
        return $this->nome_coordenador;
      }

      public function getNomeCurso(){
        return $this->nome_curso;
      }

      public function setNomeCoordenador($nome_coordenador)
      {
        $this->nome_coordenador = $nome_coordenador;
      }

      public function setNomeCurso($nome_curso){
        $this->nome_curso = $nome_curso;
      }

      public function getIdCurso(){
        return $this->curso_id;
      }

      public function setIdCursoRefCoordenador($fk_curso){
        $this->fk_curso = $fk_curso;
      }

      public function getIdCoordenador(){
        return $this->fk_coordenador;
      }

      public function setIdCoordenadorRefCurso($fk_coordenador){
        $this->fk_coordenador = $fk_coordenador;
      }
      // public function getIdCursoRefCoord(){
      //   return $this->$curso_id;
      // }
      //
      // public function setIdCursoRefCoord($curso_id){
      //   $this->curso_id = $curso_id;
      // }
      //
      // public function getIdCoordRefCurso()
      // {
      //   return $this->coordenador_id;
      // }
      //
      // public function setIdCoordRefCurso($coordenador_id)
      // {
      //   $this->coordenador_id = $coordenador_id;
      // }

    }

?>
