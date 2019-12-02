<?php include_once('class.db.php')?>
<?php

/**
 * Criando uma class com o nome "Tarefa" que será responsável por armazenar as tarefas referentes a cada oportunidade
 */
    // class Tarefa
    // {
    //   public $cod_tarefa;
    //   public $tipo_tarefa;
    //   public $assunto;
    //   public $data_realizacao;
    //   public $horario_realizacao;
    //   public $responsavel;
    //
    //   public function adicionar(){
    //     $sql = "INSERT INTO tarefa_teste(tipo_tarefa,assunto,data_realizacao,horario_realizacao,responsavel) values (:tipo_tarefa,:assunto,:data_realizacao,:horario_realizacao,:responsavel)";
    //     $conexao = DB::conexao();
    //     $stmt = $conexao->prepare($sql);
    //     $stmt->bindParam(':tipo_tarefa',$this->tipo_tarefa);
    //     $stmt->bindParam(':assunto',$this->assunto);
    //     $stmt->bindParam(':data_realizacao',$this->data_realizacao);
    //     $stmt->bindParam(':horario_realizacao',$this->horario_realizacao);
    //     $stmt->bindParam(':responsavel',$this->responsavel);
    //     $stmt->execute();
    //   }
    //
    //   public static function listar(){
    //     try {
    //       $sql = "SELECT * FROM tarefa_teste";
    //       $stmt = DB::conexao()->prepare($sql);
    //       $stmt->execute();
    //       $registros = $stmt->fetchAll();
    //       if($registros){
    //         $itens = array();
    //         foreach($registros as $objeto){
    //           $temporario = new Tarefa();
    //           $temporario->setCodTarefa($objeto['cod_tarefa']);
    //           $temporario->setTipoTarefa($objeto['tipo_tarefa']);
    //           $temporario->setAssuntoTarefa($objeto['assunto']);
    //           $temporario->setDataRealizacao($objeto['data_realizacao']);
    //           $temporario->setHorarioRealizacao($objeto['horario_realizacao']);
    //           $temporario->setResponsavel($objeto['responsavel']);
    //           $itens[] = $temporario;
    //         }
    //         return $itens;
    //       }
    //     } catch (PDOException $e) {
    //       echo "Deu merda".$e->getMessage();
    //     }
    //   }
    //
    //   public static function contarTarefas()
    //     {
    //       try {
    //         $query = "select * from tarefa_teste";
    //                     $stmt = DB::conexao()->prepare($query);
    //                     $stmt->execute();
    //                     $registros = $stmt->fetchAll();
    //                     $totalTarefas = count($registros);
    //                     return $totalTarefas;
    //         }catch(Exception $e){
    //             echo "ERROR".$e->getMessage();
    //         }
    //       }
    //
    //   //=====METODOS SETS=====//
    //
    //   public function setCodTarefa($cod_tarefa){
    //     $this->cod_tarefa = $cod_tarefa;
    //   }
    //
    //   public function setTipoTarefa($tipo_tarefa)
    //   {
    //     $this->tipo_tarefa = $tipo_tarefa;
    //   }
    //
    //   public function setAssuntoTarefa($assunto){
    //     $this->assunto = $assunto;
    //   }
    //
    //   public function setTitulo($titulo){
    //     $this->titulo = $titulo;
    //   }
    //
    //   public function setDataInicio($data_inicio){
    //     $this->data_inicio = $data_inicio;
    //   }
    //
    //   public function setDescricao($descricao){
    //     $this->descricao = $descricao;
    //   }
    //
    //   public function setDataTermino($data_termino){
    //     $this->data_termino = $data_termino;
    //   }
    //
    //   public function setResponsavel($responsavel){
    //     $this->responsavel = $responsavel;
    //   }
    //    //===== FINAL METODOS SETS=====//
    //
    //
    //   public function getCodTarefa(){
    //     return $this->cod_tarefa;
    //   }
    //
    //   public function getTipoTarefa()
    //   {
    //     return $this->tipo_tarefa;
    //   }
    //
    //   public function getAssunto()
    //   {
    //     return $this->assunto;
    //   }
    //
    //
    //   public function getTitulo(){
    //     return $this->titulo;
    //   }
    //
    //   public function getDescricao(){
    //     return $this->descricao;
    //   }
    //
    //   public function getDataRealizacao()
    //   {
    //     return $this->data_realizacao;
    //   }
    //
    //
    //
    //   public function getDataInicio(){
    //     return $this->data_inicio;
    //   }
    //
    //
    //
    //   public function getDataTermino(){
    //     return $this->data_termino;
    //   }
    //
    //   public function getResponsavel(){
    //     return $this->responsavel;
    //   }
    //
    //
    //
    //   public function setHorarioRealizacao($horario_realizacao){
    //     $this->horario_realizacao = $horario_realizacao;
    //   }
    //
    //   public function getHorarioRealizacao(){
    //     return $this->horario_realizacao;
    //   }
    //
    //   public function setDataRealizacao($data_realizacao)
    //   {
    //     $this->data_realizacao = $data_realizacao;
    //   }
    //
    //
    // }


?>
