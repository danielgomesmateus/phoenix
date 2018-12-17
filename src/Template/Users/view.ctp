<div class="container-fluid">
    <div class="box box-danger" style="margin-top:15px;">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="fa fa-building"></i> <?php echo $user->name; ?> - (<?php echo "<b>{$user->social_name}</b>" ?? '-'; ?>)
            </h3>
            <div class="pull-right">
                Data de cadastro: <?php echo date("d/m/Y H:i", strtotime($user->created)); ?>
            </div>
        </div>
        <div class="box-body">
            <div class="row invoice-info">
                <?php
                    if(!(empty($user->images[0]->image))) {
                ?>
                <div class="col-lg-1 col-md-1 col-xs-12 col-sm-12 invoice-col">
                    <?php echo $this->Html->image($user->images[0]->image, ['class' => 'img-responsive img-circle']); ?>
                </div>
                <?php } ?>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 invoice-col">
                    <address>
                        <b>
                            Identificador: #<?php echo $user->id; ?>
                        </b>
                        <br />
                        <?php
                            if(!(empty($user->address)) && !(empty($user->neighborhood)) && !(empty($user->city)) && !(empty($user->state))) {
                        ?>
                        <b>
                            Endereço:
                        </b>
                        <br />
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
                <div class="col-lg-5 col-md-5 col-xs-12 col-sm-12 invoice-col">
                    <b>
                        CNPJ:
                    </b> 
                    <?php echo $user->cnpj ?? '-'; ?>
                    <br />
                    <b>
                        Telefone:
                    </b> 
                    <?php echo $user->phones[0]->landline ?? '-'; ?>
                    <br />
                    <b>
                        Telefone celular:
                    </b> 
                    <?php echo $user->phones[0]->cell_phone ?? '-'; ?>
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
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <p class="lead">
                        <b>
                            Clientes e fornecedores
                        </b>
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>
                                        Clientes:
                                    </th>
                                    <td>
                                        <?php echo $clients ?? 0; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Fornecedores:
                                    </th>
                                    <td>
                                        <?php echo $providers ?? 0; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Total:
                                    </th>
                                    <td>
                                        <?php echo $partners ?? 0; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <canvas id="chart-area"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js'); ?>
<script>
    (function() {

        'use strict';

        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)'
        };

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						<?php echo $clients ?? 0; ?>,
						<?php echo $providers ?? 0; ?>,
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Clientes',
					'Fornecedores'
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

        var colorNames = Object.keys(window.chartColors);
    })();
</script>