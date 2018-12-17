<div class="col-xs-12">
    <div class="box box-primary" style="margin-top:15px;">
        <div class="box-header">
            <h3 class="box-title">
                Blocos
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
                            Status
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                    <?php
                        foreach($blocks as $block) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $block->title; ?>
                        </td>
                        <td>
                            <?php 
                                if($block->status == 1) { 
                            ?>
                            <span class="label label-success">Ativado</span>
                            <?php } else { ?>
                            <span class="label label-danger">Desativado</span>
                            <?php } ?>
                        </td>
                        <td>
                            <div>
                                <?php
                                    echo $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> Editar bloco', ['controller' => 'blocks', 'action' => 'edit', $block->id], ['alt' => 'Editar bloco', 'title' => 'Editar bloco', 'escape' => false, 'class' => 'label label-primary label-block']);
                                ?>
                            </div>
                            <div>
                                <?php    
                                    echo $this->Form->postLink('<i class="fa fa-exchange" aria-hidden="true"></i> Alterar status', ['controller' => 'blocks', 'action' => 'alterStatus', $block->id], ['escape' => false, 'confirm' => 'Deseja realmente alterar esta bloco?', 'class' => 'label label-warning label-block']);
                                ?>
                            </div>
                            <div>
                                <?php    
                                    echo $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i> Apagar bloco', ['controller' => 'blocks', 'action' => 'delete', $block->id], ['escape' => false, 'confirm' => 'Deseja realmente apagar esta bloco?', 'class' => 'label label-danger label-block']);
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