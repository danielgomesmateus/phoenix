<nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs">
                        <b>
                            Bem vindo(a),
                            <?php echo $userData['name']; ?> !
                        </b> 
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-footer">
                        <div class="pull-right">
                            <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'logout']); ?>" class="btn btn-default btn-flat">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> Sair
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>