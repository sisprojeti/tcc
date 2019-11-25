<?php

    //criando uma class que sera responsável por armazenar as dicas que serão cadastradas

    class Dicas
    {
      public $titulo;
      public $descricao;

      public function getTitulo(){
        return $this->titulo;
      }

      public function setTitulo($titulo){
        $this->titulo = $titulo;
      }

      public function getDescricao(){
        return $this->descricao;
      }

      public function setDescricao($descricao){
        $this->descricao = $descricao;
      }

      public function __construct($titulo,$descricao){
        $this->titulo = $titulo;
        $this->descricao = $descricao;

      }

    }
?>
