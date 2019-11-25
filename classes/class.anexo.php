<?php

    //criando uma class que sera responsável por processar o armazenamento de anexos de documentacao
    class Anexos
    {
      public $anexoAv1;
      public $anexoAv2;
      public $anexoAv3;

      public function getAnexo1(){
        return $this->anexoAv1;
      }

      public function setAnexo1($anexoAv1){
        $this->anexoAv1 = $anexoAv1;
      }

      public function getAnexoAv2(){
        return $this->anexoAv2;
      }

      public function setAnexoAv2($anexoAv2){
        $this->anexoAv2 = $anexoAv2;
      }

      public function getAnexo3(){
        return $this->anexoAv3;
      }

      public function setAnexoAv3($anexoAv3){
        $this->anexo = $anexoAv3;
      }

      //criando uma funcao construtora para a classe de anexos
      public function __construct($anexoAv1,$anexoAv2){
        $this->anexoAv1 = $anexoAv1;
        $this->anexoAv2 = $anexoAv2;
      }

    }
?>
