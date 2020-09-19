<?php
include_once('classes/class.db.php');
  //Criando a class para armazenar os atributos e metodos de etapa
    class Criterio
    {

      //Criando atributos pra class criterio
      public $id_criterio;
      public $nome;
      public $valor_maximo;

      public function adicionar(){
        $sql = "INSERT INTO criterio(nome,valor_maximo) values (:nome,:valor_maximo)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome',$this->nome);
        $stmt->bindParam(':valor_maximo',$this->valor_maximo);
        $stmt->execute();
         if($stmt){
                    echo '
                    <div id="snoAlertBox" class="alert alert-success" data-alert="alert">Adicionado com sucesso</div>
                    ';
                  }
      }



      public static function listar(){
        try {
          $query = "SELECT * FROM criterio";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      if($registros){
                        foreach($registros as $objeto){
                          $temporario = new Criterio();
                          $temporario->setIdCriterio($objeto['id_criterio']);
                          $temporario->setNomeCriterio($objeto['nome']);
                          $temporario->setValorMaximo($objeto['valor_maximo']);
                          $itens[] = $temporario;
                        }
            return $itens;
        }
      }catch (PDOException $e){
        echo "ERROR".$e->getMessage();
      }
    }

    public static function listarCriterios($fk_projeti){
      try {
        $query = "SELECT criterio.nome as nome_criterio from criterio";
                    $stmt = DB::conexao()->prepare($query);
                    $stmt->execute();
                    $registros = $stmt->fetchAll();
                    if($registros){
                      foreach($registros as $objeto){
                        $temporario = new RefFormularioAvaliacaoProjeti();
                        $temporario->setPessoaNome($objeto['nome_criterio']);
                        $itens[] = $temporario;
                      }
          return $itens;
      }
    }catch (PDOException $e){
      echo "ERROR".$e->getMessage();
    }
  }

    public static function contarCriterios()
      {
        try {
          $query = "select * from criterio";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      $totalEtapas = count($registros);
                      return $totalEtapas;
          }catch(Exception $e){
              echo "ERROR".$e->getMessage();
          }
        }

      public function setIdCriterio($id_criterio){
        $this->id_criterio = $id_criterio;
      }

      public function setNomeCriterio($nome){
        $this->nome = $nome;
      }

      public function setValorMaximo($valor_maximo){
        $this->valor_maximo = $valor_maximo;
      }

      public function getIdCriterio(){
        return $this->id_criterio;
      }

      public function getNomeCriterio(){
        return $this->nome;
      }

      public function getValorMaximo()
      {
        return $this->valor_maximo;
      }
    }

?>
