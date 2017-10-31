<?= $this->Html->script('Select.select2.min') ?>
<?= $this->Html->css('Select.select2') ?>


<?php
    echo $this->Form->create(null, [
        'url' => ['controller' => 'Unidades', 'action' => 'post']
    ]);
    
?>
<input type="hidden" name="ID_UNIDADE_UNI">
<div class="row">
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">Endereço</label>
            <?= $this->Form->text('ST_ENDERECO_UNI', ['class' => 'form-control']); ?>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group label-floating">
            <label class="control-label">Nº</label>
            <?= $this->Form->text('NM_NUMERO_UNI', ['class' => 'form-control']); ?>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group label-floating">
            <label class="control-label">Bairro</label>
            <?= $this->Form->text('ST_BAIRRO_UNI', ['class' => 'form-control']); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="form-group label-floating">
            <label class="control-label">Cidade</label>
            <?= $this->Form->text('ST_CIDADE_UNI', ['class' => 'form-control']); ?>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group label-floating">
            <label class="control-label">UF</label>
            <?= $this->Form->text('ST_ESTADO_UNI', ['class' => 'form-control']); ?>
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group label-floating">
            <label class="control-label">Cep</label>
            <?= $this->Form->text('ST_CEP_UNI', ['class' => 'form-control']); ?>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-md-7">
        <div class="form-group label-floating">
            <label class="control-label">Complemento</label>
            <?= $this->Form->text('ST_COMPLEMENTO_UNI', ['class' => 'form-control']); ?>
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group label-floating">
            <label class="control-label">Telefone</label>
            <?= $this->Form->text('ST_TELEFONE_UNI', ['class' => 'form-control']); ?>
        </div>
    </div>

</div>




<?= $this->Form->submit('Salvar', ['class' => 'btn btn-custom pull-right']); ?>
<div class="clearfix"></div>

<?= $this->Form->end(); ?>

<?= $this->Html->script('scripts/forms.js') ?>