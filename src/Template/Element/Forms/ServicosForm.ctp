<?= $this->Html->script('Select.select2.min') ?>
<?= $this->Html->css('Select.select2') ?>


<?php
    if(isset($servicoData)) 
        echo $this->Form->create($servicoData, ['id'=>'form']);
    else {
        echo $this->Form->create(null, [
            'url' => ['controller' => 'Servicos', 'action' => 'post']
        ]);
    }
?>

<div class="row">
    <div class="col-md-7">
        <div class="form-group label-floating">
            <label class="control-label">Descrição</label>
            <?= $this->Form->text('ST_DESCRICAO_SERV', ['class' => 'form-control']); ?>
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group label-floating">
            <label class="control-label">Valor (R$)</label>
            <?= $this->Form->text('VL_VALOR_SRV', ['class' => 'form-control']); ?>
        </div>
    </div>
</div>


<?= $this->Form->submit('Salvar', ['class' => 'btn btn-custom pull-right']); ?>
<div class="clearfix"></div>

<?= $this->Form->end(); ?>

<?= $this->Html->script('scripts/forms.js') ?>