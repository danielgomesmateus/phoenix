<div class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12 content-form">
                <h1 class="title-page text-center">
                    Crie sua conta
                </h1>
                <?php
                    echo $this->Form->create('User');
                ?>
                    <div class="form-group">
                        <?php echo $this->Form->control('name', ['label' => 'Nome completo:', 'class' => 'form-control', 'id' => 'name', 'required' => 'required', 'maxlength' => 35, 'placeholder' => 'Informe o seu nome completo']); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('email', ['label' => 'Email de contato:', 'class' => 'form-control', 'id' => 'email', 'required' => 'required', 'maxlength' => 35, 'placeholder' => 'Informe um email de contato válido']); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('password', ['label' => 'Senha de acesso:', 'class' => 'form-control', 'id' => 'password', 'required' => 'required', 'maxlength' => 35, 'minlength' => 6, 'placeholder' => 'Informe uma senha de acesso']); ?>
                    </div>
                    <div class="form-group">
                        <?php
                            $options = [
                                '' => 'Escolha uma opção',
                                'accounting' => 'Contabilidade',
                                'company' => 'Empresa'
                            ];

                            echo $this->Form->control('role', ['label' => 'Tipo de usuário:', 'type' => 'select', 'options' => $options, 'class' => 'form-control', 'required' => 'required']);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Recaptcha->display(); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-submit">
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