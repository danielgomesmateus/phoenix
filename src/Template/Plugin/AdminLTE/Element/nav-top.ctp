<nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs">
                        Bem vindo(a),
                        <?php echo $userData['name']; ?> ! 
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <?php 
                            if(isset($userData['image'])) {
                        ?>
                        <?php echo $this->Html->image($userData['image'], ['alt' => $userData['name'], 'title' => $userData['name']]); ?>
                        <?php } ?>
                        <p>
                            <?php echo $userData['name']; ?>
                            <small>
                                Cadastrado desde: <?php echo date("d/m/Y", strtotime($userData['created'])); ?>
                            </small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <div class="pull-left">
                        <?php echo $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i> Editar', ['controller' => 'users', 'action' => 'edit'], ['class' => 'btn btn-warning', 'escape' => false]); ?>
                        </div>
                        <div class="pull-right">
                            <?php echo $this->Html->link('<i class="fa fa-sign-out" aria-hidden="true"></i> Sair', ['controller' => 'users', 'action' => 'login'], ['class' => 'btn btn-danger', 'escape' => false]); ?>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>