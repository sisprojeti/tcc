<script>
            $("#tarefa").validate({
       rules : {
             titulo:{
                    required:true,
                    minlength:6,
             },
             descricao:{
                    required:true,
                    minlength:6,
             },
              data_inicio:{
                    required:true,

             },
              data_fim:{
                    required:true,
             },
              data_entrega:{
                    required:true,

             },
             fk_status_tarefa:{
                    required:true,
             },
             fk_aluno:{
                    required:true,
             }
       },
       messages:{
            titulo:{
                    required:"Por favor, insira o título da tarefa",
                    minlength:"No mínimo 6 letras",
             },
             descricao:{
                    required:"Por favor, informe a descricao",
                    minlength:"No mínimo 6 letras",
             },
             data_inicio:{
                    required:"Por favor, informe a data de inicio",

             },
              data_fim:{
                    required:"Por favor, informe a data de fim",
             },
             data_entrega:{
                    required:"Por favor, informe a data de entrega",
             },
             fk_status_tarefa:{
                    required:" Informe o status da tarefa!",
             },
             fk_aluno:{
                    required:"Selecione um Responsável",
             }
       }
});

</script>