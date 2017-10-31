<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="custom">
                <div style="width: 70%; display: inline-block;">
                	<h4 class="title">Funcionários</h4>
                	<p class="category">Lista de funcionários e usuários do sistema</p>
                </div>

                <div class="icon-groupR">
                	<a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "post"]); ?>"><button type="button" rel="tooltip" title="Cadastrar" style="color:#fff;" class="btn btn-default btn-simple btn-xs">
						<i class="material-icons">group_add</i>
					</button></a>
                </div>
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <thead class="text-primary">
                    	<th>Id</th>
                    	<th>Nome</th>
                    	<th>Cargo</th>
						<th>Último login</th>
                    	<th><center><i class="material-icons">settings</i></center></th>
                    </thead>
                    <tbody>

                    <?php foreach($users as $user): ?>
                        <tr>
                        	<td><?= $user->ID_USUARIO_USU; ?></td>
                        	<td><?= $user->ST_NOME_USU; ?></td>
                        	<td><?= $user->ST_CARGO_USU; ?></td>
							<td class="text-primary"><?= date("d/m/Y à\s H:i:s", strtotime($user->DT_ULTIMOLOGIN_USU)); ?></td>
							<td>
								<center>
									<a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "put/".$user->ID_USUARIO_USU.""]); ?>"><button type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs table-btn">
										<i class="material-icons">edit</i>
									</button></a>
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

            <div class="box-footer clearfix"><br>
		    <?php echo $this->Paginator->counter(); ?>
		      <ul class="pagination pagination-sm no-margin pull-right">
		        <li><?php echo $this->Paginator->prev('Anterior'); ?></li>
		        <li><?php echo $this->Paginator->numbers(); ?>	</li>
		        <li><?php echo $this->Paginator->next('Próximo'); ?></li>
		      </ul>
		    </div>
        </div>
    </div>

   
</div>