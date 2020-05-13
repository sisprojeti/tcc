<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Exemplo de gráfico</title>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(function(){
        var json_text = $.ajax({url: "getDadosGrafico.php", dataType:"json", async: false}).responseText; // getDadosGrafico.php é o arquivo php para puxar os dados do gráfico no banco
        var json = eval("(" + json_text + ")");
        var dados = new google.visualization.DataTable(json.dados);

        var chart = new google.visualization.PieChart(document.getElementById('area_grafico'));
        chart.draw(dados, json.config);
      });
    </script>
  </head>

  <body>
    <div id="area_grafico" style="align-items: center"></div>
  </body>
</html>