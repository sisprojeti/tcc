<?php
      class FormularioAvaliacao
      {
        public $id_formulario_avaliacao;
        public $fk_turma;
        public $data_avaliacao;

        public function adicionar()
        {
          $sql = "INSERT INTO formulario_avaliacao(fk_turma,data_avaliacao) values (:fk_turma,:data_avaliacao)";
          $conexao = DB::conexao();
          $stmt = $conexao->prepare($sql);
          $stmt->bindParam(':fk_turma',$this->fk_turma);
          $stmt->bindParam(':data_avaliacao',$this->data_avaliacao);
          $stmt->execute();
          $ultimoIdFormulario = $conexao->lastInsertId();
          return $ultimoIdFormulario;
        }

        public function setFkTurma($fk_turma){
          $this->fk_turma = $fk_turma;
        }

        public function setDataAvaliacao($data_avaliacao){
          $this->data_avaliacao = $data_avaliacao;
        }

      }
  ?>
