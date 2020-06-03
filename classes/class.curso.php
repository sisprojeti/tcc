<?php

require_once('class.db.php');

     class Curso
     {
      public $id_curso;
      public $nome;
      public $sigla;
      public $ano_total;
      public $carga_horaria;
      public $status_curso;

      public function adicionar(){
        $sql = "INSERT INTO curso (nome,sigla,ano_total,carga_horaria,status_curso) values (:nome,:sigla,:ano_total,:carga_horaria,:status_curso)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome',$this->nome);
        $stmt->bindParam(':sigla',$this->sigla);
        $stmt->bindParam(':ano_total',$this->ano_total);
        $stmt->bindParam(':carga_horaria',$this->carga_horaria);
        $stmt->bindParam(':status_curso',$this->status_curso);
        $stmt->execute();
         if($stmt){
                    echo '
                    <div id="snoAlertBox" class="alert alert-success" data-alert="alert">Adicionado com sucesso</div>
                    ';
                  }
      }
      public static function listar(){
        try {
          $query = "SELECT * FROM curso";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      if($registros){
                        foreach($registros as $objeto){
                          $temporario = new Curso();
                          $temporario->setId($objeto['id_curso']);
                          $temporario->setNome($objeto['nome']);
                          $temporario->setSigla($objeto['sigla']);
                          $temporario->setStatusCurso($objeto['status_curso']);
                          $itens[] = $temporario;
                        }
            return $itens;
        }
      }catch (PDOException $e){
        echo "ERROR".$e->getMessage();
      }
    }

    public static function contarCursos()
      {
        try {
          $query = "select * from curso";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      $totalTurmas = count($registros);
                      return $totalTurmas;
          }catch(Exception $e){
              echo "ERROR".$e->getMessage();
          }
        }

    //   public static function listar(){
    //     try {
    //       $sql = "SELECT * FROM curso";
    //       $conexao = DB::conexao();
    //       $stmt = $conexao->prepare($sql);
    //       $registros = $stmt->fetchAll();
    //       if($registros){
    //         foreach($registros as $objeto){
    //           $temporario = new Curso();
    //           $temporario->setId($objeto['id']);
    //           $temporario->setNome($objeto['nome']);
    //           $temporario->setSigla($objeto['sigla']);
    //           $temporario->setAnoTotal($objeto['ano_total']);
    //           $temporario->setCargaHoraria($objeto['carga_horaria']);
    //           $temporario->setStatusCurso($objeto['status_curso']);
    //           $itens[] = $temporario;
    //         }
    //       return $itens;
    //       }
    //     } catch (PDOException $e) {
    //       echo "error".$e->getMessage();
    //   }
    // }

       /*------------------------------------/*
       ENCAPSULAMENTOS DO ID
       /*------------------------------------*/

       public function getIdCurso(){
         return $this->id_curso;
       }

       public function setId($id_curso){
         $this->id_curso = $id_curso;
       }


       /*------------------------------------/*
       ENCAPSULAMENTOS DO NOME
       /*------------------------------------*/
       public function getNomeCurso(){
         return $this->nome;
       }

       public function setNome($nome){
         $this->nome = $nome;
       }

        /*------------------------------------/*
       ENCAPSULAMENTOS DO SIGLA
       /*------------------------------------*/
       public function getSigla(){
         return $this->sigla;
       }

       public function setSigla($sigla){
         $this->sigla = $sigla;
       }

         /*------------------------------------/*
       ENCAPSULAMENTOS DO ANOTOTAL
       /*------------------------------------*/
       public function getAnoTotal(){
         return $this->ano_total;
       }

       public function setAnoTotal($ano_total){
         $this->ano_total = $ano_total;
       }

          /*------------------------------------/*
       ENCAPSULAMENTOS DO CARGAHORARIA
       /*------------------------------------*/
       public function getCargaHoraria(){
         return $this->carga_horaria;
       }

       public function setCargaHoraria($carga_horaria){
         $this->carga_horaria = $carga_horaria;
       }

           /*------------------------------------/*
       ENCAPSULAMENTOS DO STATUSCURSO
       /*------------------------------------*/
       public function getStatusCurso(){
         return $this->status_curso;
       }

       public function setStatusCurso($status_curso){
         $this->status_curso = $status_curso;
       }


     }

?>
