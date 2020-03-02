<?php
require_once("class.db.php");

    class Exercicio
    {
      public $id_exercicio;
      public $nome_ano;
      public $data_inicio;
      public $data_fim;

      public function adicionar(){
        $sql = "INSERT INTO exercicio (nome_ano,data_inicio,data_fim) values (:nome_ano,:data_inicio,:data_fim)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome_ano',$this->nome_ano);
        $stmt->bindParam(':data_inicio',$this->data_inicio);
        $stmt->bindParam(':data_fim',$this->data_fim);
        $stmt->execute();
      }

      // public static function listar(){
      //   $sql = "SELECT * FROM exercicio";
      //   $conexao = DB::conexao();
      //   $stmt = $conexao->query($sql);
      //   $lista = $stmt->fetchAll();
      //   return $lista;
      // }

      public static function listar(){
        try {
          $query = "SELECT * FROM exercicio";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      if($registros){
                        foreach($registros as $objeto){
                          $temporario = new Exercicio();
                          $temporario->setIdExercicio($objeto['id_exercicio']);
                          $temporario->setNomeAno($objeto['nome_ano']);
                          $temporario->setDataInicio($objeto['data_inicio']);
                          $temporario->setDataFim($objeto['data_fim']);
                          $itens[] = $temporario;
                        }
            return $itens;
        }
      }catch (PDOException $e){
        echo "ERROR".$e->getMessage();
      }
    }

    public static function contarExercicio()
      {
        try {
          $query = "select * from exercicio";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      $totalExercicios = count($registros);
                      return $totalExercicios;
          }catch(Exception $e){
              echo "ERROR".$e->getMessage();
          }
        }

      public function setIdExercicio($id_exercicio){
        $this->id_exercicio = $id_exercicio;
      }

      public function getIdExercicio(){
        return $this->id_exercicio;
      }

      public function setNomeAno($nome_ano){
        $this->nome_ano = $nome_ano;
      }

      public function getNomeAno(){
        return $this->nome_ano;
      }

      public function setDataInicio($data_inicio){
        $this->data_inicio = $data_inicio;
      }

      public function getDataInicio(){
        return $this->data_inicio;
      }

      public function setDataFim($data_fim){
        $this->data_fim = $data_fim;
      }

      public function getDataFim(){
        return $this->data_fim;
      }

    }

?>
