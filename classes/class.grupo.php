<?php

  class Grupo
  {
  	public $id_grupo;
    public $nome;

        

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

       public function getNome(){
         return $this->nome;
       }

       public function setNome($nome){
         $this->nome = $nome;
       }

  }

?>
