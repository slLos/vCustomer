<br><br><br>
<br><br><br>
<div class="row">
    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
        <?= $this->Form->create() ?>
            <div class="card card-login">
                <div class="card-header text-center" data-background-color="blue">
                    <h4 class="card-title">Acessar o sistema</h4>

                </div>
                <br>
                <?= $this->Flash->render('call') ?>
                <p class="category text-center">
                    Dados de acesso:
                </p>
                <div class="card-content">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Email</label>
                            <input name="ST_EMAIL_USU" type="email" class="form-control">
                        <span class="material-input"></span></div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                        </span>
                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Senha</label>
                            <input name="ST_SENHA_USU" type="password" class="form-control">
                        <span class="material-input"></span></div>
                    </div>
                </div>
                <div class="footer text-center">
                    <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Entrar</button>
                </div>
            </div>
        <?= $this->Form->end() ?>

    </div>
</div>