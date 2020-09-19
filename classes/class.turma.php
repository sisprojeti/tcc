<?php

  require_once('class.db.php');
    /*
      Criando a class de turma que será responsável por armazenar
      os atributos e metodos da class de turmas
    */

    class Turma
    {
      public $id_turma;
      public $id_projeti;
      public $fk_exercicio;
      public $fk_curso;
      public $curso;
      public $etapa;
      public $nome_exercicio;
      public $fk_etapa;
      public $nome;
      public $turno;
      public $lotacao;
      public $status_finalizada;
      public $nome_aluno;
      public $tema;
      public $descricao;


      public static function recuperaTurmaAluno($fk_aluno)
      {
        $sql = "SELECT turma.nome as nome_turma, turma.id_turma as id_turma
        from ref_aluno_turma
        join turma on turma.id_turma = ref_aluno_turma.fk_turma
        join aluno on aluno.id_aluno = ref_aluno_turma.fk_aluno
        where aluno.fk_pessoa = $fk_aluno";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        if($stmt){
          foreach($stmt as $objeto){
            $temporario = new Turma();
            $temporario->setIdTurma($objeto['id_turma']);
            $temporario->setNomeTurma($objeto['nome_turma']);
          }
          return $temporario;
          }
        }



      public function adicionar(){
        try{
          $sql = "INSERT INTO turma (fk_exercicio,fk_etapa,fk_curso,nome,turno,lotacao,status_finalizada) values (:fk_exercicio,:fk_etapa,:fk_curso,:nome,:turno,:lotacao,:status_finalizada)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':fk_exercicio',$this->fk_exercicio);
          $stmt->bindParam(':fk_etapa',$this->fk_etapa);
          $stmt->bindParam(':fk_curso',$this->fk_curso);
          $stmt->bindParam(':nome',$this->nome);
          $stmt->bindParam(':turno',$this->turno);
          $stmt->bindParam(':lotacao',$this->lotacao);
          $stmt->bindParam(':status_finalizada',$this->status_finalizada);
          $stmt->execute();
           if($stmt){
                    echo '
                    <div id="snoAlertBox" class="alert alert-success" data-alert="alert">Adicionado com sucesso</div>
                    ';
                  }
          // $resultado = $stmt->rowCount();
          // echo $resultado;
        }catch(PDOException $e){
            echo "ERROR".$e->getMessage();
        }
      }

      public static function listar($fk_exercicio = false,$fk_curso = false){
        try {
          $query = "SELECT turma.nome as turma,
                    turma.id_turma as id_turma,
                    turma.nome as nome,
                    turma.turno as turno,
                    turma.lotacao as lotacao,
                    turma.status_finalizada as status,
                    curso.nome as curso,
                    etapa.nome as etapa,
                    exercicio.nome_ano as nome_exercicio
                    from turma join etapa on turma.fk_etapa = etapa.id_etapa
                    join curso on turma.fk_curso = curso.id_curso
                    join exercicio on turma.fk_exercicio = exercicio.id_exercicio WHERE id_turma>= 1";
                    if($fk_exercicio){
                    $query.= " and fk_exercicio = $fk_exercicio";}
                    if($fk_curso){
                      $query .= " and fk_curso = $fk_curso";}
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      if($registros){
                        foreach($registros as $objeto){
                          $temporario = new Turma();
                          $temporario->setIdTurma($objeto['id_turma']);
                          $temporario->setNomeTurma($objeto['nome']);
                          $temporario->setCurso($objeto['curso']);
                          $temporario->setEtapa($objeto['etapa']);
                          $temporario->setTurno($objeto['turno']);
                          $temporario->setNomeExercicio($objeto['nome_exercicio']);
                          $itens[] = $temporario;
                        }
            return $itens;
        }
      }catch (PDOException $e){
        echo "ERROR".$e->getMessage();
      }
    return false;
  }

  public static function alunosProjeti($id_projeti){
    $query = "SELECT pessoa.nome as nome_aluno
    from ref_aluno_projeti
    join aluno on ref_aluno_projeti.fk_aluno = aluno.id_aluno
    join pessoa on aluno.fk_pessoa = pessoa.id_pessoa
    where ref_aluno_projeti.fk_projeti = $id_projeti";
    $stmt = DB::conexao()->prepare($query);
    $stmt->execute();
    $registros = $stmt->fetchAll();
    if($registros){
      foreach($registros as $objeto){
        $temporario = new Pessoa();
        $temporario->setNome($objeto['nome_aluno']);
        $itens[] = $temporario;
            }
      return $itens;
      }
  }

  public function getNome(){
    return $this->nome;
  }

  public static function listarProjetiTurma($id_turma){
    try {
      $query = "SELECT projeti.tema,projeti.id_projeti FROM projeti
      join ref_aluno_projeti on projeti.id_projeti = ref_aluno_projeti.fk_projeti
      join aluno on ref_aluno_projeti.fk_aluno = aluno.id_aluno
      join pessoa on aluno.fk_pessoa = pessoa.id_pessoa
      join ref_aluno_turma on aluno.id_aluno = ref_aluno_turma.fk_aluno
      join turma on ref_aluno_turma.fk_turma = turma.id_turma
      where turma.id_turma = $id_turma group by projeti.id_projeti";
                  $stmt = DB::conexao()->prepare($query);
                  $stmt->execute();
                  $registros = $stmt->fetchAll();
                  if($registros){
                    foreach($registros as $objeto){
                      $temporario = new Projeti();
                      $temporario->setIdProjeti($objeto['id_projeti']);
                      $temporario->setTemaProjeti($objeto['tema']);
                      $itens[] = $temporario;
                    }
        return $itens;
    }
  }catch (PDOException $e){
    echo "ERROR".$e->getMessage();
  }
}

public function setTemaProjeti($tema){
  $this->tema = $tema;
}

public function getTemaProjeti(){
  return $this->tema;
}

public function getNomeIntegrantes(){
  return $this->nome_aluno;
}

public function setDescricaoProjeti($descricao){
  $this->$descricao = $descricao;
}

public function setNomeIntegrantes($nome_aluno){
  $this->$nome_aluno = $nome_aluno;
}



    //implementando metodo de listar alunos de uma turma
    public static function listarAlunosTurma($id_turma=false){
      try {
        $query = "SELECT aluno.data_matricula as data_matricula,
                  aluno.situacao_aluno as situacao_aluno,
                  aluno.matricula as matricula,
                  aluno.fk_pessoa as fk_pessoa,
                  aluno.id_aluno as id_aluno,
                  pessoa.nome as nome_aluno,
                  turma.id_turma as id_turma from aluno
                  join ref_aluno_turma on aluno.id_aluno = ref_aluno_turma.fk_aluno
                  join pessoa on aluno.fk_pessoa = pessoa.id_pessoa
                  join turma on ref_aluno_turma.fk_turma = turma.id_turma where id_turma = $id_turma";
                    $stmt = DB::conexao()->prepare($query);
                    $stmt->execute();
                    $registros = $stmt->fetchAll();
                    if($registros){
                      foreach($registros as $objeto){
                        $temporario = new Aluno();
                        $temporario->setIdTurma($objeto['id_turma']);
                        $temporario->setIdAluno($objeto['id_aluno']);
                        $temporario->setNomeAluno($objeto['nome_aluno']);
                        $temporario->setDataMatricula($objeto['data_matricula']);
                        $temporario->setSituacaoAluno($objeto['situacao_aluno']);
                        $temporario->setMatricula($objeto['matricula']);
                        $temporario->setFkPessoa($objeto['fk_pessoa']);
                        $itens[] = $temporario;
                      }
          return $itens;
      }
    }catch (PDOException $e){
      echo "ERROR".$e->getMessage();
    }
  }

  public function setNomeAluno($nome_aluno){
    $this->nome_aluno = $nome_aluno;
  }

  public function getNomeAlunoTurma(){
    return $this->nome_aluno;
  }

    public static function contarTurmas()
      {
        try {
          $query = "select * from turma";
                      $stmt = DB::conexao()->prepare($query);
                      $stmt->execute();
                      $registros = $stmt->fetchAll();
                      $totalTurmas = count($registros);
                      return $totalTurmas;
          }catch(Exception $e){
              echo "ERROR".$e->getMessage();
          }
        }

        public function recuperaProfessorTurma()
        {
          $query = "select pessoa.nome from turma
           join professor join pessoa
           on professor.id_professor = pessoa.id_pessoa";
        }

/* =========Inicio encapsulamento id de turma =========*/
      public function setIdTurma($id_turma){
        $this->id_turma = $id_turma;
      }

      public function getIdTurma(){
          return $this->id_turma;
      }

      public function getIdProjeti(){
          return $this->id_projeti;
      }


      public function setCurso($curso)
      {
        $this->curso = $curso;
      }

      public function getCurso()
      {
        return $this->curso;
      }

      public function setEtapa($etapa)
      {
        $this->etapa = $etapa;
      }

      public function getEtapa()
      {
        return $this->etapa;
      }

       public function setNomeExercicio($nome_exercicio)
      {
        $this->nome_exercicio = $nome_exercicio;
      }

      public function getNomeExercicio()
      {
        return $this->nome_exercicio;
      }


/* =========Inicio encapsulamento da FK exercicio =========*/
      public function setExercicioId($fk_exercicio){
        $this->fk_exercicio = $fk_exercicio;
      }

      public function getExercicioId(){
        return $this->exercicio;
      }
/* =========Inicio encapsulamento da FK curso =========*/
      public function setCursoId($fk_curso){
        $this->fk_curso = $fk_curso;
      }

      public function getCursoId(){
        return $this->fk_curso;
      }
/* =========Inicio encapsulamento da FK etapa =========*/
      public function setEtapaId($fk_etapa){
        $this->fk_etapa = $fk_etapa;
      }

      public function getEtapaId(){
        return $this->fk_etapa;
      }

      /* =========Inicio encapsulamento id de turma =========*/
      public function getCodTurma(){
        return $this->id_turma;
      }

      public function setCodTurma($id_turma){
        $this->id_turma = $id_turma;
      }

      /* =========Inicio encapsulamento nome de turma =========*/
      public function getNomeTurma(){
        return $this->nome;
      }

      public function setNomeTurma($nome){
        $this->nome = $nome;
      }

      /* =========Inicio encapsulamento turno de turma =========*/
      public function getTurno(){
        return $this->turno;
      }

      public function setTurno($turno){
        $this->turno = $turno;
      }

      /* =========Inicio encapsulamento de status turma =========*/
      public function getStatusFinalizada(){
        return $this->status_finalizada;
      }

      public function setStatusFinalizada($status_finalizada){
        $this->status_finalizada = $status_finalizada;
      }

      /* =========Inicio encapsulamento lotacao de turma =========*/
      public function getLotacao(){
        return $this->lotacao;
      }

      public function setLotacao($lotacao){
        $this->lotacao = $lotacao;
      }
    }

?>
