<?php

    class RefAlunoProjeti
    {
      public $id_ref_aluno_projeti;
      public $fk_projeti;
      public $fk_aluno;
      public $nomeAluno;

      public function adicionar()
      {
        $sql = "INSERT INTO ref_aluno_projeti(fk_projeti,fk_aluno) values (:fk_projeti,:fk_aluno)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':fk_projeti',$this->fk_projeti);
        $stmt->bindParam(':fk_aluno',$this->fk_aluno);
        $stmt->execute();
      }

      public function listar()
      {
        $query ="select nome from aluno
         join pessoa on aluno.id_aluno = pessoa.id_pessoa
         join ref_aluno_projeti on ref_aluno_projeti.fk_aluno = aluno.id_aluno";

      }

      public static function listarAlunosProjeti()
        {
          try {

              $query ="select nome as nome_aluno,ref_aluno_projeti.fk_aluno as fk_aluno from aluno
               join pessoa on aluno.id_aluno = pessoa.id_pessoa
               join ref_aluno_projeti on ref_aluno_projeti.fk_aluno = aluno.id_aluno";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new RefAlunoProjeti();
                            $temporario->setFkAlunoProjeti($objeto['fk_aluno']);
                            $temporario->setNomeAlunoProjeti($objeto['nome_aluno']);
                            $itens[] = $temporario;
                          }
              return $itens;
            }
          } catch (Exception $e) {
              echo "ERROR".$e->getMessage();
          }
        }

      public function setFkAlunoProjeti($fk_aluno){
        $this->fk_aluno = $fk_aluno;
      }

      public function getIdRefAlunoProjeti()
      {
        return $this->fk_aluno;
      }

      public function setNomeAlunoProjeti($nome_aluno)
      {
        $this->nomeAluno = $nome_aluno;
      }

      public function getNomeAlunoProjeti()
      {
        return $this->nomeAluno;
      }
      public function getFkAluno(){
        return $this->fk_aluno;
      }

      public function getFkProjeti(){
        return $this->fk_projeti;
      }

      public function setFkProjeti($fk_projeti){
        $this->fk_projeti = $fk_projeti;
      }

      public function setFkAluno($fk_aluno){
        $this->fk_aluno = $fk_aluno;
      }
    }

?>
