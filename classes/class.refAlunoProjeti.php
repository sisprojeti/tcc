<?php
    require_once('classes/class.aluno.php');
    class RefAlunoProjeti
    {
      public $id_ref_aluno_projeti;
      public $fk_projeti;
      public $fk_aluno;
      public $nomeAluno;

      // public function __construct($id_ref_aluno_projeti=false){
      //     if($id_ref_aluno_projeti){
      //       $sql = "SELECT * FROM ref_aluno_projeti where id_ref_aluno_projeti = :id_ref_aluno_projeti";
      //       $stmt = DB::conexao()->prepare($sql);
      //       $stmt->bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);
      //       $stmt->execute();
      //       foreach($stmt as $obj){
      //         $this->setIdRefAlunoProjeti($obj['id_ref_aluno_projeti']);
      //         $this->setFkPessoa($obj['fk_aluno']);
      //       }
      //     }
      //   }

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
         //select pra selecionar nome de alunos em projeti// select pessoa.nome from aluno join ref_aluno_projeti on aluno.id_aluno = ref_aluno_projeti.fk_aluno join pessoa on pessoa.id_pessoa = aluno.fk_pessoa;
      }

      // public static function verificaAlunoProjeti() //metodo pra verificar se o aluno esta fazendo parte de algum projeti
      // {
      // }

      public function recuperaPessoa()
      {
        return new Pessoa($this->fk_pessoa);
      }

      public function recuperaAlunoProjeti(){
        return new RefAlunoProjeti($this->fk_aluno);
      }

      // public function selecionaAlunoTarefa() //metodo pra selecionar o aluno vinculado a uma tarefa
      // {
      //   $query = "SELECT pessoa.nome from pessoa join aluno on pessoa.id_pessoa = aluno.fk_pessoa
      //   join ref_aluno_projeti on aluno.id_aluno = ref_aluno_projeti.fk_aluno
      //   join tarefa on tarefa.fk_ref_aluno_projeti = ref_aluno_projeti.fk_aluno";
      // }

      public static function listarAlunosProjeti($fk_pessoa=null)
        {
          try {

               $query = "SELECT ref_aluno_projeti.fk_projeti as fk_projeti,aluno.id_aluno as id_aluno,aluno.fk_pessoa as id_pessoa,pessoa.nome as nome_aluno FROM aluno
               inner join pessoa on aluno.fk_pessoa = pessoa.id_pessoa
               inner join ref_aluno_projeti on aluno.id_aluno = ref_aluno_projeti.fk_aluno";
               if($fk_pessoa){
                 $query .= " where aluno.fk_pessoa = '9' and ref_aluno_projeti.fk_projeti = (SELECT fk_projeti FROM ref_aluno_projeti where fk_aluno = aluno.id_aluno)";
               }
               //fazer verificação de onde o fk_projeti seja igual ao f
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $stmt->bindParam(':fk_pessoa',$fk_pessoa);
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Aluno();
                            $temporario->setIdAluno($objeto['id_aluno']);
                            $temporario->setNomeAluno($objeto['nome_aluno']);
                            $itens[] = $temporario;
                          }
              return $itens;
              print_r($itens);
            }
          } catch (Exception $e) {
              echo "ERROR".$e->getMessage();
          }
        }

        public function verificaAlunoProjeti($fk_aluno)
          {
            try {

                $query ="select * from ref_aluno_projeti where fK_aluno = :fk_aluno";
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
