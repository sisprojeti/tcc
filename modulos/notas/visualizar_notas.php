<?php
	include('classes/class.turma.php');
  	include('classes/class.exercicio.php');
  	include('classes/class.aluno.php');
  	include('classes/class.nota.php');

		try {
			$listagemNotas = Nota::listar();
			mostrar($listagemNotas);
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
			<li> aaa</li>
			<li> aaa</li>
			<li> aaa</li>
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
	</tr>
</thead>
<tbody>
	<tr>
		<td>lalalala</td>
		<td> 5</td>
	</tr>
</tbody>
<tfoot>
	<td style="text-align: right;"> <b> Média </b></td>
	<td>5.1</td>
</tfoot>
</table>
</div>
</div>
