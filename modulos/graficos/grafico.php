<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Exemplo de gráfico</title>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(function(){
        var json_text = $.ajax({url: "modulos/graficos/getDadosGrafico.php", dataType:"json", async: false}).responseText; // getDadosGrafico.php é o arquivo php para puxar os dados do gráfico no banco
        var json = eval("(" + json_text + ")");
        var dados = new google.visualization.DataTable(json.dados);

        var chart = new google.visualization.PieChart(document.getElementById('area_grafico'));
        chart.draw(dados, json.config);
      });
    </script>
  </head>

  <body>
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gráficos de Desempenho</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Gráficos de Desempenho</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- DIV RESPONSÁVEL POR EXIBIR OS GRÁFICOS -->
             <div id="area_grafico" style="align-items: center"></div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>