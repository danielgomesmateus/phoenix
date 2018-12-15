<div class="col-md-12 col-xs-12 col-sm-12">
    <div class="box box-primary" style="margin-top:15px;">
        <div class="box-header with-border">
            <h3 class="box-title">
                Editar cliente
            </h3>
        </div>
        <?php echo $this->Form->create($partner); ?>
            <div class="box-body">
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <div class="form-group">
                        <?php echo $this->Form->control('name', ['label' => 'Nome para contato:', 'class' => 'form-control', 'id' => 'name', 'required' => 'required', 'maxlength' => 35]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('phone', ['label' => 'Telefone para contato:', 'class' => 'form-control', 'id' => 'phone', 'required' => 'required', 'maxlength' => 15]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('social_name', ['label' => 'Razão social:', 'class' => 'form-control', 'id' => 'social_name', 'required' => 'required', 'maxlength' => 50]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('cnpj', ['label' => 'CNPJ:', 'class' => 'form-control', 'id' => 'cnpj', 'required' => 'required', 'maxlength' => 18]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('cep', ['label' => 'CEP:', 'class' => 'form-control', 'id' => 'cep', 'maxlength' => 9]); ?>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <div class="form-group">
                        <?php echo $this->Form->control('address', ['label' => 'Endereço:', 'class' => 'form-control', 'id' => 'address', 'maxlength' => 100]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('number', ['label' => 'Nº:', 'class' => 'form-control', 'id' => 'number', 'maxlength' => 5, 'type' => 'number']); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('neighborhood', ['label' => 'Bairro:', 'class' => 'form-control', 'id' => 'neighborhood', 'maxlength' => 50]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('city', ['label' => 'Cidade:', 'class' => 'form-control', 'id' => 'city', 'maxlength' => 35]); ?>
                    </div>                    
                    <div class="form-group">
                        <?php echo $this->Form->control('state', ['label' => 'Estado:', 'class' => 'form-control', 'id' => 'state', 'maxlength' => 2]); ?>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>