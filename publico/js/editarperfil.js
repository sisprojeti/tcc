/*Validações/ Jquery Validation/ editar perfil.html*/
$("#editarperfil").validate({
       rules : {
             nome:{
              required:true,
              minlength:16,
              accept: "[a-zA-Z]+",
             },
             email:{
                    required:true,
                    email: true
             },
              telefone: {
                    required: true,
                    minlength: 13
             },
             senha: {
                    required: true,
                    minlength: 8,
                    passwordcheck: true
             },
             rsenha: {
                    required: true,
                    equalTo: "#senha"
             }                           
       },
       messages:{
             nome:{
              required:"Por favor, informe seu nome",
              minlength:"Insira o seu nome completo",
              accept: "Cuidado! preencha o nome sem caracteres especiais"
             },
             email:{
                    required:"Por favor, informe o seu Email",
                    email:"Insira um Email válido."
             },
             telefone:{
                    required:"Por favor, insira o seu nº de celular",
                    minlength: "Insira todos os números do celular "
             },
             senha:{
                    required:"Insira sua senha",
                    passwordcheck:"mínimo uma letra e um número",
                    minlength: "Sua senha deve ter no mínimo 8 caracteres"
             },
             rsenha:{
                    required:"Repita sua senha",
                    equalTo: "Senhas diferentes",
                   
             },               
       }
});


  //NOME
  jQuery.validator.addMethod("accept", function(value, element, param) {
         return value.match(new RegExp("." + param + "$"));
       });
     
  //SENHA
$.validator.addMethod("passwordcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // 
       && /[a-z]/.test(value) // letra minúscula
       && /\d/.test(value) // número
});

     //EMAIL
 $.validator.addMethod( //Metodo, Filtro de Email Válido. por exemplo: "usuario@admin.state.in.us" ou "nome@site.a"
        'email',
        function(value, element){
            return this.optional(element) || /(^[-!#$%&'*+/=?^_`{}|~0-9A-Z]+(\.[-!#$%&'*+/=?^_`{}|~0-9A-Z]+)*|^"([\001-\010\013\014\016-\037!#-\[\]-\177]|\\[\001-\011\013\014\016-\177])*")@((?:[A-Z0-9](?:[A-Z0-9-]{0,61}[A-Z0-9])?\.)+(?:[A-Z]{2,6}\.?|[A-Z0-9-]{2,}\.?)$)|\[(25[0-5]|2[0-4]\d|[0-1]?\d?\d)(\.(25[0-5]|2[0-4]\d|[0-1]?\d?\d)){3}\]$/i.test(value);
        },
        'Insira um Email Válido.'
    );
