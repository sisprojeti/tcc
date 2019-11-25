<?php

//Criando uma class que sera responsável por armazenar a estrutura de notas e também armazena metodos para fazer o calculo da media de projeti

    class Notas
    {
/*
  Atributos da class Notas
*/
      public $nota1;
      public $nota2;
      public $nota3;
      public $total;
      public $media;
/*
  Termino de atributos da class Nota
*/

/*
  Criando encapsulamentos do tipo get para as notas
*/

      public function getNota1(){
        return $this->nota1;
      }

      public function getNota2(){
        return $this->nota2;
      }

      public function getNota3(){
        return $this->nota2;
      }
/*
  Termino do encapsulamento dos metodos gets da classe Notas
*/

/*
  Criando encapsulamentos do tipo set para as notas
*/
      public function setNota1($nota1){ //criando um metodo publico pra retornar a nota1
        $this->nota1 = $nota1;
      }

      public function setNota2($nota2){
        $this->nota2 = $nota2;
      }

      public function setNota3($nota3){
        $this->nota3 = $nota3;
      }
/*
  Termino dos encapsulamentos do tipo get da classe Notas
*/

/*
  Inicio do metodo de calculo da media de projeti
*/
      public function calculaMediaProjeti($nota1,$nota2,$nota3){
        //fazer lógica de calcular a media de projeti
        $this->media = ($nota1 + $nota2 + $nota3)/3; //revisar como é feito o calculo da média para fazer calculo da media corretamente
      }
/*
  Final do metodo de calculo da media de projeti
*/

}

?>
