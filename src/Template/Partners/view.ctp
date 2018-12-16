<div class="container-fluid">
    <div class="box box-primary" style="margin-top:15px;">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-globe"></i> <?php echo $partner->name; ?> - (<?php echo $partner->social_name; ?>)
            </h3>
            <div class="pull-right">
                Data de cadastro: <?php echo date("d/m/Y H:i:s", strtotime($partner->created)); ?>
            </div>
        </div>
        <div class="box-body">
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong><?php echo $partner->social_name; ?></strong><br>
                        <?php echo $partner->address; ?><br>
                        <?php echo $partner->state; ?>, <?php echo $partner->city; ?>, <?php echo $partner->neighborhood; ?>, nº <?php echo $partner->number; ?><br>
                        <br>
                    </address>
                </div>
                <div class="col-sm-4 invoice-col">
                    <b>
                        Identificador: #<?php echo $partner->id; ?>
                    </b>
                    <br />
                    <b>
                        CNPJ:
                    </b> 
                    <?php echo $partner->cnpj; ?>
                    <br />
                    <b>
                        Telefone:
                    </b> 
                    <?php echo $partner->phone; ?>
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12" style="margin-bottom:15px;">
                    <?php
                        if(!(empty($partner->address)) && !(empty($partner->neighborhood)) && !(empty($partner->city)) && !(empty($partner->state))) {

                            $options = [
                                'zoom' => 10                             
                            ];
                            echo $this->GoogleMap->map($options);
                
                            $this->GoogleMap->addMarker(['address' => "{$partner->address}, {$partner->neighborhood}, {$partner->city}, {$partner->state}", 'title' => $partner->social_name, 'icon' => $this->GoogleMap->iconSet('orange')]);
                            $this->GoogleMap->finalize();
                        }                   
                    ?>                    
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
            <?php 
                if($userData['role'] == 'company') {
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="pull-right">
                        <?php echo $this->Html->link('<i class="fa fa-pencil"></i> Editar cliente', ['controller' => 'partners', 'action' => 'edit', $partner->id], ['class' => 'btn btn-warning', 'escape' => false]); ?>
                        <?php echo $this->Form->postLink('<i class="fa fa-trash"></i> Apagar cliente', ['controller' => 'partners', 'action' => 'delete', $partner->id], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'Deseja realmente apagar este cliente?']); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>