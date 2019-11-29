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
  <div class="container">
  <div class="row it">
    <div class="col-sm-offset-1 col-lg-12" id="one">
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
      <form role="form" id="form_anexos" action="#" method="POST">
      <div id="uploader">
        <div class="row uploadDoc">
          <div class="col-sm-3">
            <div class="docErr">Tipos de arquivos aceitos: "pdf", "docx", "doc", "pptx", "odp", "jpg", "jpeg", "png", "txt"</div>
            <!--error-->
            <div class="fileUpload btn btn-orange">
              <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon">
              <span class="upl" id="upload">Selecionar arquivo</span>
              <input type="file" class="upload up" name="up" id="up" onchange="readURL(this);" required  />
            </div>
            <!--classe btn-orange -->
          </div>
          <!--classe col-3 -->
          <div class="col-sm-8 ">
            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição..." required autofocus>
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
        <button type="submit" class="btn btn-outline-primary"><i class="fa fa-paper-plane"></i> Enviar</button>
      </div>
    </div>
    <!--one-->
  </div>
  <!-- row -->
</div>
</form>
<script>
            $("#form_anexos").validate({
       rules : {
              up:{
                    required:true
             },
             descricao:{
                    
                    required:true,
             },                                  
       },
       messages:{
              up:{
                    required:"Por favor, carregue um documento válido."
             },
              descricao:{
                    required:"Por favor, insira uma descricao"
             },  
       }

});


       </script>
</body>
</html>