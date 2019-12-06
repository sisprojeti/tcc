<?php

  class Grupo
  {
  	public $id_grupo;
    public $nome;

    public function __construct($id_grupo=false){
        if($id_grupo){
          $sql = "SELECT * FROM grupo where id_grupo = :id_grupo";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(":id_grupo",$id_grupo,PDO::PARAM_INT);
          $stmt->execute();
          foreach($stmt as $obj){
            $this->setIdGrupo($obj['id_grupo']);
            $this->setNomeGrupo($obj['nome']);
          }
        }
      }


    public function adicionar()
    {
      $sql = "INSERT INTO grupo (nome) values (:nome)";
      $conexao = DB::conexao();
      $stmt = $conexao->prepare($Sql);
      $stmt->bindParam(':nome',$this->nome);
      $stmt->execute();
    }

    public static function listar($modulo = false)
      {
        try {
          $query = "SELECT * FROM grupo";
          if($modulo){
            $query.=" where nome = '$modulo'";
          }
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      if($registros){
                        foreach($registros as $objeto){
                          $temporario = new Grupo();
                          $temporario->setIdGrupo($objeto['id_grupo']);
                          $temporario->setNomeGrupo($objeto['nome']);
                          $itens[] = $temporario;
                        }
            return $itens;
          }
        } catch (Exception $e) {
            echo "ERROR".$e->getMessage();
        }
      }

      public static function recuperaIdModulo($modulo = false)
        {
          try {
            $query = "SELECT * FROM grupo";
            if($modulo){
              $query.=" where nome = '$modulo'";
            }
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          $temporario = new Grupo($registros[0]['id_grupo']);
                          return $temporario;
                        }
                        return false;
          } catch (Exception $e){
              echo "ERROR".$e->getMessage();
          }
        }



       /*------------------------------------/*
       ENCAPSULAMENTOS DO ID
       /*------------------------------------*/

       public function getIdGrupo(){
         return $this->id_grupo;
       }

       public function setIdGrupo($id_grupo){
         $this->id_grupo = $id_grupo;
       }

       /*------------------------------------/*
       ENCAPSULAMENTOS DO TEMA
       /*------------------------------------*/

       public function getNomeGrupo(){
         return $this->nome;
       }

       public function setNomeGrupo($nome){
         $this->nome = $nome;
       }

  }

?>
