<div class="col-xs-12">
    <div class="box box-primary" style="margin-top:15px;">
        <div class="box-header">
            <h3 class="box-title">
                Slide
            </h3>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>
                            Título
                        </th>
                        <th>
                            Descrição
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                    <?php
                        foreach($banners as $banner) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $banner->title; ?>
                        </td>
                        <td>
                            <?php echo $banner->description; ?>
                        </td>
                        <td>
                            <?php 
                                if($banner->status == 1) { 
                            ?>
                            <span class="label label-success">Ativado</span>
                            <?php } else { ?>
                            <span class="label label-danger">Desativado</span>
                            <?php } ?>
                        </td>
                        <td>
                            <div>
                                <?php
                                    echo $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> Editar imagem', ['controller' => 'banners', 'action' => 'edit', $banner->id], ['alt' => 'Editar imagem', 'title' => 'Editar imagem', 'escape' => false, 'class' => 'label label-primary label-block']);
                                ?>
                            </div>
                            <div>
                                <?php    
                                    echo $this->Form->postLink('<i class="fa fa-exchange" aria-hidden="true"></i> Alterar status', ['controller' => 'banners', 'action' => 'alterStatus', $banner->id], ['escape' => false, 'confirm' => 'Deseja realmente alterar esta imagem?', 'class' => 'label label-warning label-block']);
                                ?>
                            </div>
                            <div>
                                <?php    
                                    echo $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i> Apagar imagem', ['controller' => 'banners', 'action' => 'delete', $banner->id], ['escape' => false, 'confirm' => 'Deseja realmente apagar esta imagem?', 'class' => 'label label-danger label-block']);
                                ?>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <ul class="pagination pagination-sm no-margin pull-right">
        <?php echo $this->Paginator->numbers(); ?>
    </ul>
</div>