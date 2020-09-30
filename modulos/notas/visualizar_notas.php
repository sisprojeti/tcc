<?php
	include('classes/class.turma.php');
  	include('classes/class.exercicio.php');
  	include('classes/class.aluno.php');
  	include('classes/class.nota.php');
		try {
			$listagemNotas = Nota::listarCriterios();
			$id_aluno = Nota::recuperaIdAluno($_SESSION['fk_pessoa']);
			$recuperaIdProjeti = Nota::recuperaFkProjeti($id_aluno);
			$avaliadores = Nota::listarAvaliadorProjeti($recuperaIdProjeti);
			//mostrar($listagemNotas);
			// foreach ($listagemNotas as $listagem) {
			// 	echo $listagem->getNomeAvaliador()
			// }
		} catch (PDOException $e) {
			echo "Error".$e->getMessage();
		}

?>

<style type="text/css">


.topoturma{
	background: #fd7e14;
	border-radius: 10px 10px 0px 0px;
	height: 4%;
	font-size: 1.3em;
	color: #f4f4f4;
	padding: 2px 0px;
}
.corpo{
	margin: auto;
	width: 96%;
	border-radius: 10px 10px 10px 10px;
	box-shadow: 7px 7px 7px  rgba(0, 0, 0, 0.15), -7px -7px 7px rgba(0, 0, 0, 0.15);

}
.flex{
	display: flex;
	justify-content: space-between;
	padding: 0px 1%;
	font-size: 1em;
}
.rodapeturma{
	background: #f4f4f4;
	border-radius: 10px;
	border-radius: 0px 0px 10px 10px;
	height: 4%;
	font-size: 1.3em;
	color: #000;
	padding: 2px 0px;
}

</style>
<!------------------------------------- TEXTO ----------------------------------->
<div class="area_menu">
  <p class="texto-area">Visualizar Notas</p>
   <p> </p>
   <p></p>
</div>
<!------------ APRESENTAÇÃO --------------->
<div class="controls corpo">
	<p class="topoturma"> NOME DA TURMA</p>
<div class="controls flex">
<!------------ AVALIADORES ---------------->
	<div>
		<p><b>Avaliadores:</b></p>
		<ul>
			<?php foreach ($avaliadores as $avaliador): ?>
					<li> <?php echo $avaliador->getNomeAvaliador();?></li>
			<?php endforeach; ?>
			</ul>
	</div>
<!--------------- DATA --------------------->
	<div>
		<p> <b>Data: 30/08/2020 </b></p>
	</div>
</div>
<p class="rodapeturma"> NOME DO TEMA</p>
</div>
<br>
<!------------------------------------- NOTAS ----------------------------------->
<div class="controls corpo " >
	<p class="topoturma"> NOTAS</p>
<div class="controls flex ">
<!-------------- TABELA ---------------->
<table class="table table-bordered">
<thead>
	<tr>
	<th width=85% scope="col">Critérios</th>
	<th scope="col">Nota</th>
	<th scope="col">Nota</th>
	<th scope="col">Nota</th>
	<th scope="col">Média</th>
	</tr>
</thead>
<tbody>
	<?php $mediaTotal = 0; ?>
	<?php foreach ($listagemNotas as $listagem): ?>
		<tr>
			<td><?php echo $listagem->getNomeCriterio();?> </td>
			 <?php $peganota = Nota::pegaNota($id_aluno,$listagem->getIdCriterio());
			 		$mediaNota = 0;
					$mediaQuantidade = 0;
					foreach ($peganota as $notas):?>
				<td>
						<?php echo $notas->getValor();
				     $mediaNota += $notas->getValor();
						 $mediaQuantidade += 1;
						 ?>
				</td>
			<?php endforeach; ?>
			<td> <?php echo number_format($mediaNota/$mediaQuantidade,2,',','.');
						$mediaTotal = $mediaTotal + ($mediaNota/$mediaQuantidade);
					?>
			</td>
		</tr>
	<?php endforeach;?>
</tbody>
<tfoot>
	<td style="text-align: right;"> <b> Total </b></td>
	<td><?= $mediaTotal ?></td>
</tfoot>
</table>
</div>
</div>
