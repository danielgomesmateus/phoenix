<ul class="sidebar-menu">
    <li class="header">
        PAINEL DE CONTROLE
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-database"></i> 
            <span>
                Meus dados
            </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'edit']); ?>">
                    <i class="fa fa-pencil"></i> Editar dados
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i> 
            <span>
                Clientes
            </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'clients', 'action' => 'add']); ?>">
                    <i class="fa fa-user-plus"></i> Adicionar cliente
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'clients', 'action' => 'index']); ?>">
                    <i class="fa fa-user"></i> Listar clientes
                </a>
            </li>
        </ul>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-diamond"></i> 
                <span>
                    Lançamentos
                </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="<?php echo $this->Url->build('/'); ?>">
                        <i class="fa fa-plus"></i> Adicionar lançamento
                    </a>
                </li>
                <li>
                    <a href="<?php echo $this->Url->build('/'); ?>">
                        <i class="fa fa-list"></i> Listar lançamentos
                    </a>
                </li>
            </ul>
        </li>
    </li>
</ul>