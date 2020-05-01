<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
        <link rel="stylesheet" href="_css/estilo.css">
    </head>

    <body>
      <button type="button" id="botao_a_fazer" name="button">A fazer</button>
      <button type="button" id="botao_fazendo" name="button">Fazendo</button>
      <button type="button" id="botao_revisao" name="button">Revisão</button>
      <button type="button" id="botao_feito" name="button">Feito</button>

        <div id="listagem_a_fazer"></div>
        <div id="listagem_fazendo"></div>
        <div id="listagem_revisao"></div>
        <div id="listagem_feito"></div>
        <script src="jquery.js"></script>
        <script>
        $('button#botao_a_fazer').click(function(){
          $('div#listagem_a_fazer').css('display','block');
          $('div#listagem_fazendo').css('display','none');
          $('div#listagem_revisao').css('display,','none');
          $('div#listagem_feito').css('display','none');
          carregarDadosAFazer();
        });

        $('button#botao_fazendo').click(function(){
          $('div#listagem_fazendo').css('display','block');
          $('div#listagem_a_fazer').css('display','none');
          $('div#listagem_revisao').css('display','none');
          $('div#listagem_a_feito').css('display','none');
          carregarDadosFazendo();
        });

        $('button#botao_revisao').click(function(){
          $('div#listagem_fazendo').css('display','block');
          $('div#listagem_a_fazer').css('display','none');
          carregarDadosFazendo();
        });

        $('button#botao_feito').click(function(){
          $('div#listagem_fazendo').css('display','block');
          $('div#listagem_a_fazer').css('display','none');
          carregarDadosFazendo();
        });

        function carregarDadosAFazer(){
          $.getJSON('_json/tarefas_a_fazer.json',function(dados_a_fazer){
            var elemento_a_fazer;
            elemento_a_fazer = "<ul>";
          $.each(dados_a_fazer,function(i,valor){
              elemento_a_fazer += "<li class='nome'>" + valor.titulo + "</li>";
              elemento_a_fazer += "<li class='preco'>" + valor.descricao + "</li>";
            });
            elemento_a_fazer += "</ul>";
            $('div#listagem_a_fazer').html(elemento_a_fazer);
          });
        };

        function carregarDadosFazendo(){
          $.getJSON('_json/tarefas_fazendo.json',function(dados_fazendo){
            var elemento_fazendo;
            elemento_fazendo = "<ul>";
          $.each(dados_fazendo,function(i,valor){
              elemento_fazendo += "<li class='nome'>" + valor.titulo + "</li>";
              elemento_fazendo += "<li class='preco'>" + valor.descricao + "</li>";
            });
            elemento_fazendo += "</ul>";
            $('div#listagem_fazendo').html(elemento_fazendo);
          });
        };

        function carregarDadosRevisao(){
          $.getJSON('_json/tarefas_fazendo.json',function(dados_fazendo){
            var elemento_fazendo;
            elemento_fazendo = "<ul>";
          $.each(dados_fazendo,function(i,valor){
              elemento_fazendo += "<li class='nome'>" + valor.titulo + "</li>";
              elemento_fazendo += "<li class='preco'>" + valor.descricao + "</li>";
            });
            elemento_fazendo += "</ul>";
            $('div#listagem_fazendo').html(elemento_fazendo);
          });
        };

        function carregarDadosFeito(){
          $.getJSON('_json/tarefas_fazendo.json',function(dados_fazendo){
            var elemento_fazendo;
            elemento_fazendo = "<ul>";
          $.each(dados_fazendo,function(i,valor){
              elemento_fazendo += "<li class='nome'>" + valor.titulo + "</li>";
              elemento_fazendo += "<li class='preco'>" + valor.descricao + "</li>";
            });
            elemento_fazendo += "</ul>";
            $('div#listagem_fazendo').html(elemento_fazendo);
          });
        };
        </script>
    </body>
</html>
