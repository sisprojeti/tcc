<?php

  require_once('class.db.php');
    /*
      Criando a class de turma que será responsável por armazenar
      os atributos e metodos da class de turmas
    */

    class Turma
    {
      public $id_turma;
      public $fk_exercicio;
      public $fk_curso;
      public $fk_etapa;
      public $nome;
      public $turno;
      public $lotacao;
      public $status_finalizada;

      public function adicionar(){
        try{
          $sql = "INSERT INTO turma (fk_exercicio,fk_etapa,fk_curso,nome,turno,lotacao,status_finalizada) values (:fk_exercicio,:fk_etapa,:fk_curso,:nome,:turno,:lotacao,:status_finalizada)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':fk_exercicio',$this->fk_exercicio);
          $stmt->bindParam(':fk_etapa',$this->fk_etapa);
          $stmt->bindParam(':fk_curso',$this->fk_curso);
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
                          $temporario->setIdTurma($objeto['id_turma']);
                          $temporario->setNome($objeto['nome']);
                          $temporario->setCursoId($objeto['fk_curso']);
                          $temporario->setEtapaId($objeto['fk_etapa']);
                          $temporario->setTurno($objeto['turno']);
                          $itens[] = $temporario;
                        }
            return $itens;
        }
      }catch (PDOException $e){
        echo "ERROR".$e->getMessage();
      }
    }

    public static function contarTurmas()
      {
        try {
          $query = "select * from turma";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      $totalTurmas = count($registros);
                      return $totalTurmas;
          }catch(Exception $e){
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
      public function setExercicioId($fk_exercicio){
        $this->fk_exercicio = $fk_exercicio;
      }

      public function getExercicioId(){
        return $this->exercicio;
      }
/* =========Inicio encapsulamento da FK curso =========*/
      public function setCursoId($fk_curso){
        $this->fk_curso = $fk_curso;
      }

      public function getCursoId(){
        return $this->fk_curso_id;
      }
/* =========Inicio encapsulamento da FK etapa =========*/
      public function setEtapaId($fk_etapa){
        $this->fk_etapa = $fk_etapa;
      }

      public function getEtapaId(){
        return $this->etapa_id;
      }

      /* =========Inicio encapsulamento id de turma =========*/
      public function getCodTurma(){
        return $this->id_turma;
      }

      public function setCodTurma($id_turma){
        $this->id_turma = $id_turm;
      }

      /* =========Inicio encapsulamento nome de turma =========*/
      public function getNomeTurma(){
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
