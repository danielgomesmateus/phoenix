<div class="container-fluid">
    <div class="box box-primary" style="margin-top:15px;">
        <div class="box-header with-border">
            <h3 class="box-title">
                Adicionar bloco
            </h3>
        </div>
        <?php echo $this->Form->create($block); ?>
            <div class="box-body">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="form-group">
                        <?php echo $this->Form->control('title', ['label' => 'Título:', 'class' => 'form-control', 'id' => 'title', 'required' => 'required', 'maxlength' => 50]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Ck->input('content', ['label' => 'Conteúdo:', 'class' => 'form-control', 'id' => 'content', 'required' => 'required']); ?>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>