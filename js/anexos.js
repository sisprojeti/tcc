var fileTypes = ["pdf", "docx", "doc", "pptx", "odp", "jpg", "jpeg", "png", "txt"]; //tipos de arquivos aceitos.
function readURL(input) {
  if (input.files && input.files[0]) {
    var extension = input.files[0].name
        .split(".")
        .pop()
        .toLowerCase(), //extensão de arquivo do arquivo de entrada
      isSuccess = fileTypes.indexOf(extension) > -1; //extensão em tipos aceitáveis

    if (isSuccess) {
      //sim
      var reader = new FileReader();
      reader.onload = function(e) {
        if (extension == "pdf") {
          $(input)
            .closest(".fileUpload")
            .find(".icon")
            .attr("src", "https://image.flaticon.com/icons/svg/179/179483.svg");
        } else if (extension == "docx" || extension == "doc") { // Tipos de Arquivos Documentos
          $(input)
            .closest(".fileUpload")
            .find(".icon")
            .attr("src", "https://image.flaticon.com/icons/svg/281/281760.svg");
        } else if (extension == "pptx" || extension == "odp") { //Tipo de Arquivos Apresentações
          $(input)
            .closest(".fileUpload")
            .find(".icon")
            .attr("src", "https://image.flaticon.com/icons/svg/281/281762.svg");
        } else if (extension == "png") { //Tipo de Arquivos imagens alta qualidade PNG
          $(input)
            .closest(".fileUpload")
            .find(".icon")
            .attr("src", "https://image.flaticon.com/icons/svg/136/136523.svg");
        } else if (extension == "jpg" || extension == "jpeg") { //Tipo de Arquivos imagens normais JPG ou JPEG "imagens jpeg"
          $(input)
            .closest(".fileUpload")
            .find(".icon")
            .attr("src", "https://image.flaticon.com/icons/svg/136/136524.svg");
        } else if (extension == "txt") { //Tipo de Arquivos de texto "anotações" bloco de notas
          $(input)
            .closest(".fileUpload")
            .find(".icon")
            .attr("src", "https://image.flaticon.com/icons/svg/136/136538.svg");
        } else {
          //console.log('here=>'+$(input).closest('.uploadDoc').length);
          $(input)
            .closest(".uploadDoc")
            .find(".docErr")
            .slideUp("slow");
        }
      };

      reader.readAsDataURL(input.files[0]);
    } else {
      //console.log('here=>'+$(input).closest('.uploadDoc').find(".docErr").length);
      $(input)
        .closest(".uploadDoc")
        .find(".docErr")
        .fadeIn();
      setTimeout(function() {
        $(".docErr").fadeOut("slow");
      }, 9000);
    }
  }
}
$(document).ready(function() {
  $(document).on("change", ".up", function() {
    var id = $(this).attr(
      "id"
    ); /* Obtém o caminho de arquivo e o nome do arquivo da entrada */
    var profilePicValue = $(this).val();
    var fileNameStart = profilePicValue.lastIndexOf(
      "\\"
    ); /* encontra o fim do caminho de arquivo */
    profilePicValue = profilePicValue
      .substr(fileNameStart + 1)
      .substring(0, 20); /* isola o nome do arquivo */
    //var profilePicLabelText = $(".upl"); /* encontra o texto do rótulo */
    if (profilePicValue != "") {
      //console.log($(this).closest('.fileUpload').find('.upl').length);
      $(this)
        .closest(".fileUpload")
        .find(".upl")
        .html(profilePicValue); /* altera o texto do rótulo */
    }
  });

  $(".btn-outline-dark").on("click", function() {
    $("#uploader").append(
      '<div class="row uploadDoc"><div class="col-sm-3"><div class="docErr">Por favor enviar arquivo válido</div><!--error--><div class="fileUpload btn btn-orange"> <img src="https://image.flaticon.com/icons/svg/136/136549.svg" class="icon"><span class="upl" id="upload">Selecione o Documento</span><input type="file" class="upload up" id="up" onchange="readURL(this);" /></div></div><div class="col-sm-8"><input type="text" class="form-control" name="" placeholder="Descrição..."></div><div class="col-sm-1"><a class="btn-check"><i class="fa fa-times"></i></a></div></div>'
    );
  });

  $(document).on("click", "a.btn-check", function() {
    if ($(".uploadDoc").length > 1) {
      $(this)
        .closest(".uploadDoc")
        .remove();
    } else {
      alert("Você precisa fazer o upload de pelo menos 1 documento.");
    }
  });
});
