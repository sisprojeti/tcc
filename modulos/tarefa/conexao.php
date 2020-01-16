<?php

    class Conexao{

      private $host = 'localhost';
      private $dbname = 'sisp09';
      private $user = 'root';
      private $pass = '';

      public function conectar()
      {
        try{
          $conexao = new PDO(
            "mysql:host=$this->host;dbname=$this->dbname",
            "$this->user",
            "$this->pass"
          );
          return $conexao;
        } catch (PDOException $e) {
          echo "ERROR".$e->getMessage();
        }
      }
    }

?>
