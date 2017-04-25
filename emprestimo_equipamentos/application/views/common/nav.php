  <!-- Navigation --> 
    <nav id="mainNav" class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="sidebar-nav navbar-nav">

             <li class="nav-item active">
                    <div class="teste" > 
                        <img src="<?php echo base_url('assets/img/if.png')?>"  alt="" >
                   </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('usuario_controller/home')?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>


<!--                 <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('equipamento/viewCadastro')?>"><i class="fa fa-fw fa-plus-square"></i> Equipamentos</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('Usuario_Controller/cadastro')?>"><i class="fa fa-fw fa-area-chart"></i> Cadastro de Usuarios</a>
                </li>

           
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('equipamento/viewCadastro')?>"><i class="fa fa-fw fa-cogs"></i> Cadastro de Patrimonios</a>
                </li>
                     <li class="dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-table"></i>   Relatorios </a>
                    <ul class="relatorios dropdown-menu">
                      <li><a href="<?php echo base_url('Relatorios_Controller/relatorio')?>">Requisições</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExample"><i class="fa fa-fw fa-sitemap"></i> Menu Levels</a>
                    <ul class="sidebar-second-level collapse" id="collapseExample">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExample2">Third Level</a>
                            <ul class="sidebar-third-level collapse" id="collapseExample2">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link mr-lg-2" href="<?php echo base_url('equipamento/viewCadastro')?>">
                    <i class="fa fa-fw fa-plus-square"></i> <span class="hidden-lg-up">Equipamentos</span>
                    <span class="new-indicator text-success hidden-md-down"><i class="fa fa-fw fa-circle"></i><span class="number">1</span></span>
                    </a>
                </li>            
                <li class="nav-item dropdown">
                    <a class="nav-link mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-envelope"></i> <span class="hidden-lg-up">Messages <span class="badge badge-pill badge-primary">12 New</span></span>
                        <span class="new-indicator text-primary hidden-md-down"><i class="fa fa-fw fa-circle"></i><span class="number">12</span></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">New Messages:</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>David Miller</strong> <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>Jane Smith</strong> <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>John Doe</strong> <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            View All Messages
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i> <span class="hidden-lg-up">Alerts <span class="badge badge-pill badge-warning">6 New</span></span>
                        <span class="new-indicator text-warning hidden-md-down"><i class="fa fa-fw fa-circle"></i><span class="number">6</span></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 mr-lg-2" action="<?php echo base_url('equipamento/select')?>" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Digite o patrimônio" name="num_patrimonio">
                            <span class="input-group-btn">
                        <input class="btn btn-primary" type="submit"><i class="fa fa-search"></i></input>
                    </span>
                        </div>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('usuario_controller')?>"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>