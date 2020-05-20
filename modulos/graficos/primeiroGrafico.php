<!DOCTYPE html>
  <html>
    <head>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Responsáveis da Tarefa', 'Total Tarefas'],
            <?php 

              include 'conexao.php';
               $query = $conexao->prepare("SELECT pessoa.nome as nome_responsavel_tarefa,
                COUNT(*) as id_tarefa,
                tarefa.fk_aluno as fk_aluno,
                tarefa.titulo as titulo,
                tarefa.data_inicio as data_inicio,
                tarefa.data_fim as data_fim,
                tarefa.data_conclusao as data_conclusao,
                tarefa.descricao as descricao,
                tarefa.data_cadastro as data_cadastro,
                tarefa.fk_status_tarefa as fk_status_tarefa,
                status_tarefa.nome as nome_status
                from tarefa
                join aluno on tarefa.fk_aluno = aluno.id_aluno
                join pessoa on aluno.fk_pessoa = pessoa.id_pessoa
                join status_tarefa on status_tarefa.id_status_tarefa = tarefa.fk_status_tarefa
                GROUP BY nome_responsavel_tarefa
                ");

              $query->execute(); 

              while ($dados = $query->fetch(PDO::FETCH_ASSOC)) {
                $nome = $dados['nome_responsavel_tarefa'];
                $total_tarefas = (int)$dados['id_tarefa'];
             ?>

            ['<?php echo $nome ?>', <?php echo $total_tarefas ?>],
            <?php } ?>
          ]);

          var options = {
            title: 'Total de Tarefas',
            legend: { position: 'top'},
            width: 300,
          };

          var chart = new google.visualization.PieChart(document.getElementById('graficoPizza'));

          chart.draw(data, options);
        }
      </script>
    </head>
    <body>
      <div id="graficoPizza" style="height: 400px;"></div>
    </body>
  </html>