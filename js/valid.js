$("#form_cadastroacademicos").validate({
       rules : {
             user:{
                    required:true,
             },
             nome:{
                    required:true,
                    minlength:16,
                    accept: "[a-zA-Z]+",
             },
             cpf:{
                    cpf: true,
                    required:true,
                    minlength:11,
             },
             email:{
                    
                    required:true,
                    email: true
             },
              telefone: {
                    required: true,
                    minlength: 13
             },
             semestre: {
                    required: true,
             },
             curso: {
                    required: true,
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
             user:{
                    required:"Por favor, informe seu usuario"
             },
             nome:{
                    required:"Por favor, informe seu nome",
                    minlength:"Insira o seu nome completo",
                    accept: "Cuidado! preencha o nome sem caracteres especiais"
             },
             email:{
                    required:"Por favor, informe o seu Email",
                    email:"Insira um Email válido."
             },
             cpf:{
                    required:"Por favor, informe o seu CPF válido",
                    minlength:"Insira todos os números do CPF"
             },
             telefone:{
                    required:"Por favor, insira o seu nº de telefone",
                    minlength: "Insira todos os números do seu telefone"
             },
             semestre:{
                    required:"Por favor, informe o nº do semestre"
             },
             curso:{
                    required:"Por favor, informe seu curso"
             },
             senha:{
                    required:"Insira sua senha",
                    passwordcheck:"Mínimo uma letra maiúsculas e um número",
                    minlength: "Sua senha deve ter no mínimo 8 caracteres, "
             },
             rsenha:{
                    required:"Repita sua senha",
                    equalTo: "Senhas diferentes",
                   
             },
             remember:{
                    required:"Marque após ter lido!"
             },                
       }
});

//Métodos para filtragem de validação


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

//CPF Válido BR
jQuery.validator.addMethod("cpf", function(value, element) {
   value = jQuery.trim(value);

    value = value.replace('.','');
    value = value.replace('.','');
    cpf = value.replace('-','');
    while(cpf.length < 11) cpf = "0"+ cpf;
    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;
    for (i=0; i<11; i++){
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }
    if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
    b = 0;
    c = 11;
    for (y=0; y<10; y++) b += (a[y] * c--);
    if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

    var retorno = true;
    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

    return this.optional(element) || retorno;

}, "Informe um CPF válido");

