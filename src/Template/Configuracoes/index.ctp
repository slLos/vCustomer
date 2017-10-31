<div class="row">
	<div class="col-xs-12">
		<?= $this->Flash->render('call') ?>
	</div>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="card">
	        <div class="card-header" data-background-color="custom">
	        	<div style="width: 70%; display: inline-block;">
		            <h4 class="title">Unidades</h4>
		            <p class="category">Locais de serviços</p>
		        </div>

	            <div class="icon-groupR">
                	<button type="button" rel="tooltip" title="Cadastrar" style="color:#fff;" class="btn btn-default btn-simple btn-xs" data-toggle="modal" data-target="#novaUnidade">
						<i class="material-icons">group_add</i>
					</button>
                </div>
	        </div>
	        <div class="card-content table-responsive">
	            <table class="table table-hover">
	                <thead class="text-default">
	                    <th>ID</th>
	                	<th>Cidade</th>
	                	<th>UF</th>
	                	<th>Telefone</th>
	                	<th><center><i class="material-icons">settings</i></center></th>
	                </thead>
	                <tbody>
	                    <?php foreach($unidades as $unidade): ?>
		                	<?php
		                		$json = json_encode($unidade); 
		                	?>
		                    <tr>
		                    	<td><?= $unidade->ID_UNIDADE_UNI; ?></td>
		                    	<td><?= $unidade->ST_CIDADE_UNI; ?></td>
		                    	<td><?= $unidade->ST_ESTADO_UNI; ?></td>
		                    	<td><?= $unidade->ST_TELEFONE_UNI; ?></td>
		                    	<td>
									<center>
										<button type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs table-btn popularForm" dados='<?= $json; ?>' data-toggle="modal" data-target="#editarUnidade">
											<i class="material-icons">edit</i>
										</button>
										<button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs table-btn">
											<i class="material-icons">close</i>
										</button>
									</center>
								</td>
		                    </tr>
		                <?php endforeach; ?>
	                    
	                    
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>



<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3 class="title text-center">Outras configurações</h3>
        <br>
        <div class="nav-center">
            <ul class="nav nav-pills nav-pills-warning nav-pills-icons" role="tablist">
               
                <li class="active">
                    <a href="#description-1" role="tab" data-toggle="tab" aria-expanded="true">
                        <i class="material-icons">info</i> Geral
                    </a>
                </li>
                <li class="">
                    <a href="#schedule-1" role="tab" data-toggle="tab" aria-expanded="false">
                        <i class="material-icons">build</i> Serviços
                    </a>
                </li>
                <li class="">
                    <a href="#tasks-1" role="tab" data-toggle="tab" aria-expanded="false">
                        <i class="material-icons">directions_car</i> Modelos
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane limit-pane active" id="description-1">
                <div class="card">
                    <div class="card-header-panel">
                        <h4 class="card-title">Geral</h4>
                        <p class="category">
                        </p>
                    </div>
                    <div class="card-content" style="text-align: center;">
                    	<button class="btn btn-info btn-round" data-toggle="modal" data-target="#novoServico">
                            <i class="material-icons">build</i> Cadastrar serviço
                        	<div class="ripple-container"></div>
                        </button>

                        <button class="btn btn-warning btn-round" data-toggle="modal" data-target="#novoModelo">
                            <i class="material-icons">directions_car</i> Cadastrar modelo
                        	<div class="ripple-container"></div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="tab-pane limit-pane" id="schedule-1">
                <div class="card">
                    <div class="card-header-panel">
                        <h4 class="card-title">Serviços</h4>
                        <p class="category">
                            Lista de serviços cadastrados
                        </p>
                    </div>
                    <div class="card-content">
                        <table class="table table-hover">
			                <thead class="text-default">
			                    <th>ID</th>
			                	<th>Descrição</th>
			                	<th><center><i class="material-icons">settings</i></center></th>
			                </thead>
			                <tbody>
			                    <?php foreach($servicos as $servico): ?>
				                	<?php
				                		$json = json_encode($servico); 
				                	?>
				                    <tr>
				                    	<td><?= $servico->ID_SERVICO_SERV; ?></td>
				                    	<td><?= $servico->ST_DESCRICAO_SERV; ?></td>
				                    	<td>
											<center>
												<button type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs table-btn popularForm" dados='<?= $json; ?>' data-toggle="modal" data-target="#editarServico">
													<i class="material-icons">edit</i>
												</button>
												<button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs table-btn">
													<i class="material-icons">close</i>
												</button>
											</center>
										</td>
				                    </tr>
				                <?php endforeach; ?>
			                    
			                </tbody>
			            </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane limit-pane" id="tasks-1">
                <div class="card">
                    <div class="card-header-panel">
                        <h4 class="card-title">Modelos</h4>
                        <p class="category">
                            Lista de modelos cadastrados
                        </p>
                    </div>
                    <div class="card-content">
                        <table class="table table-hover">
			                <thead class="text-default">
			                    <th>ID</th>
			                	<th>Descrição</th>
			                	<th><center><i class="material-icons">settings</i></center></th>
			                </thead>
			                <tbody>

			                <?php foreach($modelos as $modelo): ?>
			                	<?php
			                		$json = json_encode($modelo); 
			                	?>
			                    <tr>
			                    	<td><?= $modelo->ID_MODELO_MOD; ?></td>
			                    	<td><?= $modelo->ST_DESCRICAO_MOD; ?></td>
			                    	<td>
										<center>
											<button type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs table-btn popularForm" dados='<?= $json; ?>' data-toggle="modal" data-target="#editarModelo">
												<i class="material-icons">edit</i>
											</button>
											<button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-simple btn-xs table-btn">
												<i class="material-icons">close</i>
											</button>
										</center>
									</td>
			                    </tr>
			                <?php endforeach; ?>
			                    
			                    
			                </tbody>
			            </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
	window.onload = function () {
	  [].forEach.call(document.querySelectorAll('.limit-pane'), function (el) {
	    Ps.initialize(el);
	  });
	};
</script>

<script>
	$('.popularForm').click(function () {
		var dados = $(this).attr('dados');
		var target = $(this).attr('data-target');

		dados = jQuery.parseJSON(dados);
		
		$.each( dados, function( key, value ) {
		  $(target + " input[name='"+key+"']").val(value);
		  $(target + " input[name='"+key+"']").parent( ".form-group" ).addClass('label-floating');
		  $(target + " input[name='"+key+"']").parent( ".form-group" ).removeClass('is-empty');
		});
	});

</script>



<!-- Modals -->

<!-- Cadastrar serviço -->
<div id="novoServico" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Novo serviço</h4>
			</div>
			<div class="modal-body">
				<?= $this->element('Forms/ServicosForm') ?>
			</div>
		</div>

	</div>
</div>

<div id="editarServico" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Novo serviço</h4>
			</div>
			<div class="modal-body">
				<?= $this->element('Forms/ServicosFormPut') ?>
			</div>
		</div>

	</div>
</div>


<!-- Cadastrar modelo -->
<div id="novoModelo" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Novo modelo</h4>
			</div>
			<div class="modal-body">
				<?= $this->element('Forms/ModelosForm') ?>
			</div>
		</div>

	</div>
</div>

<div id="editarModelo" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Editar modelo</h4>
			</div>
			<div class="modal-body">
				<?= $this->element('Forms/ModelosFormPut') ?>
			</div>
		</div>

	</div>
</div>

<div id="novaUnidade" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cadastrar unidade</h4>
			</div>
			<div class="modal-body">
				<?= $this->element('Forms/UnidadesForm') ?>
			</div>
		</div>

	</div>
</div>

<div id="editarUnidade" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Editar unidade</h4>
			</div>
			<div class="modal-body">
				<?= $this->element('Forms/UnidadesFormPut') ?>
			</div>
		</div>

	</div>
</div>