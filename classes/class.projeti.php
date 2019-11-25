<?php

  class Projeti
  {
  	public $id;
    public $tema;
    public $descricao;


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
