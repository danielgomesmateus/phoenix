<div class="col-xs-12">
    <div class="box box-danger" style="margin-top:15px;">
        <div class="box-header">
            <h3 class="box-title">
                Usuários
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
                            Email
                        </th>
                        <th>
                            Razão Social
                        </th>
                        <th>
                            Nome fantasia
                        </th>
                        <th>
                            CNPJ
                        </th>
                        <th>
                            Tipo
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Ações
                        </th>
                    </tr>
                    <?php
                        foreach($users as $user) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $user->name; ?>
                        </td>
                        <td>
                            <?php echo $user->email; ?>
                        </td>
                        <td>
                            <?php echo $user->social_name ?? '-'; ?>
                        </td>
                        <td>
                            <?php echo $user->fantasy_name ?? '-'; ?>
                        </td>
                        <td>
                            <?php echo $user->cnpj ?? '-'; ?>
                        </td>
                        <td>
                            <?php
                                if($user->role == 'accounting') {
                            ?>
                            <span class="label label-success">Contabilidade</span>
                            <?php } else { ?>
                            <span class="label label-primary">Empresa</span>
                            <?php } ?>
                        </td>
                        <td>
                            <?php 
                                if($user->status == 1) { 
                            ?>
                            <span class="label label-success">Ativado</span>
                            <?php } else { ?>
                            <span class="label label-danger">Desativado</span>
                            <?php } ?>
                        </td>
                        <td>
                            <div>
                                <?php
                                    echo $this->Html->link('<i class="fa fa-search" aria-hidden="true"></i> Visualizar usuário', ['controller' => 'users', 'action' => 'view', $user->id], ['alt' => 'Visualizar usuário', 'title' => 'Visualizar usuário', 'escape' => false, 'class' => 'label label-primary label-block']);
                                ?>
                            </div>
                            <div>
                                <?php    
                                    echo $this->Form->postLink('<i class="fa fa-exchange" aria-hidden="true"></i> Alterar status', ['controller' => 'users', 'action' => 'alterStatus', $user->id], ['escape' => false, 'confirm' => 'Deseja realmente alterar o status deste usuário?', 'class' => 'label label-warning label-block']);
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