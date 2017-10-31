

<div class="row">
    <div class="col-md-8">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header" style="width: 220px;" data-background-color="custom">
                    
                    <h4 class="title">Cadastro</h4>
                    <p class="category">Preencha os dados abaixo</p>
                </div>
                <div class="card-content">
                    <?= $this->element('Forms/UsersForm') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-avatar">
                <a href="#pablo">
                    
                    <?php echo $this->Html->image('faces/default.png', ['alt' => 'User', 'class' => 'img']); ?>
                </a>
            </div>

            <div class="content">
                <h6 class="category text-gray">Cadastro de usuário</h6>
                <h4 class="card-title">Ajuda</h4>
                <p class="card-content">
                    Preencha os dados básicos do seu usuário. <br>
                    Para que esse usuário não possua credenciais de acesso ao sistema, marque a opção "Apenas funcionário".
                </p>
                <a href="#pablo" class="btn btn-warning btn-round">Suporte</a>
            </div>
        </div>
    </div>
</div>