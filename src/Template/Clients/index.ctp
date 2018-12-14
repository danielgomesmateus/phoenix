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
                                    echo $this->Html->link('<i class="fa fa-search" aria-hidden="true"></i> Visualizar cliente', ['controller' => 'clients', 'action' => 'view', $client->id], ['alt' => 'Visualizar cliente', 'title' => 'Visualizar cliente', 'escape' => false, 'class' => 'label label-primary label-block']);
                                ?>
                            </div>
                            <div>
                                <?php    
                                    echo $this->Form->postLink('<i class="fa fa-exchange" aria-hidden="true"></i> Alterar status', ['controller' => 'clients', 'action' => 'alterStatus', $client->id], ['escape' => false, 'confirm' => 'Deseja realmente alterar o status deste cliente?', 'class' => 'label label-warning label-block']);
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