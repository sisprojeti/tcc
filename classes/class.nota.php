<?php

    class Nota
    {
      public $id_nota;
      public $valor;
      public $data_modificacao;
      public $fk_criterio;
      public $fk_aluno;
      public $fk_professor;

      public function adicionar()
      {
        $sql = "INSERT INTO
         nota(valor,data_modificacao,fk_criterio,fk_aluno,fk_professor)
         values (:valor,:data_modificacao,:fk_criterio,:fk_aluno,:fk_professor)";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':valor',$this->valor);
        $stmt->bindParam(':data_modificacao',$this->data_modificacao);
        $stmt->bindParam(':fk_criterio',$this->fk_criterio);
        $stmt->bindParam(':fk_aluno',$this->fk_aluno);
        $stmt->bindParam(':fk_professor',$this->fk_professor);
        $stmt->execute();
      }

      public static function recuperaIdProfessor($fk_pessoa)
      {
        $sql = "SELECT professor.id_professor as id_professor from professor
        join pessoa on pessoa.id_pessoa = professor.fk_pessoa where professor.fk_pessoa = :fk_pessoa";
        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':fk_pessoa',$fk_pessoa);
        $stmt->execute();
        $rg = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$obj['id_professor'];
        if ($rg) {
            return $rg[0]['id_professor'];
          }
        }

        public static function listar(){
          try {
            $query = "SELECT nota.id_nota as id_nota,
                             nota.valor as valor,
                             nota.data_modificacao as data_modificacao,
                             nota.fk_criterio as fk_criterio,
                             nota.fk_aluno as fk_aluno,
                             nota.fk_professor as fk_professor,
                             pessoa.nome as nome_avaliador,
                             avaliador_projeti.fk_professor as fk_professor,
                             criterio.nome as nome_criterio
                             from nota
                             join pessoa
                             join avaliador_projeti
                             on pessoa.id_pessoa = avaliador_projeti.fk_professor
                             join criterio on criterio.id_criterio = nota.fk_criterio";
                        $stmt = DB::conexao()->prepare($query);
                        $stmt->execute();
                        $registros = $stmt->fetchAll();
                        if($registros){
                          foreach($registros as $objeto){
                            $temporario = new Nota();
                            $temporario->setIdNota($objeto['id_nota']);
                            $temporario->setValor($objeto['valor']);
                            $temporario->setDataModificacao($objeto['data_modificacao']);
                            $temporario->setFkCriterio($objeto['fk_criterio']);
                            $temporario->setFkAluno($objeto['fk_aluno']);
                            $temporario->setFkProfessor($objeto['fk_professor']);
                            $temporario->setNomeAvaliador($objeto['nome_avaliador']);
                            $temporario->setNomeCriterio($objeto['nome_criterio']);
                            $itens[] = $temporario;
                          }
              return $itens;
          }
        }catch (PDOException $e){
          echo "ERROR".$e->getMessage();
        }
      }

      public function setIdNota($id_nota){
        $this->id_nota = $id_nota;
      }

      public function setNomeAvaliador($nome_avaliador){
        $this->nome_avaliador = $nome_avaliador;
      }

      public function setNomeCriterio($nome_criterio){
        $this->nome_criterio = $nome_criterio;
      }

      public function setValorMaximo($valor_maximo){
        $this->valor_maximo = $valor_maximo;
      }

      public function setValor($valor){
        $this->valor = $valor;
      }

      public function setFkProfessor($id_professor){
        $this->fk_professor = $id_professor;
      }


      public function getValor(){
        return $this->valor;
      }

      public function getIdPessoa(){
        return $this->valor;
      }

      public function setDataModificacao($data_modificacao){
        $this->data_modificacao = $data_modificacao;
      }

      public function getDataModificacao(){
        return $this->data_modificao;
      }

      public function setFkCriterio($fk_criterio){
        $this->fk_criterio = $fk_criterio;
      }

      public function getFkCriterio(){
        return $this->fk_criterio;
      }

      public function setFkAluno($fk_aluno){
        $this->fk_aluno = $fk_aluno;
      }

      public function getFkPessoa(){
        return $this->fk_aluno;
      }

      public function getFkProfessor(){
        return $this->fk_professor;
      }


    }

?>
