<div class="container-fluid">
    <div class="box box-primary" style="margin-top:15px;">
        <div class="box-header with-border">
            <h3 class="box-title">
                Adiciona página
            </h3>
        </div>
        <?php echo $this->Form->create($page); ?>
            <div class="box-body">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="form-group">
                        <?php echo $this->Form->control('title', ['label' => 'Título:', 'class' => 'form-control', 'id' => 'title', 'required' => 'required', 'maxlength' => 30]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('resume', ['label' => 'Resumo:', 'class' => 'form-control', 'id' => 'resume', 'required' => 'required', 'maxlength' => 150]); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Ck->input('content', ['label' => 'Conteúdo:', 'class' => 'form-control', 'id' => 'content', 'required' => 'required', ['allowedContent' => 'true']]); ?>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>