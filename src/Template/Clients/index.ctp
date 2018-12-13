<div class="col-xs-12">
    <div class="box box-danger" style="margin-top:15px;">
        <div class="box-header">
            <h3 class="box-title">
                Clientes
            </h3>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Telefone
                        </th>
                        <th>
                            Razão Social
                        </th>
                        <th>
                            CNPJ
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                    <?php
                        foreach($clients as $client) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $client->name; ?>
                        </td>
                        <td>
                            <?php echo $client->phone; ?>
                        </td>
                        <td>
                            <?php echo $client->social_name; ?>
                        </td>
                        <td>
                            <?php echo $client->cnpj; ?>
                        </td>
                        <td>
                            <?php 
                                if($client->status == 1) { 
                            ?>
                            <span class="label label-success">Ativado</span>
                            <?php } else { ?>
                            <span class="label label-danger">Desativado</span>
                            <?php } ?>
                        </td>
                        <td>
                            <div>
                                <?php
                                    echo $this->Html->link('<i class="fa fa-search" aria-hidden="true"></i> Visualizar cliente', ['controller' => 'clients', 'action' => 'view', $client->id], ['alt' => 'Visualizar cliente', 'title' => 'Visualizar cliente', 'escape' => false]);
                                ?>
                            </div>
                            <div>
                                <?php    
                                    echo $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> Editar cliente', ['controller' => 'clients', 'action' => 'edit', $client->id], ['alt' => 'Editar cliente', 'title' => 'Editar cliente', 'escape' => false]);
                                ?>
                            </div>
                            <div>
                                <?php    
                                    echo $this->Html->link('<i class="fa fa-trash" aria-hidden="true"></i> Apagar cliente', ['controller' => 'clients', 'action' => 'view'], ['alt' => 'Apagar cliente', 'title' => 'Apagar cliente', 'escape' => false]);
                                ?>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>