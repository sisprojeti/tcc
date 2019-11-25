<?php

/**
 * Criando uma class com o nome "Tarefa" que será responsável por armazenar as tarefas referentes a cada oportunidade
 */
    class Tarefa
    {
      public $titulo;
      public $descricao;
      public $data_inicio;
      public $data_termino;
      public $responsavel;


/*---------------------------------------------------------------------
  DESCRIÇÃO
 ---------------------------------------------------------------------*/
      public function getDescricao(){
        return $this->descricao;
      }

      public function setDescricao($descricao){
        $this->descricao = $descricao;
      }

/*---------------------------------------------------------------------
  DATA INICIO
 ---------------------------------------------------------------------*/
      public function getDataInicio(){
        return $this->$data_inicio;
      }

      public function setDataInicio($data_inicio){
        $this->data_inicio = $data_inicio;
      }

/*---------------------------------------------------------------------
  DATA TERMINO
 ---------------------------------------------------------------------*/

      public function getDataTermino(){
        return $this->data_termino;
      }

      public function setDataTermino($data_termino){
        $this->data_termino = $data_termino;
      }

/*---------------------------------------------------------------------
  RESPONSAVEL
 ---------------------------------------------------------------------*/

      public function getResponsavel(){
        return $this->responsavel;
      }

      public function setResponsavel(){
        $this->responsavel = $responsavel;
      }

/*---------------------------------------------------------------------
  TITULO
---------------------------------------------------------------------*/

      public function getTitulo(){
        return $this->titulo;
      }

      public function setTitulo($titulo){
        $this->titulo = $titulo;
      }

      public function __construct($titulo,$descricao,$data_inicio,$data_termino,$reponsavel){
        $this->setTitulo($titulo);
        $this->setDescricao($descricao);
        $this->setDataInicio($data_inicio);
        $this->setDataTermino($data_termino);
        $this->setResponsavel($responsavel);
      }


    }

    $novaTarefa = new Tarefa("CRUD de usuários","Fazer a lógica do CRUD de usuários","28-09-2019","29-09-2019","Diego Barbosa");

    var_dump($novaTarefa);

?>
