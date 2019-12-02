<?php

  class Projeti
  {
  	public $id;
    public $tema;
    public $descricao;

        public function adicionar()
        {
          $sql = "INSERT INTO projeti(tema,descricao) values (:tema,:descricao)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':tema',$this->tema);
          $stmt->bindParam(':descricao',$this->descricao);
          $stmt->execute();
          $ultimoIdProjeti = $conexao->lastInsertId();
          return $ultimoIdProjeti;
        }

       /*------------------------------------/*
       ENCAPSULAMENTOS DO ID
       /*------------------------------------*/

       public function getId(){
         return $this->id;
       }

       public function setId($id){
         $this->id = $id;
       }

       /*------------------------------------/*
       ENCAPSULAMENTOS DO TEMA
       /*------------------------------------*/

       public function getTema(){
         return $this->tema;
       }

       public function setTema($tema){
         $this->tema = $tema;
       }

       /*------------------------------------/*
       ENCAPSULAMENTOS DO TEMA
       /*------------------------------------*/

       public function getDescricao(){
         return $this->descricao;
       }

       public function setDescricao($descricao){
         $this->descricao = $descricao;
       }


  }

?>
