<div class="container-fluid">
    <div class="box box-danger" style="margin-top:15px;">
        <div class="box-header with-border">
            <h3 class="box-title">
                Editar dados
            </h3>
        </div>
        <?php echo $this->Form->create($user); ?>
            <div class="box-body">
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <div class="form-group">
                        <?php echo $this->Form->control('name', ['label' => 'Nome completo:', 'class' => 'form-control', 'id' => 'name', 'required' => 'required', 'maxlength' => 35]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('email', ['label' => 'Email de contato:', 'class' => 'form-control', 'id' => 'email', 'required' => 'required', 'maxlength' => 35]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('password', ['label' => 'Senha de acesso:', 'class' => 'form-control', 'id' => 'password', 'maxlength' => 35, 'minlength' => 6, 'value' => '']); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('social_name', ['label' => 'Razão social:', 'class' => 'form-control', 'id' => 'social_name', 'required' => 'required', 'maxlength' => 50]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('fantasy_name', ['label' => 'Nome fantasia:', 'class' => 'form-control', 'id' => 'fantasy_name', 'required' => 'required', 'maxlength' => 50]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('cnpj', ['label' => 'CNPJ:', 'class' => 'form-control', 'id' => 'cnpj', 'required' => 'required', 'maxlength' => 18]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('cep', ['label' => 'CEP:', 'class' => 'form-control', 'id' => 'cep', 'required' => 'required', 'maxlength' => 9]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('address', ['label' => 'Endereço:', 'class' => 'form-control', 'id' => 'address', 'required' => 'required', 'maxlength' => 100]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <div class="form-group">
                        <?php echo $this->Form->control('number', ['label' => 'Nº:', 'class' => 'form-control', 'id' => 'number', 'maxlength' => 5, 'type' => 'number']); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('neighborhood', ['label' => 'Bairro:', 'class' => 'form-control', 'id' => 'neighborhood', 'required' => 'required', 'maxlength' => 50]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('city', ['label' => 'Cidade:', 'class' => 'form-control', 'id' => 'city', 'maxlength' => 35]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('state', ['label' => 'Estado:', 'class' => 'form-control', 'id' => 'state', 'required' => 'required', 'maxlength' => 2]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('municipal_registration', ['label' => 'Registro municipal:', 'class' => 'form-control', 'id' => 'municipal_registration', 'maxlength' => 25]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('state_registration', ['label' => 'Registro estadual:', 'class' => 'form-control', 'id' => 'state_registration', 'maxlength' => 25]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('phones.0.landline', ['label' => 'Telefone fixo:', 'class' => 'form-control', 'id' => 'landline', 'maxlength' => 14]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('phones.0.cell_phone', ['label' => 'Celular:', 'class' => 'form-control', 'id' => 'cell_phone', 'maxlength' => 15]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('phones.0.id', ['type' => 'hidden']); ?>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>