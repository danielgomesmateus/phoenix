<nav class="top-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 hidden-xs">
            <span class="nav-text">
                <i class="fa fa-phone" aria-hidden="true"></i>  (31) 99890-3296
                &nbsp;&nbsp;
                <i class="fa fa-envelope" aria-hidden="true"></i> contato@gomeseminas.com.br</span>
            </div>
            <div class="col-sm-4 text-center">
                <a href="#" class="social">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#" class="social">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#" class="social">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#" class="social">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
                <a href="#" class="social">
                    <i class="fa fa-google" aria-hidden="true"></i>
                </a>
                <a href="#" class="social">
                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
            </div>
            <div class="col-sm-4 text-right hidden-xs">
                <ul class="tools">
                    <li class="dropdown">
                        <a class="" href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'register']); ?>">
                            <i class="fa fa-user" aria-hidden="true"></i> Minha conta
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->Url->build(['controller' => 'home']); ?>">
                <!-- Aqui vêm a logo -->
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="<?php echo $this->Url->build(['controller' => 'home']); ?>">
                        Página inicial
                    </a>
                </li>
                <li>
                    <a href="<?php echo $this->Url->build(['controller' => 'pages', 'action' => 'display']); ?>">
                        Serviços
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>