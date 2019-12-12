<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
		      <!-- <img src="img/logo.png" width="150" height="100" class="d-inline-block align-center" alt=""> -->
		       <h1>Lista de Tarefas</h1>
		    </a>
			</div>
</nav>
<br>
		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="?modulo=tarefa&acao=home">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="?modulo=tarefa&acao=nova_tarefa">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#" style="color:#FFF;font-size:20px;">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9">Lavar o carro (status)</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger"></i>
										<i class="fas fa-edit fa-lg text-info"></i>
										<i class="fas fa-check-square fa-lg text-success"></i>
									</div>
								</div>

								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9">Passear com o cachorro (status)</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger"></i>
										<i class="fas fa-edit fa-lg text-info"></i>
										<i class="fas fa-check-square fa-lg text-success"></i>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
