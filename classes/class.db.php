<?php
   //criando uma class para conexão com o banco de dados
   class DB
   {
     public static $conexao; //criando um atributo estático com o nome $conexao

     public static function conexao(){
     try{
       self:: $conexao = new PDO("mysql:host=localhost;dbname=sisp08","root","");
       self:: $conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

     }catch(PDDException $e){
       echo "ERROR".$e->getMessage();
     }
     return self::$conexao;
   }
 }
?>
