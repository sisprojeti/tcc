<div class="container">
  <div class="row it">
    <div class="col-sm-offset-1 col-sm-10" id="one">
      <p>
        Área destinada para envio de documentos da Av1, Av2 e Av3.
      </p><br>
      <div class="row">
        <div class="col-sm-offset-4 col-sm-12 form-group">
          <h3 class="text-center">Anexos</h3>
        </div>
        <!--form-group-->
      </div>
      <!--row-->
      <div id="uploader">
        <div class="row uploadDoc">
          <div class="col-sm-3">
            <div class="docErr">Tipos de arquivos aceitos: "pdf", "docx", "doc", "pptx", "odp", "jpg", "jpeg", "png", "txt"</div>
            <!--error-->
            <div class="fileUpload btn btn-orange">
              <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">
              <span class="upl" id="upload">Selecionar arquivo</span>
              <input type="file" class="upload up" id="up" onchange="readURL(this);" />
            </div>
            <!--classe btn-orange -->
          </div>
          <!--classe col-3 -->
          <div class="col-sm-8 ">
            <input type="text" class="form-control" name="" placeholder="Descrição...">
          </div>
          <!--classe col-8-->
          <div class="col-sm-1"><a class="btn-check"><i class="fa fa-times"></i></a></div>
          <!-- col-1 -->
        </div>
        <!--row-->
      </div>
      <!--uploader-->
      <div class="text-center">
        <a href="#" class="btn btn-outline-dark"><i class="fa fa-plus"></i> Adicionar novo</a>
        <a href="#" class="btn btn-outline-dark"><i class="fa fa-paper-plane"></i> Enviar</a>
      </div>
    </div>
    <!--one-->
  </div>
  <!-- row -->
</div>
