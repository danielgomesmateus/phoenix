<div class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
                <h1 class="title-page text-center">
                    Crie sua conta
                </h1>
                <?php
                    echo $this->Form->create('User');
                ?>
                    <div class="form-group">
                        <?php echo $this->Form->control('name', ['label' => 'Nome completo:', 'class' => 'form-control', 'id' => 'name', 'required' => 'required', 'maxlength' => 35]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('email', ['label' => 'Email de contato:', 'class' => 'form-control', 'id' => 'email', 'required' => 'required', 'maxlength' => 35]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('password', ['label' => 'Senha de acesso:', 'class' => 'form-control', 'id' => 'password', 'required' => 'required', 'maxlength' => 35, 'minlength' => 6]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Recaptcha->display(); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Criar conta
                        </button>
                    </div>
                <?php
                    echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
</div>