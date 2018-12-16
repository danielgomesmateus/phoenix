<div class="col-xs-12">
    <div class="box box-primary" style="margin-top:15px;">
        <div class="box-header">
            <h3 class="box-title">
                Páginas
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
                            Resumo
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                    <?php
                        foreach($pages as $page) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $page->title; ?>
                        </td>
                        <td>
                            <?php echo $page->resume; ?>
                        </td>
                        <td>
                            <?php 
                                if($page->status == 1) { 
                            ?>
                            <span class="label label-success">Ativado</span>
                            <?php } else { ?>
                            <span class="label label-danger">Desativado</span>
                            <?php } ?>
                        </td>
                        <td>
                            <div>
                                <?php
                                    echo $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> Editar página', ['controller' => 'pages', 'action' => 'edit', $page->id], ['alt' => 'Editar página', 'title' => 'Editar página', 'escape' => false, 'class' => 'label label-primary label-block']);
                                ?>
                            </div>
                            <div>
                                <?php    
                                    echo $this->Form->postLink('<i class="fa fa-exchange" aria-hidden="true"></i> Alterar status', ['controller' => 'pages', 'action' => 'alterStatus', $page->id], ['escape' => false, 'confirm' => 'Deseja realmente alterar esta página?', 'class' => 'label label-warning label-block']);
                                ?>
                            </div>
                            <div>
                                <?php    
                                    echo $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i> Apagar página', ['controller' => 'pages', 'action' => 'delete', $page->id], ['escape' => false, 'confirm' => 'Deseja realmente apagar esta página?', 'class' => 'label label-danger label-block']);
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