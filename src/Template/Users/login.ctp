<div class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
                <h1 class="title-page text-center">
                    Acesse sua conta
                </h1>
                <?php echo $this->Form->create('User'); ?>
                    <div class="form-group">
                        <?php echo $this->Form->control('email', ['class' => 'form-control', 'id' => 'email', 'required' => 'required', 'maxlength' => 35, 'label' => 'Email de contato:']); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('password', ['class' => 'form-control', 'id' => 'password', 'required' => 'required', 'maxlength' => 35, 'minlength' => 6, 'label' => 'Senha de acesso:']); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Recaptcha->display(); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> Acessar conta
                        </button>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>