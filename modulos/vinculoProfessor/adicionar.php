<?php
include_once('classes/class.refProfTurma.php');

    if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
      try {
        $novaRefProfTurma = new RefProfTurma;
        $novaRefProfTurma->setIdProfessor($_POST['professor_id']);
        $novaRefProfTurma->setIdTurma($_POST['turma_id']);
        $novaRefProfTurma->adicionar();
      } catch (PDOException $e) {
        echo "error".$e->getMessage();
      }
    }

    try{
      include_once('classes/class.professor.php');
      $listarProfessores = Professor::listar();
    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }

    try{
      include_once('classes/class.turma.php');
      $listarTurmas = Turma::listar();
    }catch(PDOException $e){
      echo "ERROR".$e->getMessage();
    }
?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Enturmar Professor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enturmar Professor</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
<br>
    <div class="container col-lg-8">
    <section class="content">
      <div class="container-fluid">
         <form role="form" action="#" method="POST">
           <div class="form-group">
             <label>Turma</label>
             <select class="form-control" name="turma_id">
               <?php if(isset($listarTurmas)):?>
                 <option value="">Selecione a Turma</option>
                 <?php foreach ($listarTurmas as $linha):?>
                   <option value="<?php echo $linha->getIdTurma();?>"><?php echo $linha->getNome();?></option>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>
           <div class="form-group">
             <label>Professor</label>
             <select class="form-control" name="professor_id">

               <?php if(isset($listarProfessores)):?>
                 <option value="">Selecione o Professor</option>
                 <?php foreach($listarProfessores as $professor):?>
                   <option value="<?php echo $professor->getIdProfessor();?>"> <?php echo $professor->getNome();?> </option>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>
                <div class="form-group">
                  <input type="submit" name="button" value="Salvar" class="btn btn-primary" >
                  <button type="reset" class="btn btn-danger ">Limpar</button>
                </div>
              </form>
      </div>
    </section>
</div>
