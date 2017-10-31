<?= $this->Html->script('Select.select2.min') ?>
<?= $this->Html->css('Select.select2') ?>


<?php
    if(isset($userData)) 
        echo $this->Form->create($userData, ['id'=>'form']);
    else {
        echo $this->Form->create(null, [
            'url' => ['controller' => 'Users', 'action' => 'post']
        ]);
    }
?>
    <div class="row">
        <div class="col-md-12"><?= $this->Flash->render('call') ?></div>
        <div class="col-md-12">
            <div class="form-group label-floating">
                <label class="control-label">Nome</label>
                <?= $this->Form->text('ST_NOME_USU', ['class' => 'form-control']); ?>
            </div>
        </div>

        
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group label-floating">
                <label class="control-label">Apelido</label>
                <?= $this->Form->text('ST_APELIDO_USU', ['class' => 'form-control']); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group label-floating">
                <label class="control-label">Cargo</label>
                <?= $this->Form->text('ST_CARGO_USU', ['class' => 'form-control']); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="togglePanel" data-toggle="#userPanel" name="optionsCheckboxes"> Apenas funcionário
                </label>
            </div>
        </div>
    </div>

    <div class="row" id="userPanel">
        <div class="col-md-7">
            <div class="form-group label-floating">
                <label class="control-label">E-mail</label>
                <?= $this->Form->text('ST_EMAIL_USU', ['class' => 'form-control', 'type' => 'email', 'value' => '']); ?>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group label-floating">
                <label class="control-label">Senha</label>
                <?= $this->Form->password('ST_SENHA_USU', ['class' => 'form-control']); ?>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group label-floating">
                <label class="control-label">Acessos</label>
                <select class="form-control select2" multiple="multiple" name="ACESSSOS[]" style="width: 100%;">
                <?php foreach ($acessos as $key => $acesso): ?>
                    <?php 
                        if(isset($userAccess) && in_array($acesso['cod'], $userAccess))
                            $selected = 'selected';
                        else
                            $selected = '';
                    ?>
                    
                    <option <?= $selected; ?> value="<?= $acesso['cod']; ?>"><?= $acesso['alias'] ?> (<?= $acesso['cod']; ?>)</option>

                <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <?= $this->Form->submit('Finalizar', ['class' => 'btn btn-custom pull-right']); ?>
    <div class="clearfix"></div>
<?= $this->Form->end(); ?>

<?= $this->Html->script('scripts/forms.js') ?>

<script type="">
    document.getElementById("form").reset();
    $("input[name='ST_EMAIL_USU']").val();
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
