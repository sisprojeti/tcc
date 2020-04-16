 <script type="text/javascript">
      $(document).ready(function(){
        $(".botao-detalhe").click(function(){
            var id_tarefa = $(this).attr("id");
            $("#conteudo_tarefa").load('modulos/tarefa/ajax/carrega_conteudo.php?id='+id_tarefa);
            $("#modal_detalhe").hide();
        });
        $(".fechar-detalhe").click(function(){
            $("#modal_detalhe").fadeOut();
        });
      });
  </script>

 <?php if(isset($listarTarefas)){?>
      <?php foreach ($listarTarefas as $tarefa){?>
      <div class="card">
          <div class="card-header">
            <?= $tarefa->getTituloTarefa()?>
          </div>
          <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
            <a href="#" class="btn btn-primary botao-detalhe" id="<?php echo $tarefa->getIdTarefa()?>">Detalhes</a>
          </div>
      </div>
      <?php }?>
    <?php }?>

<!-- Modal LOGO-->
<div class="modal" style="display:none;" id="modal_detalhe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Montar Logo</h5>
        <button type="button" class="close fechar-detalhe" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container col-lg-12 navbar-white">
         <section class="content navbar-light navbar-white">
           <div class="container-fluid navbar-white" id="conteudo_tarefa">

           </div><!-- /.container-fluid -->
         </section>
       </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary fechar-detalhe" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
