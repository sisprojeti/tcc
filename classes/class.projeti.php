<?php

  class Projeti
  {
  	public $id;
    public $tema;
    public $decricao;

        public function adicionar()
        {
          $sql = "INSERT INTO projeti(tema,descricao) values (:tema,:descricao)"; //COLOCAR O "s" EM DESCRICAO
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':tema',$this->tema);
          $stmt->bindParam(':descricao',$this->descricao);
          $stmt->execute();
          $ultimoIdProjeti = $conexao->lastInsertId();
          return $ultimoIdProjeti;
        }

        public static function recuperaAlunoProjeti($fk_aluno)
        {
          $sql = "";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->execute();
          if($stmt){
            foreach($stmt as $objeto){
              $temporario = new Projeti();
              $temporario->setIdTurma($objeto['id_turma']);
              $temporario->setNomeTurma($objeto['nome_turma']);
            }
            return $temporario;
            }
          }
          public static function recuperaIdProjeti($fk_pessoa)
          {
            $sql = "SELECT * from pessoa
            inner join aluno on pessoa.id_pessoa = aluno.fk_pessoa
            inner join ref_aluno_projeti on aluno.id_aluno = ref_aluno_projeti.fk_aluno
            where aluno.fk_pessoa = :fk_pessoa";
            $conexao = DB::conexao();
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':fk_pessoa',$fk_pessoa,PDO::PARAM_INT);
            $stmt->execute();
            if($stmt){
              $temporario = null;
              foreach($stmt as $objeto){
                $temporario = new Projeti();
                $temporario->setIdProjeti($objeto['fk_projeti']);
              }
              return $temporario;
              }
            }

            public function setIdProjeti($fk_projeti){
              $this->fk_projeti = $fk_projeti;
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

       public function setDescricao($descricao){ //adicionar o s de descricao
         $this->descricao = $descricao;
       }


  }

?>
