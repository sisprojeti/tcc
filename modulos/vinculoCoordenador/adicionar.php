<?php
include_once('classes/class.refCoordenadorCurso.php');

if(isset($_POST['button']) && $_POST['button'] === 'Salvar'){
  try {
    $novaRefCoordCurso = new RefCoordenadorCurso;
    $novaRefCoordCurso->setIdCursoRefCoordenador($_POST['fk_curso']);
    $novaRefCoordCurso->setIdCoordenadorRefCurso($_POST['fk_coordenador']);
    $novaRefCoordCurso->adicionar();
  } catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
  }
}

try{
    include_once('classes/class.coordenador.php');
    $listarCoordenadores = Coordenador::listar();
} catch (PDOException $e) {
    echo "ERROR".$e->getMessage();
}

try {
  include_once('classes/class.curso.php');
  $listarCursos = Curso::listar();
} catch (PDOExeption $e) {
  echo "ERROR".$e->getMessage();
}

?>

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">VCT CRM</h1>
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
             <select class="form-control" name="fk_coordenador">
              <option value="">Selecione a Coordenador</option>
               <?php if(isset($listarCoordenadores)):?>
                 <?php foreach ($listarCoordenadores as $coordenador):?>
                   <option value="<?php echo $coordenador->getIdCoordenador();?>"><?php echo $coordenador->getNome();?></option>
                 <?php endforeach;?>
               <?php endif;?>
             </select>
           </div>
           <div class="form-group">
             <label>Curso</label>
             <select class="form-control" name="fk_curso">
                <option value="">Selecione o Curso</option>
               <?php if(isset($listarCursos)):?>
                 <?php foreach($listarCursos as $curso):?>
                   <option value="<?php echo $curso->getIdCurso();?>"> <?php echo $curso->getNomeCurso();?> </option>
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
