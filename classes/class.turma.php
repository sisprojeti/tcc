<?php

  require_once('class.db.php');
    /*
      Criando a class de turma que será responsável por armazenar
      os atributos e metodos da class de turmas
    */

    class Turma
    {
      public $id;
      public $exercicio_id;
      public $curso_id;
      public $etapa_id;
      public $nome;
      public $turno;
      public $lotacao;
      public $status_finalizada;

      public function adicionar(){
        try{
          $sql = "INSERT INTO turma (exercicio_id,curso_id,etapa_id,nome,turno,lotacao,status_finalizada) values (:exercicio_id,:curso_id,:etapa_id,:nome,:turno,:lotacao,:status_finalizada)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':exercicio_id',$this->exercicio_id);
          $stmt->bindParam(':curso_id',$this->curso_id);
          $stmt->bindParam(':etapa_id',$this->etapa_id);
          $stmt->bindParam(':nome',$this->nome);
          $stmt->bindParam(':turno',$this->turno);
          $stmt->bindParam(':lotacao',$this->lotacao);
          $stmt->bindParam(':status_finalizada',$this->status_finalizada);
          $stmt->execute();
          // $resultado = $stmt->rowCount();
          // echo $resultado;
        }catch(PDOException $e){
            echo "ERROR".$e->getMessage();
        }
      }

      public static function listar(){
        try {
          $query = "SELECT * FROM turma";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      if($registros){
                        foreach($registros as $objeto){
                          $temporario = new Turma();
                          $temporario->setIdTurma($objeto['id']);
                          $temporario->setNome($objeto['nome']);
                          $itens[] = $temporario;
                        }
            return $itens;
        }
      }catch (PDOException $e){
        echo "ERROR".$e->getMessage();
      }
    }
/* =========Inicio encapsulamento id de turma =========*/
      public function setIdTurma($id){
        $this->id = $id;
      }

      public function getIdTurma(){
          return $this->id;
      }

/* =========Inicio encapsulamento da FK exercicio =========*/
      public function setExercicioId($exercicio_id){
        $this->exercicio_id = $exercicio_id;
      }

      public function getExercicioId(){
        return $this->exercicio_id;
      }
/* =========Inicio encapsulamento da FK curso =========*/
      public function setCursoId($curso_id){
        $this->curso_id = $curso_id;
      }

      public function getCursoId(){
        return $this->curso_id;
      }
/* =========Inicio encapsulamento da FK etapa =========*/
      public function setEtapaId($etapa_id){
        $this->etapa_id = $etapa_id;
      }

      public function getEtapaId(){
        return $this->etapa_id;
      }

      /* =========Inicio encapsulamento id de turma =========*/
      public function getCodTurma(){
        return $this->id;
      }

      public function setCodTurma($id){
        $this->id = $id;
      }

      /* =========Inicio encapsulamento nome de turma =========*/
      public function getNome(){
        return $this->nome;
      }

      public function setNome($nome){
        $this->nome = $nome;
      }

      /* =========Inicio encapsulamento turno de turma =========*/
      public function getTurno(){
        return $this->turno;
      }

      public function setTurno($turno){
        $this->turno = $turno;
      }

      /* =========Inicio encapsulamento de status turma =========*/
      public function getStatusFinalizada(){
        return $this->status_finalizada;
      }

      public function setStatusFinalizada($status_finalizada){
        $this->status_finalizada = $status_finalizada;
      }

      /* =========Inicio encapsulamento lotacao de turma =========*/
      public function getLotacao(){
        return $this->lotacao;
      }

      public function setLotacao($lotacao){
        $this->lotacao = $lotacao;
      }
    }

?>
