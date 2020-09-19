<?php

  class Projeti
  {
  	public $id_projeti;
    public $tema_projeti;
    public $descricao_projeti;
    public $aluno_um;

    public function __construct($id_projeti=false){
        if($id_projeti){
          $sql = "SELECT * from projeti where id_projeti = :id_projeti";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(":id_projeti",$id_projeti,PDO::PARAM_INT);
          $stmt->execute();
          foreach($stmt as $obj){
            $this->setIdProjeti($obj['id_projeti']);
            $this->setTema($obj['tema']);
            $this->setDescricao($obj['descricao']);
          }
        }
      }

      public static function contarProjeti()
        {
          try {
            $query = "select * from projeti";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        $totalProjetis = count($registros);
                        return $totalProjetis;
            }catch(Exception $e){
                echo "ERROR".$e->getMessage();
            }
          }

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

          // SELECT ref_aluno_projeti.fk_projeti,pessoa.id_pessoa,aluno.fk_pessoa,projeti.tema as tema_projeti,projeti.descricao as descricao_projeti from pessoa
          // inner join aluno on pessoa.id_pessoa = aluno.fk_pessoa
          // inner join ref_aluno_projeti on aluno.id_aluno = ref_aluno_projeti.fk_aluno
          // inner join projeti on projeti.id_projeti = ref_aluno_projeti.fk_projeti
          // where aluno.fk_pessoa = :fk_pessoa;


          public function listar(){
            try {
              $sql = "SELECT * FROM projeti";
              $stmt = DB::conexao()->prepare($sql);
              $stmt->execute();
              $registros = $stmt->fetchAll();
              if($registros){
                foreach($registros as $objeto){
                  $temporario = new Projeti();
                  $temporario->setIdProjeti($objeto['id_projeti']);
                  $temporario->setTemaProjeti($objeto['tema']);
                  $temporario->setTemaProjeti($objeto['descricao']);
                  $temporario->setDescricao($objeto['descricao']);
                  $itens[] = $temporario;
                }
                return $itens;
              }
            } catch (PDOException $e) {
              echo "Deu erro".$e->getMessage();
            }
          }

          public static function recuperaIdProjeti($fk_pessoa)
          {
            $sql = "SELECT ref_aluno_projeti.fk_projeti,
            pessoa.id_pessoa,
            aluno.fk_pessoa,
            pessoa.nome as aluno_um,
            projeti.tema as tema_projeti,
            projeti.descricao as descricao_projeti from pessoa
            inner join aluno on pessoa.id_pessoa = aluno.fk_pessoa
            inner join ref_aluno_projeti on aluno.id_aluno = ref_aluno_projeti.fk_aluno
            inner join projeti on projeti.id_projeti = ref_aluno_projeti.fk_projeti
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
                $temporario->setTemaProjeti($objeto['tema_projeti']);
                $temporario->setDescricaoProjeti($objeto['descricao_projeti']);
                $temporario->setNomeAlunoUm($objeto['aluno_um']);
              }
              return $temporario;
              }
            }

            public function setNomeAlunoUm($aluno_um){
              $this->aluno_um = $aluno_um;
            }

            public function setNomeAlunoDois($aluno_dois){
              $this->aluno_dois = $aluno_dois;
            }

            public function getFkProjeti(){
              return $this->fk_projeti;
            }

            public function getTemaProjeti(){
              return $this->tema_projeti;
            }

            public function setDescricaoProjeti($descricao_projeti){
              $this->descricao_projeti = $descricao_projeti;
            }

            public function setTemaProjeti($tema_projeti)
            {
              $this->tema_projeti = $tema_projeti;
            }



       /*------------------------------------/*
       ENCAPSULAMENTOS DO ID
       /*------------------------------------*/

       public function getIdProjeti(){
         return $this->id_projeti;
       }

       public function setIdProjeti($id_projeti){
         $this->id_projeti = $id_projeti;
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
         return $this->descricao_projeti;
       }

       public function setDescricao($descricao){ //adicionar o s de descricao
         $this->descricao = $descricao;
       }


  }

?>
