<?php
include_once('classes/class.db.php');
  //Criando a class para armazenar os atributos e metodos de etapa
    class Etapa
    {

      //Criando atributos pra class etapa
      public $id;
      public $nome;
      public $ordem;
      public $status_etapa;

      public function adicionar(){
        $sql = "INSERT INTO etapa (nome,ordem,status_etapa) values (:nome,:ordem,:status_etapa)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome',$this->nome);
        $stmt->bindParam(':ordem',$this->ordem);
        $stmt->bindParam(':status_etapa',$this->status_etapa);
        $stmt->execute();
      }

      public static function listar(){
        try {
          $query = "SELECT * FROM etapa";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      if($registros){
                        foreach($registros as $objeto){
                          $temporario = new Etapa();
                          $temporario->setId($objeto['id']);
                          $temporario->setNome($objeto['nome']);
                          $itens[] = $temporario;
                        }
            return $itens;
        }
      }catch (PDOException $e){
        echo "ERROR".$e->getMessage();
      }
    }


      public function setId($id){
        $this->id = $id;
      }

      public function getIdEtapa(){
        return $this->id;
      }

      /* =========Inicio encapsulamento nome da etapa =========*/
      public function getNome(){
        return $this->nome;
      }

      public function setNome($nome){
        $this->nome = $nome;
      }

      /* =========Inicio encapsulamento ordem da etapa =========*/
      public function getOrdem(){
        return $this->ordem;
      }

      public function setOrdem($ordem){
        $this->ordem = $ordem;
      }

      /* =========Inicio encapsulamento status da etapa =========*/
      public function getStatusEtapa(){
        return $this->status_etapa;
      }

      public function setStatusEtapa($status_etapa){
        $this->status_etapa = $status_etapa;
      }
    }

?>
