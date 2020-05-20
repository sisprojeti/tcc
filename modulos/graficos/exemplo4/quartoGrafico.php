<!DOCTYPE html>
  <html>
    <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Responsáveis da Tarefa', 'Total de Tarefas'],
            <?php 

            include 'conexao.php';
            $query = $conexao->prepare("SELECT pessoa.nome as nome_responsavel_tarefa,
            COUNT(*) as id_tarefa,
            tarefa.fk_aluno as fk_aluno
            from tarefa
            join aluno on tarefa.fk_aluno = aluno.id_aluno
            join pessoa on aluno.fk_pessoa = pessoa.id_pessoa
            GROUP BY nome_responsavel_tarefa
            ");
            //$query = $conexao->prepare("SELECT fk_aluno, COUNT(*) as id_tarefa FROM tarefa GROUP BY fk_aluno");
            $query->execute(); 

            while ($dados = $query->fetch(PDO::FETCH_ASSOC)) {
              $nome = $dados['nome_responsavel_tarefa'];
              $total_tarefas = (int)$dados['id_tarefa'];

             ?>

            ['<?php echo $nome ?>',  <?php echo $total_tarefas ?>],
            <?php } ?>
          ]);

          var options = {
            chart: {
              title: 'Quantitativo de tarefas por aluno',
              subtitle: 'Nome dos Responsáveis',
            }
          };

          var chart = new google.charts.Bar(document.getElementById('graficoColuna'));

          chart.draw(data, google.charts.Bar.convertOptions(options));
        }
      </script>
    </head>
    <body>
      <div id="graficoColuna" style="width: 800px; height: 500px;"></div>
    </body>
  </html>