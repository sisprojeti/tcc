<?php
include_once("classes/class.turma.php");
//include_once("classs/class.etapa.php");
  if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
    try{
      $turma = new Turma();
      $turma->setExercicioId($_POST['exercicio_id']);
      $turma->setCursoId($_POST['curso_id']);
      $turma->setEtapaId($_POST['etapa_id']);
      $turma->setNome($_POST['nome']);
      $turma->setTurno($_POST['turno']);
      $turma->setLotacao($_POST['lotacao']);
      $turma->setStatusFinalizada($_POST['status_finalizada']);
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

         <form role="form" action="#" method="POST">
                  <div class="form-group">
                    <label>Exercicío</label>
                    <select class="form-control" name="exercicio_id">
                      <?php if (isset($listarExercicios)):?>
                        <?php foreach ($listarExercicios as $linha): ?>
                            <option value="">Selecione o Exercicio da Turma</option>
                            <option value="<?php echo $linha->getIdExercicio();?>"><?php echo $linha->getNomeAno();?></option>
                        <?php endforeach;?>
                      <?php endif;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Curso</label>
                    <select class="form-control" name="curso_id">
                      <?php if (isset($listarCursos)):?>
                        <?php foreach ($listarCursos as $curso): ?>
                            <option value="">Selecione o Curso da Turma</option>
                            <option value="<?php echo $curso->getId();?>"><?php echo $curso->getNome();?></option>
                        <?php endforeach;?>
                      <?php endif;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Etapa</label>
                    <select class="form-control" name="etapa_id">
                      <?php if (isset($listarEtapas)):?>
                        <?php foreach ($listarEtapas as $etapa): ?>
                            <option value="">Selecione a etapa da Turma</option>
                            <option value="<?php echo $etapa->getIdEtapa();?>"><?php echo $etapa->getNome();?></option>
                        <?php endforeach;?>
                      <?php endif;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control"  placeholder="Ex: SIS 01" name="nome">
                  </div>
                  <div class="form-group">
                    <label>Lotação</label>
                    <input type="number" class="form-control" placeholder="Digite o numero de lotacao" name="lotacao">
                  </div>
                  <div class="form-group">
                    <label>Turno</label>
                    <input type="text" class="form-control" name="turno" placeholder="Ex: 1">
                  </div>
                  <div class="form-group">
                    <label>Ativo: </label>
                   <input type="checkbox" name="status_finalizada" value="true" id="ativo">
                  </div> <br>
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
