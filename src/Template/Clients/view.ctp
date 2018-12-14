<div class="container-fluid">
    <div class="box box-danger" style="margin-top:15px;">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-globe"></i> <?php echo $client->name; ?> - (<?php echo $client->social_name; ?>)
            </h3>
            <div class="pull-right">
                Data de cadastro: <?php echo date("d/m/Y H:i:s", strtotime($client->created)); ?>
            </div>
        </div>
        <div class="box-body">
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong><?php echo $client->social_name; ?></strong><br>
                        <?php echo $client->address; ?><br>
                        <?php echo $client->state; ?>, <?php echo $client->city; ?>, <?php echo $client->neighborhood; ?>, nº <?php echo $client->number; ?><br>
                        <br>
                    </address>
                </div>
                <div class="col-sm-4 invoice-col">
                    <b>
                        Identificador: #<?php echo $client->id; ?>
                    </b>
                    <br />
                    <b>
                        CNPJ:
                    </b> 
                    <?php echo $client->cnpj; ?>
                    <br />
                    <b>
                        Telefone:
                    </b> 
                    <?php echo $client->phone; ?>
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <p class="lead">
                        Lançamentos
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>
                                        Mês
                                    </th>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Ano:
                                    </th>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Total:
                                    </th>
                                    <td>
                                        -
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="pull-right">
                        <?php echo $this->Html->link('<i class="fa fa-pencil"></i> Editar cliente', ['controller' => 'clients', 'action' => 'edit', $client->id], ['class' => 'btn btn-warning', 'escape' => false]); ?>
                        <?php echo $this->Form->postLink('<i class="fa fa-trash"></i> Apagar cliente', ['controller' => 'clients', 'action' => 'delete', $client->id], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'Deseja realmente apagar este cliente?']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>