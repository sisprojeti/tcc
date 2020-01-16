	<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
		      <!-- <img src="img/logo.png" width="150" height="100" class="d-inline-block align-center" alt=""> -->
		       <h1>Lista de Tarefas</h1>
		    </a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">

						<li class="list-group-item"><a href="?modulo=tarefa&acao=home">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="?modulo=tarefa&acao=nova_tarefa" style="color:orange;font-size:20px;">Nova tarefa</a></li>
						<li class="list-group-item"><a href="?modulo=tarefa&acao=todas_tarefas">Todas tarefas</a></li>
					</ul>
				</div>
				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova tarefa</h4>
								<hr />
								<form method="post" action="?modulo=tarefa&acao=tarefa_controller">
									<div class="form-group">
										<label>Descrição da tarefa:</label>
										<input name="tarefa" type="text" class="form-control" placeholder="Exemplo: Lavar o carro">
									</div>
									<button class="btn btn-success">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
