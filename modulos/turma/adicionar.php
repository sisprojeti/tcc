<?php
include_once("classes/class.turma.php");
//include_once("classs/class.etapa.php");
  if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
    try{
      $turma = new Turma();
      $turma->setExercicioId($_POST['fk_exercicio']);
      $turma->setEtapaId($_POST['fk_etapa']);
      $turma->setCursoId($_POST['fk_curso']);
      $turma->setNomeTurma($_POST['nome']);
      $turma->setTurno($_POST['turno']);
      $turma->setLotacao($_POST['lotacao']);
      if(isset($_POST['status_finalizada'])){
        $turma->setStatusFinalizada(true);
       }else{
        $turma->setStatusFinalizada(false);
       }
      $turma->adicionar();
    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }
  }

  try{
    include_once("classes/class.exercicio.php");
    $listarExercicios = Exercicio::listar();
  } catch (PDOException $e){
    echo "ERROR".$e->getMessage();
  }

  try{
    include_once("classes/class.curso.php");
    $listarCursos = Curso::listar();
  } catch (PDOException $e){
    echo "ERROR".$e->getMessage();
  }

  try {
    include_once("classes/class.etapa.php");
    $listarEtapas = Etapa::listar();
  }catch(PDOException $e){
    echo "error".$e->getMessage();
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <style>
       .error{
             color:red
       }
</style>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <link rel="stylesheet" href="">
</head>
<body>
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cadastro Turma</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cadastro Turma</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --->
    <!-- Main content -->
<div class="container col-lg-12 navbar-white">
<div class="container col-lg-8 navbar-white">
<section class="content">
<div class="container-fluid">
<form role="form" id="form_turma" action="#" method="POST">
<div class="form-group">
  <label>Exercicío</label>
  <select class="form-control" name="fk_exercicio" id="fk_exercicio" required autofocus>
  <option value="">Selecione o Exercicio da Turma</option>
<?php if (isset($listarExercicios)):?>
  <?php foreach ($listarExercicios as $linha): ?>
    <option value="<?php echo $linha->getIdExercicio();?>"><?php echo $linha->getNomeAno();?></option>
<?php endforeach;?>
<?php endif;?>
</select>
</div>
<div class="form-group">
  <label>Curso</label>
  <select class="form-control" name="fk_curso" id="fk_curso" required>
  <option value="">Selecione o Curso da Turma</option>
  <?php if (isset($listarCursos)):?>
  <?php foreach ($listarCursos as $curso): ?>
  <option value="<?php echo $curso->getIdCurso();?>"><?php echo $curso->getNomeCurso();?></option>
<?php endforeach;?>
<?php endif;?>
 </select>
</div>
<div class="form-group">
  <label>Etapa</label>
  <select class="form-control" name="fk_etapa" id="fk_etapa" required>
  <option value="">Selecione a etapa da Turma</option>
  <?php if (isset($listarEtapas)):?>
    <?php foreach ($listarEtapas as $etapa): ?>
        <option value="<?php echo $etapa->getIdEtapa();?>"><?php echo $etapa->getNomeEtapa();?></option>
      <?php endforeach;?>
    <?php endif;?>
  </select>
</div>
<div class="form-group">
  <label>Nome</label>
  <input type="text" class="form-control"  placeholder="Ex: SIS 01" name="nome" id="nome" required>
</div>
<div class="form-group">
  <label>Lotação</label>
  <input type="number" class="form-control" placeholder="Digite o numero de lotacao" name="lotacao" id="lotacao" required>
</div>
<div class="form-group">
  <label>Turno</label>
  <select class="form-control" name="turno" id="turno" required>
    <option> Selecione um Turno.. </option>
    <option value="manhã"> Manhã </option>
    <option value="tarde"> Tarde </option>
    <option value="noite"> Noite </option>
  </select>
</div>
<div class="form-group">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
    <input type="checkbox" name="status_finalizada" class="custom-control-input" id="customSwitch3" value="true">
    <label class="custom-control-label" for="customSwitch3"> Ativo  </label>
</div>
 </div>
 <br>
                <!-- /.card-body -->
                <div class="form-group">
                  <input type="submit" name="button" value="Salvar" class="btn btn-primary" >
                  <button type="reset" class="btn btn-danger ">Limpar</button>
                </div>
              </form>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
    </div>

<script>
            $("#form_turma").validate({
       rules : {
              fk_exercicio:{
                    required:true
             },
              fk_curso:{
                    required:true
             },
              fk_etapa:{
                    required:true
             },
              nome:{
                    required:true
             },
             Lotação:{
                    required:true,
             },
             Lotacao:{
                    required:true,
             },
             turno:{
                    required:true,
             },
       },
       messages:{
              fk_exercicio:{
                    required:"Por favor, informe o exercicio"
             },
              fk_curso:{
                    required:"Por favor, informe o curso"
             },
              fk_etapa:{
                    required:"Por favor, informe a etapa"
             },
              nome:{
                    required:"Por favor, informe o nome da turma"
             },
              lotacao:{
                    required:"Por favor, informe a Lotação"
             },
             turno:{
                    required:"Por favor, informe o turno"
             },
       }

});


       </script>

</body>
</html>
