<?php

    include_once("Classes/Tarefa.php");

    if(isset($_POST["button"]) && ($_POST["button"] === "Salvar")){
       try {
         $tarefa = new Tarefa();
         $tarefa->setTipoTarefa($_POST['tipo_tarefa']);
         $tarefa->setAssuntoTarefa($_POST['assunto']);
         $tarefa->setDataRealizacao($_POST['data_realizacao']);
         $tarefa->setHorarioRealizacao($_POST['horario_realizacao']);
         $tarefa->setResponsavel($_POST['responsavel']);
         $tarefa->adicionar();
       } catch (PDOException $e) {
         echo "ERROR".$e->getMessage();
       }
    }
?>

<section class="content-header">
  <h1>
    Cadastro de Tarefa
    <small></small>
  </h1>
</section>

<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <!-- small box -->
      <div class="small-box" style="border:1px solid orange;border-radius:10px;box-shadow:4px 4px 6px #ccc;color:orange;">
        <div class="container">
          <form method="POST" action="#">
              <div class="row">
                <div class="col-sm-12">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputEmail4" style="font-size:22px;">Tipo Tarefa</label>
                        <input type="text" style="border:1px solid orange;border-radius:10px;" name="tipo_tarefa" class="form-control" id="inputEmail4" placeholder="Digite tipo da tarefa">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="inputAddress" style="font-size:22px;">Assunto</label>
                        <input style="border:1px solid orange;border-radius:10px;" name="assunto" class="form-control" placeholder="Digite o assunto da tarefa">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="inputCity" style="font-size:22px;">Data Realizacao</label>
                        <input type="date" style="border:1px solid orange;border-radius:10px;" name="data_realizacao" class="form-control" placeholder="">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="inputPassword4" style="font-size:22px;">Horario Realizacao</label>
                        <input type="time" style="border:1px solid orange;border-radius:10px;" name="horario_realizacao" type="text" class="form-control" placeholder="Digite o cnpj da empresa">
                      </div>
                      <div class="form-group col-md-12">
                        <label for="inputText" style="font-size:22px;">Responsavel</label>
                        <input style="border:1px solid orange;border-radius:10px;" name="responsavel" type="text" class="form-control" placeholder="Digite o nome do responsavel pela tarefa">
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <input type="submit" name="button" value="Salvar" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>

      </div>
    </div>
</section>
