<ul class="sidebar-menu">
    <li class="header">
        PAINEL DE CONTROLE
    </li>
    <?php
        if($userData['role'] != 'admin') {
    ?>
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
                    <i class="fa fa-pencil"></i> Editar
                </a>
            </li>
        </ul>
    </li>
    <?php
        }
        if($userData['role'] == 'admin') {
    ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-building"></i> 
            <span>
                Usuários
            </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'index']); ?>">
                    <i class="fa fa-list"></i> Listar
                </a>
            </li>
        </ul>
    </li>
    <?php } ?>
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
                <a href="<?php echo $this->Url->build(['controller' => 'partners', 'action' => 'add', 'client']); ?>">
                    <i class="fa fa-plus"></i> Adicionar
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'partners', 'action' => 'index', 'client']); ?>">
                    <i class="fa fa-list"></i> Listar
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-archive"></i> 
            <span>
                Fornecedores
            </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'partners', 'action' => 'add', 'provider']); ?>">
                    <i class="fa fa-plus"></i> Adicionar
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'partners', 'action' => 'index', 'provider']); ?>">
                    <i class="fa fa-list"></i> Listar
                </a>
            </li>
        </ul>
    </li>
    <?php
        if($userData['role'] == 'admin') {
    ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-file-text" aria-hidden="true"></i>
            <span>
                Páginas
            </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'pages', 'action' => 'add']); ?>">
                    <i class="fa fa-plus"></i> Adicionar
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'pages']); ?>">
                    <i class="fa fa-list"></i> Listar
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-file-code-o" aria-hidden="true"></i>
            <span>
                Blocos
            </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'blocks', 'action' => 'add']); ?>">
                    <i class="fa fa-plus"></i> Adicionar
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'blocks']); ?>">
                    <i class="fa fa-list"></i> Listar
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-picture-o" aria-hidden="true"></i>
            <span>
                Slide
            </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'banners', 'action' => 'add']); ?>">
                    <i class="fa fa-plus"></i> Adicionar
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'banners']); ?>">
                    <i class="fa fa-list"></i> Listar
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="<?php echo $this->Url->build(['controller' => 'settings']); ?>">
            <i class="fa fa-cog" aria-hidden="true"></i>
            <span>
                Configurações gerais
            </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
    </li>
    <?php } ?>
</ul>