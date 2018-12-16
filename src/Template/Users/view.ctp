<div class="container-fluid">
    <div class="box box-danger" style="margin-top:15px;">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-building"></i> <?php echo $user->name; ?> - (<?php echo $user->social_name ?? '-'; ?>)
            </h3>
            <div class="pull-right">
                Data de cadastro: <?php echo date("d/m/Y H:i", strtotime($user->created)); ?>
            </div>
        </div>
        <div class="box-body">
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        <?php
                            if(!(empty($user->address)) && !(empty($user->neighborhood)) && !(empty($user->city)) && !(empty($user->state))) {
                        ?>
                        <strong>
                            <?php echo $user->social_name; ?>
                        </strong>
                        <br>
                        <?php echo $user->address; ?>
                        <br>
                        <?php echo $user->state; ?>, <?php echo $user->city; ?>, <?php echo $user->neighborhood; ?>, nº <?php echo $user->number; ?>
                        <br>
                        <?php } else { ?>
                        <strong>
                            Endereço não informado
                        </strong>
                        <?php } ?>
                        <br>
                    </address>
                </div>
                <div class="col-sm-4 invoice-col">
                    <b>
                        Identificador: #<?php echo $user->id; ?>
                    </b>
                    <br />
                    <b>
                        CNPJ:
                    </b> 
                    <?php echo $user->cnpj ?? '-'; ?>
                    <br />
                    <b>
                        Telefone:
                    </b> 
                    <?php echo $user->phone ?? '-'; ?>
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12" style="margin-bottom:15px;">
                    <?php
                        if(!(empty($user->address)) && !(empty($user->neighborhood)) && !(empty($user->city)) && !(empty($user->state))) {
                                                        
                            $options = [
                                'zoom' => 10
                            ];
                            echo $this->GoogleMap->map($options);
                
                            $this->GoogleMap->addMarker(['address' => "{$user->address}, {$user->neighborhood}, {$user->city}, {$user->state}", 'title' => $user->social_name, 'icon' => $this->GoogleMap->iconSet('orange')]);
                            $this->GoogleMap->finalize();
                        }                   
                    ?>                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <p class="lead">
                        Clientes e fornecedores
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>
                                        Clientes:
                                    </th>
                                    <td>
                                        -
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Fornecedores:
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
        </div>
    </div>
</div>